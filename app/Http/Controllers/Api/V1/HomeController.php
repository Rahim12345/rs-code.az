<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Project;
use App\Models\Partner;
use App\Models\Comment;
use App\Models\Team;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $lang = request('lang', 'az');

        $about = DB::table('abouts')->first();

        return response()->json([
            'about' => $about ? [
                'about'   => $about->{'about_'.$lang}  ?? $about->about_az,
                'mission' => $about->{'mission_'.$lang} ?? null,
                'image'   => $about->image ? asset('storage/'.$about->image) : null,
            ] : null,
            'services' => Service::where('on_home', 1)
                ->orderBy('order_no')
                ->get()
                ->map(fn($s) => [
                    'id'   => $s->id,
                    'name' => $s->{'name_'.$lang} ?? $s->name_az,
                    'desc' => $s->{'desc_'.$lang} ?? $s->desc_az,
                    'slug' => $s->slug,
                    'icon' => $s->icon,
                ]),
            'projects' => Project::where('home', 1)
                ->with('images')
                ->orderBy('order_no')
                ->limit(6)
                ->get()
                ->map(fn($p) => [
                    'id'    => $p->id,
                    'name'  => $p->{'name_'.$lang} ?? $p->name_az,
                    'image' => $p->images->first()
                                ? asset('storage/'.$p->images->first()->image)
                                : null,
                    'slug'  => $p->slug ?? $p->id,
                ]),
            'comments' => Comment::latest()->limit(6)->get()->map(fn($c) => [
                'id'     => $c->id,
                'name'   => $c->name,
                'text'   => $c->{'text_'.$lang} ?? $c->text_az,
                'rating' => $c->rating ?? 5,
                'image'  => $c->image ? asset('storage/'.$c->image) : null,
            ]),
            'partners' => Partner::all()->map(fn($p) => [
                'id'    => $p->id,
                'name'  => $p->name,
                'image' => $p->image ? asset('storage/'.$p->image) : null,
            ]),
            'team' => Team::orderBy('order_no')->limit(8)->get()->map(fn($t) => [
                'id'       => $t->id,
                'name'     => $t->{'name_'.$lang} ?? $t->name_az,
                'position' => $t->{'position_'.$lang} ?? $t->position_az,
                'image'    => $t->image ? asset('storage/'.$t->image) : null,
            ]),
            'stats' => [
                'projects' => Project::count(),
                'clients'  => 150,
                'years'    => 8,
                'services' => Service::count(),
            ],
        ]);
    }
}
