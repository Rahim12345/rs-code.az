<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Partner;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::all()->map(fn($p) => [
            'id'    => $p->id,
            'name'  => $p->name,
            'image' => $p->image ? asset('storage/'.$p->image) : null,
        ]);
        return response()->json(['data' => $partners]);
    }
}
