<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\Project;
use DB;

class WorkController extends Controller
{
    public function index($slug = null)
    {
        return view('front.works', [
            'my_services' => Service::with('products')->where('on_home', 1)->orderBy('order_no', 'asc')->get(),
            'products' => Product::with('service')->get(),
        ]);
    }
}
