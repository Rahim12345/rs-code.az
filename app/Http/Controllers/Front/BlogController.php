<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class BlogController extends Controller
{
    public function index()
    {
        $data['blogs'] = DB::table('blogs')->orderByDesc('id')->get();
        return view('front.blogs', $data);
    }
}
