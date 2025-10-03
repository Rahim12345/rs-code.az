<?php

namespace App\Http\Controllers;

use App\Traits\FileUploader;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Group;
use Illuminate\Validation\Rule;

class CompanyController extends Controller
{
    use FileUploader;
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('back.company.index',[
            'companies'=>Company::with('group')->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('back.company.create',[
            'groups'=>Group::latest()->get()
        ]);
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
            'src'=>'nullable|max:2048',
            'group_id'=>'required|exists:groups,id',
            'name'=>'required|max:255|unique:companies,name',
            'about_az'=>'nullable|max:20000',
            'about_en'=>'nullable|max:20000',
            'about_ru'=>'nullable|max:20000',
            'alt'=>'nullable|max:255',
        ],[],[
            'src'=>'Cover',
            'group_id'=>'Group',
            'name'=>'Name',
            'about_az'=>'About(AZ)',
            'about_en'=>'About(EN)',
            'about_ru'=>'About(RU)',
        ]);

        $src = $this->fileSave('files/company/',$request,'src');
        $company = Company::create([
            'src'=>$src,
            'group_id'=>$request->group_id,
            'name'=>$request->name,
            'slug'=>str_slug($request->name),
            'about_az'=>$request->about_az,
            'about_en'=>$request->about_en,
            'about_ru'=>$request->about_ru,
            'alt'=>$request->alt,
        ]);

        toastr()->success('Data əlavə edildi','Əla');
        return redirect()->route('company.edit',$company->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(int $id)
    {
        $company = Company::whereId($id)->firstOrFail();
        $groups  = Group::latest()->get();
        return view('back.company.edit', compact('company','groups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id)
    {
        $company = Company::whereId($id)->firstOrFail();
        $this->validate($request,[
            'src'=>'nullable|max:2048',
            'group_id'=>'required|exists:groups,id',
            'name'=>[
                'required',
                'max:255',
                Rule::unique('companies','name')->where(static function ($query) use ($request) {
                    return $query->where('id','!=',$request->segment(3));
                })
            ],
            'about_az'=>'nullable|max:20000',
            'about_en'=>'nullable|max:20000',
            'about_ru'=>'nullable|max:20000',
            'alt'=>'nullable|max:255',
        ],[],[
            'src'=>'Company',
            'group_id'=>'Group',
            'name'=>'Name',
            'about_az'=>'About(AZ)',
            'about_en'=>'About(EN)',
            'about_ru'=>'About(RU)',
        ]);

        $src   = $this->fileUpdate($company->src, $request->hasFile('src'), $request->src, 'files/company/');
        $company->update([
            'src'=>$src,
            'group_id'=>$request->group_id,
            'name'=>$request->name,
            'slug'=>str_slug($request->name),
            'about_az'=>$request->about_az,
            'about_en'=>$request->about_en,
            'about_ru'=>$request->about_ru,
            'alt'=>$request->alt,
        ]);

        toastr()->success('Data redakte edildi','Əla');
        return redirect()->route('company.edit',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id)
    {
        $company = Company::whereId($id)->firstOrFail();
        $this->fileDelete('files/company/'.$company->src);
        $company->delete();
        toastr()->success('Data silindi');
        return redirect()->route('company.index');
    }
}
