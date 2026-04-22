<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Service;
use App\Traits\FileUploader;
use Illuminate\Http\Request;
use Validator;

class ProductController extends Controller
{
    use FileUploader;

    private array $attrs = [
        'title_az'   => 'Başlıq (AZ)',
        'title_en'   => 'Title (EN)',
        'title_ru'   => 'Заголовок (RU)',
        'slug_az'    => 'Slug (AZ)',
        'slug_en'    => 'Slug (EN)',
        'slug_ru'    => 'Slug (RU)',
        'text_az'    => 'Mətn (AZ)',
        'text_en'    => 'Content (EN)',
        'text_ru'    => 'Текст (RU)',
        'service_id' => 'Xidmət',
        'company_id' => 'Şirkət',
        'src'        => 'Kapak şəkli',
        'price'      => 'Qiymət',
        'price_old'  => 'Köhnə qiymət',
        'unit'       => 'Ölçü vahidi',
        'sku'        => 'SKU / Barkod',
        'stock'      => 'Stok',
    ];

    public function index(Request $request)
    {
        $query = Product::with('service')->orderBy('order_no')->orderByDesc('id');

        if ($search = $request->get('q')) {
            $query->where(function ($q) use ($search) {
                $q->where('title_az', 'like', "%{$search}%")
                  ->orWhere('title_en', 'like', "%{$search}%")
                  ->orWhere('sku', 'like', "%{$search}%");
            });
        }
        if ($sid = $request->get('service_id')) {
            $query->where('service_id', $sid);
        }
        if ($request->has('status') && $request->get('status') !== '') {
            $query->where('status', $request->get('status'));
        }

        $products = $query->paginate(20)->withQueryString();
        $services = Service::orderBy('name_az')->get();

        return view('back.products.index', compact('products', 'services'));
    }

    public function ordered(Request $request)
    {
        $this->validate($request, [
            'id'       => 'required|exists:products,id',
            'order_no' => 'required|integer|between:0,100000',
        ]);
        Product::findOrFail($request->id)->update(['order_no' => $request->order_no]);
    }

    public function reorder(Request $request)
    {
        $this->validate($request, ['ids' => 'required|array']);
        foreach ($request->ids as $index => $id) {
            Product::whereId($id)->update(['order_no' => $index + 1]);
        }
        return response()->json(['message' => 'Sıra yeniləndi']);
    }

    public function create()
    {
        return view('back.products.create', [
            'services'  => Service::orderBy('name_az')->get(),
            'companies' => Company::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title_az'   => 'required|max:255',
            'title_en'   => 'required|max:255',
            'title_ru'   => 'required|max:255',
            'slug_az'    => 'required|max:255',
            'slug_en'    => 'required|max:255',
            'slug_ru'    => 'required|max:255',
            'text_az'    => 'required',
            'text_en'    => 'required',
            'text_ru'    => 'required',
            'service_id' => 'required|exists:services,id',
            'src'        => 'required|image|max:4096',
            'images'     => 'nullable|array',
            'images.*'   => 'image|max:4096',
        ], [], $this->attrs);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $src     = $this->fileSave('files/products/covers/', $request, 'src');
        $product = Product::create([
            'service_id' => $request->service_id,
            'company_id' => null,
            'src'        => $src,
            'title_az'   => $request->title_az,
            'title_en'   => $request->title_en,
            'title_ru'   => $request->title_ru,
            'slug_az'    => $request->slug_az,
            'slug_en'    => $request->slug_en,
            'slug_ru'    => $request->slug_ru,
            'text_az'    => $request->text_az,
            'text_en'    => $request->text_en,
            'text_ru'    => $request->text_ru,
            'link'       => $request->link,
            'order_no'   => 0,
        ]);

        foreach ($this->multiFileSave('files/products/images/', $request, 'images') as $name) {
            ProductImage::create(['product_id' => $product->id, 'src' => $name]);
        }

        return response()->json(['message' => 'Məhsul uğurla əlavə olundu', 'id' => $product->id]);
    }

    public function edit(Product $product)
    {
        return view('back.products.edit', [
            'services'  => Service::orderBy('name_az')->get(),
            'companies' => Company::orderBy('name')->get(),
            'product'   => $product,
        ]);
    }

    public function update(Request $request, Product $product)
    {
        $validator = Validator::make($request->all(), [
            'title_az'   => 'required|max:255',
            'title_en'   => 'required|max:255',
            'title_ru'   => 'required|max:255',
            'slug_az'    => 'required|max:255',
            'slug_en'    => 'required|max:255',
            'slug_ru'    => 'required|max:255',
            'text_az'    => 'required',
            'text_en'    => 'required',
            'text_ru'    => 'required',
            'service_id' => 'required|exists:services,id',
            'src'        => 'nullable|image|max:4096',
            'images'     => 'nullable|array',
            'images.*'   => 'image|max:4096',
        ], [], $this->attrs);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $src = $this->fileUpdate(
            $product->src,
            $request->hasFile('src'),
            $request->file('src'),
            'files/products/covers/'
        );

        $product->update([
            'service_id' => $request->service_id,
            'src'        => $src,
            'title_az'   => $request->title_az,
            'title_en'   => $request->title_en,
            'title_ru'   => $request->title_ru,
            'slug_az'    => $request->slug_az,
            'slug_en'    => $request->slug_en,
            'slug_ru'    => $request->slug_ru,
            'text_az'    => $request->text_az,
            'text_en'    => $request->text_en,
            'text_ru'    => $request->text_ru,
            'link'       => $request->link,
            'status'     => 1,
        ]);

        foreach ($this->multiFileSave('files/products/images/', $request, 'images') as $name) {
            ProductImage::create(['product_id' => $product->id, 'src' => $name]);
        }

        return response()->json(['message' => 'Məhsul uğurla yeniləndi']);
    }

    public function show(Product $product)
    {
        $this->destroyProduct($product);
        return redirect()->route('product.index');
    }

    public function destroy(Product $product)
    {
        $this->destroyProduct($product);
        return response()->json(['status' => 1, 'message' => 'Uğurla silindi']);
    }

    private function destroyProduct(Product $product): void
    {
        $this->fileDelete('files/products/covers/' . $product->src);
        foreach ($product->images as $image) {
            $this->fileDelete('files/products/images/' . $image->src);
            $image->delete();
        }
        $product->delete();
    }
}
