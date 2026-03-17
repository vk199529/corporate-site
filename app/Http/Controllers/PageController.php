<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{

public function show($slug = 'home')
{
    $page = Page::where('slug', $slug)->firstOrFail();

    return view('pages.' . $page->template, compact('page'));
}
}
