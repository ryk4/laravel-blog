<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'style_class'];

    public function blogs(): BelongsToMany
    {
        return $this->belongsToMany(Blog::class);
    }

    public function numberOfUses(): int
    {
        return $this->blogs->count();
    }

    public static function availableTagColors()
    {
        $tags = collect([
            'tag-light-green',
            'tag-dark-blue',
            'tag-red',
            'tag-dar-green',
            'tag-yellow',
            'tag-neutral',
        ]);

        return $tags;
    }
}
