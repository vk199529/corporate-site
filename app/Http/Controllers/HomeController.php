<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuItem;
use App\Models\Menu;


class HomeController extends Controller
{
   public function index()
    {
        $menu = Menu::where('location', 'header')->first();

        $menus = $menu 
            ? $menu->items()
                ->whereNull('parent_id')
                ->with('children')
                ->orderBy('order')
                ->get()
            : collect();

        return view('pages.home', compact('menus'));
    }
}