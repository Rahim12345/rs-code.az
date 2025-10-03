<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB, Validator;

class CommentController extends Controller
{
    public function index()
    {
        $data['comments'] = DB::table('comments')->get();
        return view('back.comments.index', $data);
    }

    public function index_edit($id)
    {
        if (DB::table('comments')->where('id', $id)->exists()) 
        {
            $data['comment'] = DB::table('comments')->where('id', $id)->first();
            return view('back.comments.edit', $data);
        }
    }

    public function update(Request $request, $id)
    {
        if (DB::table('comments')->where('id', $id)->exists()) 
        {
            $comment = DB::table('comments')->where('id', $id)->first();
            $rules = [
                'name_az' => 'required',
                'name_en' => 'required',
                'name_ru' => 'required',
                'comment_az' => 'required',
                'comment_en' => 'required',
                'comment_ru' => 'required',
                
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) 
            {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $name_az    = $request->name_az;
            $name_en    = $request->name_en;
            $name_ru    = $request->name_ru;
            $comment_az = $request->comment_az;
            $comment_en = $request->comment_en;
            $comment_ru = $request->comment_ru;
            $photo      = $request->photo;

            if ($photo) 
            {
                try {
                    \File::delete('images/comments/'.$comment->photo);
                } catch (\Exception $th) {
                    return redirect()->back()->withErrors($th)->withInput();
                }
                
                $photo_name = uniqid().'.'.$photo->getClientOriginalExtension();
                $photo->move(public_path('images/comments/'), $photo_name);
            }
            else
            {
                $photo_name = $comment->photo;
            }

            DB::table('comments')->where('id', $id)->update(['name_az' => $name_az, 'name_en' => $name_en, 'name_ru' => $name_ru, 'comment_az' => $comment_az, 'comment_en' => $comment_en, 'comment_ru' => $comment_ru, 'photo' => $photo_name]);

            return redirect('/admin/comments')->with('success', 'Dəyişikliklər qeydə alındı');
        }
    }
}
