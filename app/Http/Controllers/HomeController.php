<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuItem;
use App\Models\Menu;


class HomeController extends Controller
{
public function index()
{
    return view('pages.home');
}
}