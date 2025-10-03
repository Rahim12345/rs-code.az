<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;


class AboutController extends Controller
{
    public function index()
    {
        $data['about'] = DB::table('abouts')->first();
        return view('back.about.index', $data);
    }

    public function edit()
    {
        $data['about'] = DB::table('abouts')->first();
        return view('back.about.edit', $data);
    }

    public function update(Request $request)
    {
        $rules = [
            'about_az' => 'required',
            'about_en' => 'required',
            'about_ru' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $about_az = $request->input('about_az');
        $about_en = $request->input('about_en');
        $about_ru = $request->input('about_ru');

        DB::table('abouts')->update(['about_az' => $about_az, 'about_en' => $about_en, 'about_ru' => $about_ru]);

        return redirect('admin/about')->with('status', 'Dəyişiliklər qeydə alındı!');

    }
}
