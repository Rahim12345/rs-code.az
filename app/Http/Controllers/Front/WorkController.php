<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class WorkController extends Controller
{
    public function index($slug = null)
    {
        $projects    = Project::with('images')->orderBy('order_no', 'asc')->get();
        $categories  = $projects->pluck('kateqoriya')->unique()->filter()->values();

        return view('front.works', compact('projects', 'categories'));
    }
}
