<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Traits\FileUploader;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ServiceController extends Controller
{
    use FileUploader;

    public function loader()
    {
        if(isset($_POST["action"]))
        {
            if($_POST["action"] == 'fetch_data')
            {
                $services = Service::orderBy('order_no','asc')->get();
                $output   = '';
                foreach ($services as $item)
                {
                    $onHomeClass = $item->on_home ? 'btn-primary' : 'btn-danger';
                    $onHomeIcon  = $item->on_home ? 'fa-check' : 'fa-times';
                    $output .= '<tr id="'.$item->id.'" class="cursor-grab active:cursor-grabbing">';
                    $output .= '<td class="text-gray-300 text-center w-10"><i class="fa fa-grip-vertical"></i></td>';
                    $output .= '<td class="font-medium text-gray-900">'.e($item->name_az).'</td>';
                    $output .= '<td class="text-gray-600">'.e($item->name_en).'</td>';
                    $output .= '<td class="text-gray-600">'.e($item->name_ru).'</td>';
                    $output .= '<td><a href="'.route('service.changer',['id'=>$item->id]).'" class="'.$onHomeClass.' btn-sm"><i class="fa '.$onHomeIcon.'"></i></a></td>';
                    $output .= '<td class="text-end">';
                    $output .= '<div class="d-flex align-items-center justify-content-end gap-2 btn-group">';

                    $output .= '<a href="'.route('services.edit',$item->id).'"
                class="btn btn-primary btn-sm d-flex align-items-center justify-content-center"
                style="width:34px;height:34px;">
                <i class="fa fa-pen"></i>
            </a>';

                    $output .= '<form action="'.route('services.destroy',$item->id).'"
                method="POST"
                class="d-inline m-0 p-0"
                onsubmit="return confirm(\'Silmək istədiyinizdən əminsiniz?\')">';

                    $output .= csrf_field().'<input type="hidden" name="_method" value="DELETE">';

                    $output .= '<button type="submit"
                class="btn btn-danger btn-sm d-flex align-items-center justify-content-center"
                style="width:34px;height:34px;">
                <i class="fa fa-trash"></i>
            </button>';

                    $output .= '</form>';

                    $output .= '</div>';
                    $output .= '</td>';
                    $output .= '</tr>';
                }
                return $output;
            }

            if($_POST['action'] == 'update')
            {
                for($count = 0;  $count < count($_POST["page_id_array"]); $count++)
                {
                    Service::whereId($_POST["page_id_array"][$count])->update([
                        'order_no'=>($count+1)
                    ]);
                }
            }
        }

    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {

        return view('back.service.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('back.service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $src = $this->fileSave('files/services/',$request,'src');
        Service::create([
            'src'=>$src,
            'name_az'=>$request->name_az,
            'name_en'=>$request->name_en,
            'name_ru'=>$request->name_ru,
            'slug_az'=>str_slug($request->name_az),
            'slug_en'=>str_slug($request->name_en),
            'slug_ru'=>str_slug($request->name_ru),
            'alt'=>$request->alt,
        ]);

        return redirect()->route('services.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Service $service
     * @return Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Service $service
     * @return Application|Factory|View
     */
    public function edit(Service $service)
    {
        return view('back.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Service $service
     * @return RedirectResponse
     */
    public function update(Request $request, Service $service)
    {
        $src   = $this->fileUpdate($service->src, $request->hasFile('src'), $request->src, 'files/services/');
        $service->update([
            'src'=>$src,
            'name_az'=>$request->name_az,
            'name_en'=>$request->name_en,
            'name_ru'=>$request->name_ru,
            'slug_az'=>str_slug($request->name_az),
            'slug_en'=>str_slug($request->name_en),
            'slug_ru'=>str_slug($request->name_ru),
            'alt'=>$request->alt
        ]);

        return redirect()->route('services.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Service $service
     * @return RedirectResponse
     */
    public function destroy(Service $service)
    {
        $this->fileDelete('files/services/'.$service->src);
        $service->delete();

        return redirect()->route('services.index');
    }

    public function serviceChanger($id)
    {
        $service = Service::findOrFail($id);
        $service->update([
            'on_home'=>$service->on_home == 0 ? 1 : 0
        ]);

        return redirect()->route('services.index')->with('success', 'Status dəyişdirildi');
    }
}
