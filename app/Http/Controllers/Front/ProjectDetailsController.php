<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use DB;

class ProjectDetailsController extends Controller
{
    public function index($slug)
    {
        if (DB::table('projects')->where('slug', $slug)->exists()) 
        {
            $data['project'] = Project::where('slug', $slug)->first();
            return view('front.project-details', $data);
        }
        
    }
}
