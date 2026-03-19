<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->q;

        if (!$query) {
            return redirect('/');
        }

    
        $blogs = Blog::search($query)->get();

        return view('search', compact('blogs', 'query'));
    }
}