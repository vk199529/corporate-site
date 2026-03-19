<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CricJob;

class CricJobController extends Controller
{
     public function index()
    {
        $jobs = CricJob::where('status', 1)
            ->latest()
            ->get();

            return view('jobs.index', compact('jobs'));
    }

    public function show($slug)
    {
        $job = CricJob::where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();

    return view('jobs.show', compact('job'));
    }
}
