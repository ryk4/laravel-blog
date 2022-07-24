<?php

namespace App\Services;

use App\Mail\NewBlogSubscriptionNotification;
use App\Models\Blog;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Nette\Utils\Image;

class BlogService
{
    private $imageUploadService;

    public function __construct()
    {
        $this->imageUploadService = new ImageService();
    }

    public function fetchPaginatedBlogs(int $paginate = 16): AbstractPaginator
    {
        return Blog::with('tags')->orderByDesc('views')->paginate($paginate);
    }

    public function createBlog(Request $request): Blog
    {
        $blog = auth()->user()->blogs()->create([
            'title' => $request->title,
            'tip' => $request->tip,
            'summary' => $request->summary,
            'guide' => $request->guide,
            'repository_url' => $request->repository_url
        ]);

        if ($request->tags) {
            $tags = Str::of($request->tags)->explode(',');

            foreach ($tags as $tag) {
                $blog->tags()->attach($tag);
            }
        }

        if (isset($request['image'])) {
            $blog->image = $this->imageUploadService->uploadImage($request['image']);
            $blog->save();
        }

        $this->notifySubscribersWhenBlogIsCreated($blog);

        return $blog;
    }

    public function updateBlog(Request $request, Blog $blog): Blog
    {
        $blog->update([
            'title' => $request->title,
            'tip' => $request->tip,
            'summary' => $request->summary,
            'guide' => $request->guide,
            'repository_url' => $request->repository_url
        ]);

        $blog->tags()->detach();

        if ($request->tags) {
            $tags = Str::of($request->tags)->explode(',');

            foreach ($tags as $tag) {
                $blog->tags()->attach($tag);
            }
        }

        if (isset($request['image'])) {
            $blog->image = $this->imageUploadService->uploadImage($request['image']);
            $blog->save();
        }

        return $blog;
    }

    public function deleteBlog(Blog $blog): void
    {
        $blog->delete();
    }

    private function notifySubscribersWhenBlogIsCreated(Blog $blog): void
    {
        $subscriberList = Subscription::all();

        $subscriptionService = new SubscriptionService();

        $subscriberList->each(function ($subscriber, $key) use ($blog, $subscriptionService) {
            $unsubscribeUrl = $subscriptionService->generateUnsubscribeUrl($subscriber->email);

            $message = (new NewBlogSubscriptionNotification($blog, $unsubscribeUrl))->onQueue('emails');

            Mail::to($subscriber->email)->queue($message);
        });
    }
}
