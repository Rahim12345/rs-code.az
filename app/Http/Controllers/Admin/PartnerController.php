<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;
use DB, Validator, File;

class PartnerController extends Controller
{
    public function index()
    {
        $data['partners'] = DB::table('partners')->get();
        return view('back.partners.index', $data);
    }

    public function store(Request $request)
    {
        if ($request->id) 
        {
            $id = $request->input('id');
            $partner = DB::table('partners')->where('id', '=', $id)->first();
            $rules = [
                'name'     => 'required',
                'link'     => 'required',
            ];
    
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) 
            {
                return redirect()->back()->withErrors($validator)->withInput();
            }
    
            $name  = $request->input('name');
            $link  = $request->input('link');
            $logo  = $request->file('logo');

            if ($logo) 
            {
                \File::delete("images/partners".$partner->logo);
                $logo_name = uniqid().".".$logo->getClientOriginalExtension();
                $logo->move(public_path("images/partners"), $logo_name);
            }
            else
            {
                $logo_name = $request->input('logo_hidden');
            }
    
            
    
            DB::table('partners')->update(['link' => $link, 'logo' => $logo_name, 'name' => $name]);
            return redirect('/partners')->with('status', 'Dəyişikliklər qeydə alındı!');
        }
        $rules = [
            'name'     => 'required',
            'link'     => 'required',
            'logo'     => 'required|mimes:jpg,png,jpeg,webp',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) 
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $name  = $request->input('name');
        $link  = $request->input('link');
        $logo  = $request->file('logo');

        $logo_name = uniqid().".".$logo->getClientOriginalExtension();
        $logo->move(public_path("images/partners"), $logo_name);

        DB::table('partners')->insert(['link' => $link, 'logo' => $logo_name, 'name' => $name]);
        return redirect('/admin/partners')->with('status', 'Dəyişikliklər qeydə alındı!');

    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $data['partner'] = DB::table('partners')->where('id', '=', $id)->first();
        return response()->json($data, 200);
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        if (DB::table('partners')->where('id', '=', $id)->exists()) 
        {
            $partner = DB::table('partners')->where('id', '=', $id)->first();
            \File::delete('images/partners/'.$partner->logo);
            DB::table('partners')->where('id', '=', $id)->delete();
            return response()->json(['status' => 1, 'message' => 'Uğurla Silindi', 'id' => $id], 200);
        }
        else
        {
            return response()->json(['status' => 0, 'message' => 'Bazada belə bir məlumat yoxdur'], 200);
        }
    }
}
