<?php

namespace App\Interfaces;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

interface BlogInterface
{
    public function all(int $paginate): LengthAwarePaginator;

    public function find(Blog $blog): Blog;

    public function create(Request $request): Blog;

    public function update(Blog $blog, Request $request): Blog;

    public function delete(Blog $blog): void;

    public function saveImage(Blog $blog, string $imageUrl): void;
}
