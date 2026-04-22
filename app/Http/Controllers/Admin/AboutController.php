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
        $validator = Validator::make($request->all(), [
            'about_az' => 'required',
            'about_en' => 'required',
            'about_ru' => 'required',
        ], [], [
            'about_az' => 'Haqqımızda (AZ)',
            'about_en' => 'About (EN)',
            'about_ru' => 'О нас (RU)',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        DB::table('abouts')->update([
            'about_az' => $request->about_az,
            'about_en' => $request->about_en,
            'about_ru' => $request->about_ru,
        ]);

        return response()->json(['message' => 'Dəyişikliklər qeydə alındı']);
    }
}
