<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuItem;

class HomeController extends Controller
{
    public function index()
    {
        $menus = MenuItem::whereNull('parent_id')
                    ->with('children')
                    ->orderBy('order')
                    ->get();

        return view('pages.home', compact('menus'));
    }
}