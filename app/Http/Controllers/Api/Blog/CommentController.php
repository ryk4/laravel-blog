<?php

namespace App\Http\Controllers\Api\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Http\Resources\BlogCommentResource;
use App\Models\Blog;
use App\Models\BlogComment;
use Illuminate\Http\Response;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Blog $blog)
    {
        $comments = $blog->comments()->orderByDesc('created_at')->get();

        return BlogCommentResource::collection($comments);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreCommentRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommentRequest $request, Blog $blog)
    {
        $comment = $blog->comments()->create([
            'name' => $request->name,
            'email' => $request->email,
            'website' => $request->website,
            'comment' => $request->comment,
        ]);

        return new BlogCommentResource($comment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\BlogComment $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog, BlogComment $comment)
    {
        $comment->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
