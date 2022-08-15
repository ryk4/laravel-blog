<?php

namespace App\Services;

use App\Jobs\BlogCreateNotifySubscribers;
use App\Models\Blog;
use App\Repositories\BlogRepository;
use Illuminate\Http\Request;
use Illuminate\Pagination\AbstractPaginator;

class BlogService
{
    private BlogRepository $repository;
    private ImageService $imageUploadService;

    public function __construct(BlogRepository $repository, ImageService $imageUploadService)
    {
        $this->imageUploadService = $imageUploadService;
        $this->repository = $repository;
    }

    public function fetchPaginatedBlogs(int $paginate = 16): AbstractPaginator
    {
        return $this->repository->all($paginate);
    }

    public function createBlog(Request $request): Blog
    {
        $blog = $this->repository->create($request);

        self::saveImage($blog, $request);

        BlogCreateNotifySubscribers::dispatch($blog)->onQueue('emails');

        return $blog;
    }

    public function updateBlog(Request $request, Blog $blog): Blog
    {
        $blog = $this->repository->update($blog, $request);

        self::saveImage($blog, $request);

        return $blog;
    }

    public function deleteBlog(Blog $blog): void
    {
        $this->repository->delete($blog);
    }

    private function saveImage(Blog $blog, Request $request): void
    {
        if (isset($request['image'])) {
            $imageUrl = $this->imageUploadService->uploadImage($request['image']);
            $this->repository->saveImage($blog, $imageUrl);
        }
    }
}
