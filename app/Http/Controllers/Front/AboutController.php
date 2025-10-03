<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use DB;

class AboutController extends Controller
{
    public function index()
    {
        $data['partners'] = DB::table('partners')->get();
        $data['works'] = Team::orderBy('order_no','asc')->get();
        return view('front.about', $data);
    }
}
