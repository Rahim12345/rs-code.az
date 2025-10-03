<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Project;
use App\Models\ProjectImage;
use Validator;

class ProjectController extends Controller
{
    public function index()
    {
        $data['projects'] = Project::get();
        return view('back.project.index', $data);
    }

    public function store(Request $request)
    {

        if ($request->input('id')) 
        {
            $id = $request->input('id');
            if (DB::table('projects')->where('id', '=', $id)->exists()) 
            {
                $rules = [
                    'name'     => 'required',
                    'link'     => 'required',
                    'category' => 'required',
                    'slug'     => 'required',
                    'tarix'    => 'required',
                ];
    
                $name     = $request->input('name');
                $link     = $request->input('link');
                $tarix    = $request->input('tarix');
                $category = $request->input('category');
                $slug     = $request->input('slug');
    
                $projects = Project::find($id);
    
                $image    = array();
                if ($photos = $request->file('photos')) 
                {
                    foreach ($photos as $photo) 
                    {
                        $photo_name = uniqid().".".$photo->getClientOriginalExtension();
                        $photo->move(public_path('images/projects'), $photo_name);
                        $image[] = $photo_name;
                    }
                    $project = DB::table('projects')->where('id', $id)->first();
                    $photo = explode('|', $project->photo1);
                    for ($i=0; $i < count($photo) ; $i++) 
                    { 
                        \File::delete('images/projects/'.$photo[$i]);
                    }
                }
                else
                {
                    $hiddens = $request->input('photos_hidden');
    
                    foreach ($hiddens as $hidden) 
                    {
                        $image[] = $hidden;
                    }
                }
    
                $projects->photo1     = implode('|', $image);
                $projects->name       = $name;
                $projects->tarix      = $tarix;
                $projects->link       = $link;
                $projects->kateqoriya = $category;
                $projects->slug       = $slug;
        
                $projects->update();
        
                return redirect('/admin/projects')->with('status', 'Dəyişiliklər qeydə alındı!');
            }
           
        
        }

        $rules = [
            'name'     => 'required',
            'link'     => 'required',
            'category' => 'required',
            'slug'     => 'required',
            'tarix'    => 'required',
            'photos'    => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) 
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $name     = $request->input('name');
        $link     = $request->input('link');
        $tarix    = $request->input('tarix');
        $category = $request->input('category');
        $slug     = $request->input('slug');

        $projects = new Project;
        
        $image    = array();
       

        $projects->name       = $name;
        $projects->tarix      = $tarix;
        $projects->link       = $link;
        $projects->kateqoriya = $category;
        $projects->slug       = $slug;

        $projects->save();

        if ($photos = $request->file('photos')) {
            $id = $projects->id;
            foreach ($photos as $photo) {
                $photo_name = uniqid().".".$photo->getClientOriginalExtension();
                $photo->move(public_path('images/projects'), $photo_name);
                DB::table('project_images')->insert(['project_id' => $id, 'photo' => $photo_name]);
            }
        }

        return redirect('/admin/projects')->with('status', 'Dəyişiliklər qeydə alındı!');
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $data['project'] = Project::find($id);
        $project = Project::find($id);
        foreach ($project->images as $i) 
        {

            $images[] = $i->photo;
        }
        $data['images'] = implode('|', $images);
        return response()->json($data, 200);
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        if (DB::table('projects')->where('id', '=', $id)->exists()) 
        {
            $project = Project::where('id', $id)->first();
            foreach ($project->images as $i) {
                \File::delete('images/projects/'.$i->photo);
            }
            DB::table('projects')->where('id', '=', $id)->delete();
            return response()->json(['status' => 1, 'message' => 'Uğurla Silindi', 'id' => $id], 200);
        }
        else
        {
            return response()->json(['status' => 0, 'message' => 'Bazada belə bir məlumat yoxdur'], 200);
        }
    }
}
