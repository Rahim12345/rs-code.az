<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB, Validator;

class BlogController extends Controller
{
    public function index()
    {
        $data['blogs'] = DB::table('blogs')->get();
        return view('back.blog.index', $data);
    }

    public function index_add()
    {
        return view('back.blog.add');
    }

    public function index_edit($id)
    {
        $data['blog'] = DB::table('blogs')->where('id', $id)->first();
        return view('back.blog.edit', $data);
    }

    public function update(Request $request, $id)
    {
        if (DB::table('blogs')->where('id', $id)->exists()) 
        {
            $blog = DB::table('blogs')->where('id', $id)->first();
            
            $rules = [
                'slug'  => 'required',
                'title_az'  => 'required',
                'title_en'  => 'required',
                'title_ru'  => 'required',
                'review_ru' => 'required',
                'review_en' => 'required',
                'review_az' => 'required',
                'text_az'   => 'required',
                'text_en'   => 'required',
                'text_ru'   => 'required',
                'date_az'   => 'required',
                'date_en'   => 'required',
                'date_ru'   => 'required',
            ];
    
            $validator = Validator::make($request->all(), $rules);
    
            if ($validator->fails()) 
            {
                return redirect()->back()->withErrors($validator)->withInput();
            }
    
            
            $slug      = $request->slug;
            $title_az  = $request->title_az;
            $title_en  = $request->title_en;
            $title_ru  = $request->title_ru;
            $review_az = $request->review_az;
            $review_en = $request->review_en;
            $review_ru = $request->review_ru;
            $text_az   = $request->text_az;
            $text_en   = $request->text_en;
            $text_ru   = $request->text_ru;
            $date_az   = $request->date_az;
            $date_en   = $request->date_en;
            $date_ru   = $request->date_ru;
            $photo     = $request->file('photo');
    
            if ($photo) 
            {
                \File::delete('/images/blog/'.$blog->photo);
                $photo_name = uniqid().".".$photo->getClientOriginalExtension();
                $photo->move(public_path('images/blog'), $photo_name);
            }
            else
            {
                $photo_name = $blog->photo;
            }
    
            
            DB::table('blogs')->where('id', '=', $id)->update(['slug' => $slug, 'title_az' => $title_az, 'title_en' => $title_en, 'title_ru' => $title_ru, 'review_az' => $review_az, 'review_en' => $review_en, 'review_ru' => $review_ru, 'text_az' => $text_az, 'text_ru' => $text_ru, 'text_en' => $text_en, 'photo' => $photo_name, 'date_az' => $date_az, 'date_en' => $date_en, 'date_ru' => $date_ru]);
    
            return redirect('admin/blogs')->with('success', 'Blog\'da dəyişikliklər edildi');
        }
       
    }
    

    public function store(Request $request)
    {
        $rules = [
            'slug'  => 'required',
            'title_az'  => 'required',
            'title_en'  => 'required',
            'title_ru'  => 'required',
            'review_ru' => 'required',
            'review_en' => 'required',
            'review_az' => 'required',
            'text_az'   => 'required',
            'text_en'   => 'required',
            'text_ru'   => 'required',
            'date_az'   => 'required',
            'date_en'   => 'required',
            'date_ru'   => 'required',
            'photo'     => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) 
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $slug      = $request->slug;
        $title_az  = $request->title_az;
        $title_en  = $request->title_en;
        $title_ru  = $request->title_ru;
        $review_az = $request->review_az;
        $review_en = $request->review_en;
        $review_ru = $request->review_ru;
        $text_az  = $request->text_az;
        $text_en  = $request->text_en;
        $text_ru  = $request->text_ru;
        $date_az  = $request->date_az;
        $date_en  = $request->date_en;
        $date_ru  = $request->date_ru;
        $photo    = $request->file('photo');

        $photo_name = uniqid().".".$photo->getClientOriginalExtension();
        $photo->move(public_path('images/blog'), $photo_name);

        DB::table('blogs')->insert(['slug' => $slug, 'title_az' => $title_az, 'title_en' => $title_en, 'title_ru' => $title_ru, 'review_az' => $review_az, 'review_en' => $review_en, 'review_ru' => $review_ru, 'text_az' => $text_az, 'text_ru' => $text_ru, 'text_en' => $text_en, 'photo' => $photo_name, 'date_az' => $date_az, 'date_en' => $date_en, 'date_ru' => $date_ru]);

        return redirect('/admin/blogs')->with('success', 'Blog əlavə olundu');
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        if (DB::table('blogs')->where('id', '=', $id)->exists()) 
        {
            $blog = DB::table('blogs')->where('id', '=', $id)->first();
            DB::table('blogs')->where('id', '=', $id)->delete();
            \File::delete('images/blog/'.$blog->photo);
            return response()->json(['status' => 1, 'message' => 'Uğurla Silindi', 'id' => $id], 200);
        }
        else
        {
            return response()->json(['status' => 0, 'message' => 'Bazada belə bir məlumat yoxdur'], 200);
        }
    }
}
