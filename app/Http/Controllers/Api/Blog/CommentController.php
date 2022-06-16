<?php

namespace App\Http\Controllers\Api\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Http\Resources\BlogCommentResource;
use App\Models\Blog;
use App\Models\BlogComment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Blog $blog)
    {
        $comments = $blog->comments;

        return BlogCommentResource::collection($comments);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogComment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(BlogComment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCommentRequest  $request
     * @param  \App\Models\BlogComment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCommentRequest $request, BlogComment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogComment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogComment $comment)
    {
        //
    }
}
