<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $lang = request('lang', 'az');
        $services = Service::orderBy('order_no')->get()->map(fn($s) => [
            'id'      => $s->id,
            'name'    => $s->{'name_'.$lang} ?? $s->name_az,
            'desc'    => $s->{'desc_'.$lang} ?? $s->desc_az,
            'slug'    => $s->slug,
            'icon'    => $s->icon,
            'on_home' => (bool) $s->on_home,
        ]);
        return response()->json(['data' => $services]);
    }

    public function show($id)
    {
        $lang = request('lang', 'az');
        $service = Service::with('products')->find($id);
        if (!$service) return response()->json(['message' => 'Not found'], 404);

        return response()->json([
            'data' => [
                'id'       => $service->id,
                'name'     => $service->{'name_'.$lang} ?? $service->name_az,
                'desc'     => $service->{'desc_'.$lang} ?? $service->desc_az,
                'slug'     => $service->slug,
                'icon'     => $service->icon,
                'products' => $service->products->map(fn($p) => [
                    'id'    => $p->id,
                    'name'  => $p->{'name_'.$lang} ?? $p->name_az,
                    'image' => $p->images->first()
                                ? asset('storage/'.$p->images->first()->image)
                                : null,
                ]),
            ]
        ]);
    }
}
