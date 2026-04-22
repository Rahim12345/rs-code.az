<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\Partner;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    public function index()
    {
        $lang  = request('lang', 'az');
        $about = DB::table('abouts')->first();

        return response()->json([
            'about' => $about ? [
                'about'   => $about->{'about_'.$lang}  ?? $about->about_az,
                'image'   => $about->image ? asset('storage/'.$about->image) : null,
            ] : null,
            'team' => Team::orderBy('order_no')->get()->map(fn($t) => [
                'id'       => $t->id,
                'name'     => $t->{'name_'.$lang} ?? $t->name_az,
                'position' => $t->{'position_'.$lang} ?? $t->position_az,
                'image'    => $t->image ? asset('storage/'.$t->image) : null,
            ]),
            'partners' => Partner::all()->map(fn($p) => [
                'id'    => $p->id,
                'name'  => $p->name,
                'image' => $p->image ? asset('storage/'.$p->image) : null,
            ]),
            'stats' => [
                ['label' => ['az'=>'Tamamlanan layihə','en'=>'Completed projects','ru'=>'Выполненных проектов'], 'value'=>'150+'],
                ['label' => ['az'=>'İl təcrübə','en'=>'Years experience','ru'=>'Лет опыта'], 'value'=>'8+'],
                ['label' => ['az'=>'Aktiv müştəri','en'=>'Active clients','ru'=>'Активных клиентов'], 'value'=>'50+'],
                ['label' => ['az'=>'Müştəri məmnuniyyəti','en'=>'Client satisfaction','ru'=>'Удовлетворённость клиентов'], 'value'=>'100%'],
            ],
        ]);
    }
}
