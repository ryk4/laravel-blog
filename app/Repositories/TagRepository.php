<?php

namespace App\Repositories;

use App\Interfaces\TagInterface;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class TagRepository implements TagInterface
{
    public function all(): Collection
    {
        return Tag::get();
    }

    public function create(Request $request): Tag
    {
        return Tag::create([
            'name' => $request->name,
            'style_class' => $request->style_class,
        ]);
    }

    public function update(Request $request, Tag $tag): Tag
    {
        $tag->update([
            'name' => $request->name,
            'style_class' => $request->style_class,
        ]);

        return $tag;
    }

    public function delete(Tag $tag): bool
    {
        return $tag->delete();
    }
}
