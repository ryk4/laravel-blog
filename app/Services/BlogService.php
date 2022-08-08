<?php

namespace App\Services;

use App\Jobs\BlogCreateNotifySubscribers;
use App\Models\Blog;
use App\Repositories\BlogRepository;
use Illuminate\Http\Request;
use Illuminate\Pagination\AbstractPaginator;

class BlogService
{
    private $imageUploadService;
    private $blogRepository;

    public function __construct()
    {
        $this->imageUploadService = new ImageService();
        $this->blogRepository = new BlogRepository();
    }

    public function fetchPaginatedBlogs(int $paginate = 16): AbstractPaginator
    {
        return $this->blogRepository->all($paginate);
    }

    public function createBlog(Request $request): Blog
    {
        $blog = $this->blogRepository->create($request);

        BlogCreateNotifySubscribers::dispatch($blog)->onQueue('emails');

        return $blog;
    }

    public function updateBlog(Request $request, Blog $blog): Blog
    {
        $blog = $this->blogRepository->update($blog, $request);

        return $blog;
    }

    public function deleteBlog(Blog $blog): void
    {
        $this->blogRepository->delete($blog);
    }
}
