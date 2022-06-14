<?php

namespace App\Services;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Support\Str;

class BlogService
{
    public function fetchPaginatedBlogs(int $paginate = 16): AbstractPaginator
    {
        return Blog::with('tags')->paginate($paginate);
    }

    public function createBlog(Request $request): Blog
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

        return $blog;
    }

    public function updateBlog(Request $request, Blog $blog)
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

    public function deleteBlog(Blog $blog)
    {
    }
}
