<?php

namespace App\Services;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class TagService
{
    public function getTags(): Collection
    {
        return Tag::all();
    }

    public function createTag(Request $request): Tag
    {
        return Tag::create([
            'name' => $request->name,
            'style_class' => $request->style_class,
        ]);
    }

    public function updateTag(Request $request, Tag $tag): Tag
    {
        $tag->update([
            'name' => $request->name,
            'style_class' => $request->style_class,
        ]);

        return $tag;
    }

    public function deleteTag(Tag $tag): void
    {
        $tag->delete();
    }
}
