<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Team;

class TeamController extends Controller
{
    public function index()
    {
        $lang = request('lang', 'az');
        $team = Team::orderBy('order_no')->get()->map(fn($t) => [
            'id'       => $t->id,
            'name'     => $t->{'name_'.$lang} ?? $t->name_az,
            'position' => $t->{'position_'.$lang} ?? $t->position_az,
            'image'    => $t->image ? asset('storage/'.$t->image) : null,
        ]);
        return response()->json(['data' => $team]);
    }
}
