<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Services\TagService;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function __construct()
    {
        $this->service = new TagService();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = $this->service->getTags();
        $availableTagColors = Tag::availableTagColors();

        return view('admin.tag.index', compact('tags', 'availableTagColors'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->service->createTag($request);

        return redirect()->route('admin.tags.index')
            ->with('successStatus', 'Tag created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        $availableTagColors = Tag::availableTagColors();

        return view('admin.tag.edit', compact('tag', 'availableTagColors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $this->service->updateTag($request, $tag);

        return redirect()->route('admin.tags.index')
            ->with('successStatus', 'Tag updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $this->service->deleteTag($tag);

        return redirect()->route('admin.tags.index');
    }
}
