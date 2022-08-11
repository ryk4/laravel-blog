<?php

namespace App\Services;

use App\Models\Tag;
use App\Repositories\TagRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class TagService
{
    private TagRepository $repository;

    public function __construct()
    {
        $this->repository = new TagRepository();
    }

    public function getTags(): Collection
    {
        return $this->repository->all();
    }

    public function createTag(Request $request): Tag
    {
        return $this->repository->create($request);
    }

    public function updateTag(Request $request, Tag $tag): Tag
    {
        return $this->repository->update($request, $tag);
    }

    public function deleteTag(Tag $tag): bool
    {
        return $this->repository->delete($tag);
    }
}
