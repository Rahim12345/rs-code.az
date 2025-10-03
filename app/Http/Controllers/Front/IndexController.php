<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB, Validator;
use App\Models\Project;

class IndexController extends Controller
{
    public function index()
    {
        $data['about'] = DB::table('abouts')->first();
        $data['partners'] = DB::table('partners')->get();
        $data['blogs'] = DB::table('blogs')->get();
        $data['comments'] = DB::table('comments')->get();
        $data['projects'] = Project::where('home',1)->orderBy('order_no','asc')->limit(4)->get();
        return view('front.index', $data);
    }


    public function lang($lang)
    {
        \Session::put('lang', $lang);
        return redirect()->back();
    }
}
