<?php

namespace App\Repositories;

use App\Interfaces\BlogInterface;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Str;

class BlogRepository implements BlogInterface
{
    public function all(int $paginate): LengthAwarePaginator
    {
        return Blog::with('tags')->orderByDesc('views')->paginate($paginate);
    }

    public function find(Blog $blog): Blog
    {
        return $blog;
    }

    public function create(Request $request): Blog
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

        return $blog;
    }

    public function update(Blog $blog, Request $request): Blog
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

    public function delete(Blog $blog): void
    {
        $blog->delete();
    }
}
