<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($post) {
            $post->slug = Str::slug($post->title);
        });
    }

    protected $guarded = ['id'];

    public function website(): BelongsTo
    {
        return $this->belongsTo(Website::class);
    }
}
