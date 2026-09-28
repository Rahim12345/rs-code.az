<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function show(string $slug)
    {
        $product = __('products.items.' . $slug);
        abort_unless(is_array($product), 404);

        return view('front.product', ['slug' => $slug, 'product' => $product]);
    }
}
