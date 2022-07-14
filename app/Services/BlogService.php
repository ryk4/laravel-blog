<?php

namespace App\Services;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Pagination\AbstractPaginator;
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
        return Blog::with('tags')->paginate($paginate);
    }

    public function createBlog(Request $request,): Blog
    {
        $blog = auth()->user()->blogs()->create([
            'title' => $request->title,
            'tip' => $request->tip,
            'summary' => $request->summary,
            'guide' => $request->guide
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

        return $blog;
    }

    public function updateBlog(Request $request, Blog $blog): Blog
    {
        $blog->update([
            'title' => $request->title,
            'tip' => $request->tip,
            'summary' => $request->summary,
            'guide' => $request->guide
        ]);

        $blog->tags()->detach();

        if ($request->tags) {
            $tags = Str::of($request->tags)->explode(',');

            foreach ($tags as $tag) {
                $blog->tags()->attach($tag);
            }
        }

        return $blog;
    }

    public function deleteBlog(Blog $blog): void
    {
        $blog->delete();
    }
}
