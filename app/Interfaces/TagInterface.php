<?php

namespace App\Interfaces;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

interface TagInterface
{
    public function all(): Collection;

    public function create(Request $request): Tag;

    public function update(Request $request, Tag $tag): Tag;

    public function delete(Tag $tag): bool;
}
