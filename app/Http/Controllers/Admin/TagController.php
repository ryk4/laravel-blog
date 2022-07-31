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

    public function index()
    {
        $tags = $this->service->getTags();
        $availableTagColors = Tag::availableTagColors();

        return view('admin.tag.index', compact('tags', 'availableTagColors'));
    }

    public function store(Request $request)
    {
        $this->service->createTag($request);

        return redirect()->route('admin.tags.index')
            ->with('successStatus', 'Tag created');
    }

    public function edit(Tag $tag)
    {
        $availableTagColors = Tag::availableTagColors();

        return view('admin.tag.edit', compact('tag', 'availableTagColors'));
    }

    public function update(Request $request, Tag $tag)
    {
        $this->service->updateTag($request, $tag);

        return redirect()->route('admin.tags.index')
            ->with('successStatus', 'Tag updated');
    }

    public function destroy(Tag $tag)
    {
        $this->service->deleteTag($tag);

        return redirect()->route('admin.tags.index');
    }
}
