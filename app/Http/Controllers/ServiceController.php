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
                $services   = Service::orderBy('order_no','asc')->get();
                $output     = '';
                foreach($services as $item)
                {
                    $output .= '<tr id="'.$item->id.'">';
                    $output .= '<td data-label="Name(AZ)">'.$item->name_az.'</td>';
                    $output .= '<td data-label="Name(EN)">'.$item->name_en.'</td>';
                    $output .= '<td data-label="Name(RU)">'.$item->name_ru.'</td>';
                    $output .= '<td data-label="On Home">';
                    if ($item->on_home)
                    {
                        $output .= '<a href="'.route('service.changer',['id'=>$item->id]).'" class="btn btn-primary"><i class="fa fa-check"></i></a>';
                    }
                    else
                    {
                        $output .= '<a href="'.route('service.changer',['id'=>$item->id]).'" class="btn btn-danger"><i class="fa fa-times"></i></a>';
                    }
                    $output .= '</td>';
                    $output .= '

            <td data-label="Action">
                <div class="btn-list flex-nowrap d-flex">
                    <a href="'.route('services.edit',$item->id).'" class="btn btn-primary mr-1"><i class="fa fa-pen"></i></a>
                    <form action="'.route('services.destroy',$item->id).'" method="POST">
                    '.csrf_field().'
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-danger" type="submit" onclick="return confirm(\'Silmək istədiyinizdən əminsiniz?\')"><i class="fa fa-times"></i></button>
                    </form>
                </div>
            </td>
            ';
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

        toastr()->success('Data əlavə edildi','Əla');
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

        toastr()->success('Data redaktə edildi','Əla');
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

        toastr()->success('Data silindi','Əla');
        return redirect()->route('services.index');
    }

    public function serviceChanger($id)
    {
        $service = Service::findOrFail($id);
        $service->update([
            'on_home'=>$service->on_home == 0 ? 1 : 0
        ]);

        toastr()->success('Status dəyişdirildi','Əla');
        return redirect()->route('services.index');
    }
}
