<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CricJob extends Model
{
    protected $fillable = [
        'title',
        'content',
        'status',
        'published_at',
        'slug',
        'meta_title',
        'meta_description',
    ];

    // ✅ auto slug generate
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($cronjob) {
            if (!$cronjob->slug) {
                $cronjob->slug = Str::slug($cronjob->title);
            }

            // publish date auto set
            if ($cronjob->status && !$cronjob->published_at) {
                $cronjob->published_at = now();
            }
        });
}
}
