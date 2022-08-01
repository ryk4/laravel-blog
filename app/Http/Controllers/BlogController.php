<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogRequest;
use App\Jobs\BlogIncrementView;
use App\Models\Blog;
use App\Services\BlogService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->service = new BlogService();
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $blogs = $this->service->fetchPaginatedBlogs();

        return view('blog.index', compact('blogs'));
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreBlogRequest $request
     * @return Response
     */
    public function store(StoreBlogRequest $request)
    {
        $this->service->createBlog($request);

        return redirect()->route('admin.blogs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Blog $blog
     * @return Response
     */
    public function show(string $slug)
    {
        $blog = Blog::where('slug', $slug)->first();

        (!isset($blog)) && abort(404);

        BlogIncrementView::dispatch($blog);

        return view('blog.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Blog $blog
     * @return Response
     */
    public function edit(Blog $blog)
    {
        return view('admin.blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreBlogRequest $request
     * @param Blog $blog
     * @return RedirectResponse
     */
    public function update(StoreBlogRequest $request, Blog $blog)
    {
        $this->service->updateBlog($request, $blog);

        return redirect()->route('admin.blogs.index');
    }
}
