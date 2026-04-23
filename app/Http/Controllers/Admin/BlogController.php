<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB, Validator;

class BlogController extends Controller
{
    private array $attrs = [
        'slug_az'              => 'Slug (AZ)',
        'slug_en'              => 'Slug (EN)',
        'slug_ru'              => 'Slug (RU)',
        'title_az'             => 'Başlıq (AZ)',
        'title_en'             => 'Title (EN)',
        'title_ru'             => 'Заголовок (RU)',
        'review_az'            => 'Xülasə (AZ)',
        'review_en'            => 'Review (EN)',
        'review_ru'            => 'Описание (RU)',
        'text_az'              => 'Mətn (AZ)',
        'text_en'              => 'Content (EN)',
        'text_ru'              => 'Содержание (RU)',
        'date_az'              => 'Tarix (AZ)',
        'date_en'              => 'Date (EN)',
        'date_ru'              => 'Дата (RU)',
        'meta_title_az'        => 'Meta Başlıq (AZ)',
        'meta_title_en'        => 'Meta Title (EN)',
        'meta_title_ru'        => 'Meta Заголовок (RU)',
        'meta_description_az'  => 'Meta Açıqlama (AZ)',
        'meta_description_en'  => 'Meta Description (EN)',
        'meta_description_ru'  => 'Meta Описание (RU)',
        'meta_keywords_az'     => 'Meta Açar Sözlər (AZ)',
        'meta_keywords_en'     => 'Meta Keywords (EN)',
        'meta_keywords_ru'     => 'Meta Ключевые слова (RU)',
        'photo'                => 'Kapak şəkli (AZ)',
        'photo_en'             => 'Kapak şəkli (EN)',
        'photo_ru'             => 'Kapak şəkli (RU)',
    ];

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

    public function store(Request $request)
    {
        $rules = [
            'slug_az'   => 'required',
            'slug_en'   => 'required',
            'slug_ru'   => 'required',
            'title_az'  => 'required',
            'title_en'  => 'required',
            'title_ru'  => 'required',
            'review_az' => 'required',
            'review_en' => 'required',
            'review_ru' => 'required',
            'text_az'   => 'required',
            'text_en'   => 'required',
            'text_ru'   => 'required',
            'date_az'   => 'required',
            'date_en'   => 'required',
            'date_ru'   => 'required',
            'photo'     => 'required|image',
            'photo_en'  => 'nullable|image',
            'photo_ru'  => 'nullable|image',
        ];

        $validator = Validator::make($request->all(), $rules, [], $this->attrs);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $photo = $request->file('photo');
        $photo_name = uniqid() . '.' . $photo->getClientOriginalExtension();
        $photo->move(public_path('images/blog'), $photo_name);

        $photo_en_name = null;
        if ($request->hasFile('photo_en')) {
            $f = $request->file('photo_en');
            $photo_en_name = uniqid() . '.' . $f->getClientOriginalExtension();
            $f->move(public_path('images/blog'), $photo_en_name);
        }

        $photo_ru_name = null;
        if ($request->hasFile('photo_ru')) {
            $f = $request->file('photo_ru');
            $photo_ru_name = uniqid() . '.' . $f->getClientOriginalExtension();
            $f->move(public_path('images/blog'), $photo_ru_name);
        }

        DB::table('blogs')->insert([
            'slug_az'             => $request->slug_az,
            'slug_en'             => $request->slug_en,
            'slug_ru'             => $request->slug_ru,
            'title_az'            => $request->title_az,
            'title_en'            => $request->title_en,
            'title_ru'            => $request->title_ru,
            'review_az'           => $request->review_az,
            'review_en'           => $request->review_en,
            'review_ru'           => $request->review_ru,
            'text_az'             => $request->text_az,
            'text_en'             => $request->text_en,
            'text_ru'             => $request->text_ru,
            'date_az'             => $request->date_az,
            'date_en'             => $request->date_en,
            'date_ru'             => $request->date_ru,
            'meta_title_az'       => $request->meta_title_az,
            'meta_title_en'       => $request->meta_title_en,
            'meta_title_ru'       => $request->meta_title_ru,
            'meta_description_az' => $request->meta_description_az,
            'meta_description_en' => $request->meta_description_en,
            'meta_description_ru' => $request->meta_description_ru,
            'meta_keywords_az'    => $request->meta_keywords_az,
            'meta_keywords_en'    => $request->meta_keywords_en,
            'meta_keywords_ru'    => $request->meta_keywords_ru,
            'photo'               => $photo_name,
            'photo_en'            => $photo_en_name,
            'photo_ru'            => $photo_ru_name,
            'created_at'          => now(),
            'updated_at'          => now(),
        ]);

        return response()->json(['message' => 'Blog uğurla əlavə olundu']);
    }

    public function update(Request $request, $id)
    {
        if (!DB::table('blogs')->where('id', $id)->exists()) {
            return response()->json(['message' => 'Tapılmadı'], 404);
        }

        $blog = DB::table('blogs')->where('id', $id)->first();

        $rules = [
            'slug_az'   => 'required',
            'slug_en'   => 'required',
            'slug_ru'   => 'required',
            'title_az'  => 'required',
            'title_en'  => 'required',
            'title_ru'  => 'required',
            'review_az' => 'required',
            'review_en' => 'required',
            'review_ru' => 'required',
            'text_az'   => 'required',
            'text_en'   => 'required',
            'text_ru'   => 'required',
            'date_az'   => 'required',
            'date_en'   => 'required',
            'date_ru'   => 'required',
        ];

        $validator = Validator::make($request->all(), $rules, [], $this->attrs);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $photo = $request->file('photo');
        if ($photo) {
            if ($blog->photo) \File::delete(public_path('images/blog/' . $blog->photo));
            $photo_name = uniqid() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('images/blog'), $photo_name);
        } else {
            $photo_name = $blog->photo;
        }

        $photo_en = $request->file('photo_en');
        if ($photo_en) {
            if ($blog->photo_en) \File::delete(public_path('images/blog/' . $blog->photo_en));
            $photo_en_name = uniqid() . '.' . $photo_en->getClientOriginalExtension();
            $photo_en->move(public_path('images/blog'), $photo_en_name);
        } else {
            $photo_en_name = $blog->photo_en;
        }

        $photo_ru = $request->file('photo_ru');
        if ($photo_ru) {
            if ($blog->photo_ru) \File::delete(public_path('images/blog/' . $blog->photo_ru));
            $photo_ru_name = uniqid() . '.' . $photo_ru->getClientOriginalExtension();
            $photo_ru->move(public_path('images/blog'), $photo_ru_name);
        } else {
            $photo_ru_name = $blog->photo_ru;
        }

        DB::table('blogs')->where('id', $id)->update([
            'slug_az'             => $request->slug_az,
            'slug_en'             => $request->slug_en,
            'slug_ru'             => $request->slug_ru,
            'title_az'            => $request->title_az,
            'title_en'            => $request->title_en,
            'title_ru'            => $request->title_ru,
            'review_az'           => $request->review_az,
            'review_en'           => $request->review_en,
            'review_ru'           => $request->review_ru,
            'text_az'             => $request->text_az,
            'text_en'             => $request->text_en,
            'text_ru'             => $request->text_ru,
            'date_az'             => $request->date_az,
            'date_en'             => $request->date_en,
            'date_ru'             => $request->date_ru,
            'meta_title_az'       => $request->meta_title_az,
            'meta_title_en'       => $request->meta_title_en,
            'meta_title_ru'       => $request->meta_title_ru,
            'meta_description_az' => $request->meta_description_az,
            'meta_description_en' => $request->meta_description_en,
            'meta_description_ru' => $request->meta_description_ru,
            'meta_keywords_az'    => $request->meta_keywords_az,
            'meta_keywords_en'    => $request->meta_keywords_en,
            'meta_keywords_ru'    => $request->meta_keywords_ru,
            'photo'               => $photo_name,
            'photo_en'            => $photo_en_name,
            'photo_ru'            => $photo_ru_name,
            'updated_at'          => now(),
        ]);

        return response()->json(['message' => "Blog uğurla yeniləndi"]);
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        if (DB::table('blogs')->where('id', $id)->exists()) {
            $blog = DB::table('blogs')->where('id', $id)->first();
            DB::table('blogs')->where('id', $id)->delete();
            \File::delete(public_path('images/blog/' . $blog->photo));
            return response()->json(['status' => 1, 'message' => 'Uğurla Silindi', 'id' => $id]);
        }
        return response()->json(['status' => 0, 'message' => 'Bazada belə bir məlumat yoxdur']);
    }
}
