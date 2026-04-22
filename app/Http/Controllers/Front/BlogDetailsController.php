<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class BlogDetailsController extends Controller
{
    public function index($id)
    {
        $blog = DB::table('blogs')
            ->where('id', $id)
            ->orWhere('slug_az', $id)
            ->orWhere('slug_en', $id)
            ->orWhere('slug_ru', $id)
            ->first();

        if (!$blog) {
            abort(404);
        }

        return view('front.blog-details', compact('blog'));
    }
}
