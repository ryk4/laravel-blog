<?php

namespace App\Services;

use App\Models\Tag;
use Illuminate\Http\Request;

class SubscriptionService
{
    public function subsribe(Request $request)
    {
        return Tag::create([
            'name' => $request->name,
            'style_class' => $request->style_class,
        ]);
    }

    public function unsubsribe(Tag $tag): void
    {
        $tag->delete();
    }
}
