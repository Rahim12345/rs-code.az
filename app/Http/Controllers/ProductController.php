<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\ProductImage;
use App\Models\Service;
use App\Traits\FileUploader;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    use FileUploader;
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $data = Product::with('service')
                ->latest()
                ->get();

            return DataTables::of($data)

                ->editColumn('src', function ($row) {
                    return $row->src == '' ? '' : '<img style="width:50px;height:50px" src="'.asset('files/products/covers/'.$row->src).'" alt="'.$row->title_az.'" />';
                })

                ->editColumn('service_id', static function ($row) {
                    return $row->service->name_az;
                })

                ->addColumn('action',function ($row){
                    return '
                <div class="btn-list flex-nowrap">
                    <a href="javascript:void(0)" class="btn btn-danger MehsulDeleter" data-id="'.$row->id.'" data-bs-toggle="modal" data-bs-target="#modal-danger">
                      <i class="fa fa-times"></i>
                    </a>
                    <a class="btn btn-info myIdeaEditor"
                    href="'.route('product.edit',[$row->id]).'"><i class="fa fa-edit"></i></a>
                </div>
                ';
                })

                ->addColumn('order_no', static function ($row){
                    return '
                <input type="number" min="0" max="1000000" value="'.$row->order_no.'" class="form-control productNo" data-id="'.$row->id.'">
                ';
                })

                ->rawColumns(['src','action','order_no'])

                ->make(true);
        }

        return view('back.products.index');
    }

    public function ordered(Request $request)
    {
        $this->validate($request,[
           'id'=>'required|exists:products,id',
            'order_no'=>"required|integer|between:0,100000"
        ]);

        $product = Product::findOrFail($request->id);
        $product->update([
            'order_no'=>$request->order_no
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('back.products.create',[
            'services'=>Service::latest()->get(),
            'companies'=>Company::latest()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProductRequest $request
     * @return RedirectResponse
     */
    public function store(StoreProductRequest $request)
    {
        $src        = $this->fileSave('files/products/covers/',$request,'src');
        $product    = Product::create([
            'service_id'=>$request->service_id,
            'company_id'=>$request->company_id,
            'src'=>$src,
            'title_az'=>$request->title_az,
            'title_en'=>$request->title_en,
            'title_ru'=>$request->title_ru,
            'slug_az'=>str_slug($request->title_az),
            'slug_en'=>str_slug($request->title_en),
            'slug_ru'=>str_slug($request->title_ru),
            'text_az'=>$request->text_az,
            'text_en'=>$request->text_en,
            'text_ru'=>$request->text_ru,
            'alt'=>$request->alt,
            'link'=>$request->service_id == 49 ? $request->link : null,
        ]);

        $names        = $this->multiFileSave('files/products/images/',$request,'images');
        foreach ($names as $name)
        {
            ProductImage::create([
                'product_id'=>$product->id,
                'src'=>$name
            ]);
        }

        toastr()->success('Data əlavə edildi','Əla');
        return redirect()->route('product.edit',$product->id);
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return RedirectResponse
     */
    public function show(Product $product)
    {
        $product->delete();
        toastr()->success('Data uğurla silindi','Əla');

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return Application|Factory|View
     */
    public function edit(Product $product)
    {
        return view('back.products.edit',[
            'services'=>Service::latest()->get(),
            'companies'=>Company::latest()->get(),
            'product'=>$product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param Product $product
     * @return RedirectResponse
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $src        = $this->fileUpdate($product->src, $request->hasFile('src'), $request->src, 'files/products/covers/');
        $product->update([
            'service_id'=>$request->service_id,
            'company_id'=>$request->company_id,
            'src'=>$src,
            'title_az'=>$request->title_az,
            'title_en'=>$request->title_en,
            'title_ru'=>$request->title_ru,
            'slug_az'=>str_slug($request->title_az),
            'slug_en'=>str_slug($request->title_en),
            'slug_ru'=>str_slug($request->title_ru),
            'text_az'=>$request->text_az,
            'text_en'=>$request->text_en,
            'text_ru'=>$request->text_ru,
            'alt'=>$request->alt,
            'link'=>$request->service_id == 49 ? $request->link : null,
        ]);

        $names        = $this->multiFileSave('files/products/images/',$request,'images');
        foreach ($names as $name)
        {
            ProductImage::create([
                'product_id'=>$product->id,
                'src'=>$name
            ]);
        }

        toastr()->success('Data redaktə edildi','Əla');
        return redirect()->route('product.edit',$product->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return RedirectResponse
     */
    public function destroy(Product $product)
    {
        $this->fileDelete('files/products/covers/'.$product->src);

        foreach ($product->images as $image)
        {
            $this->fileDelete('files/products/images/'.$image->src);
            $image->delete();
        }

        $product->delete();
        toastr()->success('Data silindi','Əla');
        return redirect()->back();
    }
}
