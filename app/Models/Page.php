<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
    'title',
    'slug',
    'content',
    'template',

    'meta_title',
    'meta_description'
];
}
