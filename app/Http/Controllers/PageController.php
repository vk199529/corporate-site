<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Blog;

class PageController extends Controller
{

public function show($slug = 'home')
{
    $page = Page::where('slug', $slug)->firstOrFail();
        $blogs = Blog::latest()->take(6)->get();

    return view('pages.' . $page->template, compact('page','blogs'));
}
}
