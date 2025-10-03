<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Traits\FileUploader;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    use FileUploader;
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $works = Team::orderBy('order_no','asc')->get();
        return view('back.team.index',compact('works'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('back.team.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'src'=>'nullable|image',
            'full_name'=>'nullable|max:30',
            'professional'=>'nullable|max:50',
        ],[],[
            'src'=>'PROFİL',
            'full_name'=>'FULL NAME',
            'professional'=>'PROFESSİONAL',
        ]);

        $src = $this->fileSave('files/teams/',$request,'src');

        $team = Team::create([
            'src'=>$src,
            'full_name'=>$request->full_name,
            'professional'=>$request->professional
        ]);

        toastr()->success('Data yaradıldı','Əla');
        return redirect()->route('team.edit',$team->id);
    }

    /**
     * Display the specified resource.
     *
     * @param Team $team
     * @return JsonResponse
     */
    public function show(Team $team)
    {
        $team->update([
            'order_no'=>\request()->order_no,
        ]);

        return response()->json([
            'message'=>'Sıra dəyişdirildi'
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Team $team
     * @return Application|Factory|View
     */
    public function edit(Team $team)
    {
        return view('back.team.edit',compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Team $team
     * @return RedirectResponse
     */
    public function update(Request $request, Team $team)
    {
        $this->validate($request,[
            'src'=>'nullable|image',
            'full_name'=>'nullable|max:30',
            'professional'=>'nullable|max:50',
        ],[],[
            'src'=>'PROFİL',
            'full_name'=>'FULL NAME',
            'professional'=>'PROFESSİONAL',
        ]);

        $src   = $this->fileUpdate($team->src, $request->hasFile('src'), $request->src, 'files/teams/');

        $team->update([
            'src'=>$src,
            'full_name'=>$request->full_name,
            'professional'=>$request->professional
        ]);
        toastr()->success('Data redaktə','Əla');
        return redirect()->route('team.edit',$team->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Team $team
     * @return RedirectResponse
     */
    public function destroy(Team $team)
    {
        $this->fileDelete('files/teams/'.$team->src);
        $team->delete();

        toastr()->success('Data silindi','Əla');
        return redirect()->route('team.index');
    }
}
