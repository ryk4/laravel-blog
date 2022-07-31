<?php

namespace App\Services;

use App\Jobs\BlogCreateNotifySubscribers;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Support\Str;

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
            'slug' => Str::slug($request->title),
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

        BlogCreateNotifySubscribers::dispatch($blog)->onQueue('emails');

        return $blog;
    }

    public function updateBlog(Request $request, Blog $blog): Blog
    {
        $blog->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
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
}
