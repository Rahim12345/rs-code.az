<?php

namespace App\Http\Controllers;

use App\Models\ProductImage;
use App\Http\Requests\StoreProductImageRequest;
use App\Http\Requests\UpdateProductImageRequest;
use App\Traits\FileUploader;
use http\Env\Request;

class ProductImageController extends Controller
{
    use FileUploader;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductImageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductImageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductImage  $productImage
     * @return \Illuminate\Http\Response
     */
    public function show(ProductImage $productImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductImage  $productImage
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductImage $productImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductImageRequest  $request
     * @param  \App\Models\ProductImage  $productImage
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductImageRequest $request, ProductImage $productImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductImage  $productImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductImage $productImage)
    {
        dd($productImage);
        $this->fileDelete('files/products/images/'.$productImage->src);
        $productImage->delete();
    }

    public function deleter($id)
    {
        $productImage   = ProductImage::findOrFail($id);
        $this->fileDelete('files/products/images/'.$productImage->src);
        $productImage->delete();

        toastr()->success('Data silindi','Əla');
        return redirect()->back();
    }

    public function ordered(\Illuminate\Http\Request $request)
    {
        $this->validate($request,[
           'imgID'=>'required|exists:product_images,id',
           'order_no'=>'required|integer|min:0',
        ],[],[
            'imgID'=>'Şəkil sırası'
        ]);

        $image = ProductImage::findOrFail($request->imgID);
        $image->update([
           'order_no'=>$request->order_no
        ]);

        return response('ok',200);
    }
}
