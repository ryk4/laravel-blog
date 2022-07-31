<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog;
use App\Services\BlogService;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->service = new BlogService();
    }

    public function index()
    {
        $blogs = $this->service->fetchPaginatedBlogs(20);

        return view('admin.blog.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(StoreBlogRequest $request)
    {
        $this->service->createBlog($request);

        return redirect()->route('blogs.index')
            ->with('successStatus', 'Blog created');
    }

    public function edit(Blog $blog)
    {
        return view('admin.blog.edit', compact('blog'));
    }

    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $this->service->updateBlog($request, $blog);

        return redirect()->route('admin.blogs.index')
            ->with('successStatus', 'Blog updated');
    }

    public function destroy(Blog $blog)
    {
        $this->service->deleteBlog($blog);

        return redirect()->route('admin.blogs.index')
            ->with('successStatus', 'Blog deleted');
    }
}
