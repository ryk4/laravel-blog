<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'tip', 'summary', 'guide', 'repository_url','views'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function comments()
    {
        return $this->hasMany(BlogComment::class);
    }

    public function createdAtReadable(): string
    {
        return $this->created_at->format('D, d m Y');
    }

    public function getImageAttribute($value): string
    {
        return (isset($value)) ? $value : 'https://i.imgur.com/KXh7aOG.png';//default img
    }

    public function getGuideAttribute($value)
    {
        $cssStyleClassesToBootstrap = [
            'class="ql-align-center"' => 'class="text-center"',
            'class="ql-align-right"' => 'class="text-end"',
        ];

        foreach ($cssStyleClassesToBootstrap as $key => $bsProperty) {
            if (Str::contains($value, $key)) {
                $value = Str::replace($key, $bsProperty, $value);
            }
        }

        return $value;
    }
}
