<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class BlogDetailsController extends Controller
{
    public function index($slug)
    {
        if (DB::table('blogs')->where('slug', $slug)->exists()) 
        {
            $data['blog'] = DB::table('blogs')->where('slug', $slug)->first();
            return view('front.blog-details', $data);
        }
        
    }
}
