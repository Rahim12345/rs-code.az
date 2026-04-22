<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $lang    = request('lang', 'az');
        $perPage = (int) request('per_page', 12);

        $products = Product::with(['service', 'images'])
            ->paginate($perPage);

        return response()->json([
            'data'       => collect($products->items())->map(fn($p) => $this->format($p, $lang)),
            'pagination' => [
                'total'        => $products->total(),
                'per_page'     => $products->perPage(),
                'current_page' => $products->currentPage(),
                'last_page'    => $products->lastPage(),
            ],
        ]);
    }

    public function show($id)
    {
        $lang    = request('lang', 'az');
        $product = Product::with(['service', 'images'])->find($id);
        if (!$product) return response()->json(['message' => 'Not found'], 404);
        return response()->json(['data' => $this->format($product, $lang, true)]);
    }

    private function format(Product $p, string $lang, bool $full = false): array
    {
        $data = [
            'id'      => $p->id,
            'name'    => $p->{'name_'.$lang} ?? $p->name_az,
            'image'   => $p->images->first() ? asset('storage/'.$p->images->first()->image) : null,
            'images'  => $p->images->map(fn($i) => asset('storage/'.$i->image))->values(),
            'service' => $p->service ? [
                'id'   => $p->service->id,
                'name' => $p->service->{'name_'.$lang} ?? $p->service->name_az,
            ] : null,
        ];
        if ($full) {
            $data['desc'] = $p->{'desc_'.$lang} ?? $p->desc_az;
        }
        return $data;
    }
}
