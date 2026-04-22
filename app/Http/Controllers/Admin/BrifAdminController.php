<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class BrifAdminController extends Controller
{
    private array $types = [
        'web'       => ['table' => 'brif_vebs',    'label' => 'Veb Sayt',    'prefix' => 'web_'],
        'logo'      => ['table' => 'brif_logos',   'label' => 'Loqo',        'prefix' => ''],
        'naming'    => ['table' => 'brif_threes',  'label' => 'Adlandırma',  'prefix' => 'adlandirma_'],
        'smm'       => ['table' => 'brif_fours',   'label' => 'SMM',         'prefix' => 'smm_'],
        'seo'       => ['table' => 'brif_fives',   'label' => 'SEO',         'prefix' => 'seo_'],
    ];

    public function index()
    {
        $brifs = [];
        foreach ($this->types as $key => $cfg) {
            $rows = DB::table($cfg['table'])->orderByDesc('id')->get()->map(function ($row) use ($key, $cfg) {
                $p = $cfg['prefix'];
                return (object)[
                    'id'         => $row->id,
                    'type'       => $key,
                    'type_label' => $cfg['label'],
                    'sirketadi'  => $row->{$p.'sirketadi'} ?? ($row->sirketadi ?? '—'),
                    'ad'         => $row->{$p.'ad'}        ?? ($row->ad        ?? '—'),
                    'telefon'    => $row->{$p.'telefon'}   ?? ($row->telefon   ?? '—'),
                    'email'      => $row->{$p.'email'}     ?? ($row->email     ?? '—'),
                    'created_at' => $row->created_at,
                ];
            });
            $brifs[$key] = [
                'label' => $cfg['label'],
                'rows'  => $rows,
            ];
        }

        $total = array_sum(array_map(fn($b) => count($b['rows']), $brifs));

        return view('back.brifs.index', compact('brifs', 'total'));
    }

    public function show($type, $id)
    {
        abort_unless(array_key_exists($type, $this->types), 404);
        $cfg    = $this->types[$type];
        $record = DB::table($cfg['table'])->where('id', $id)->firstOrFail();
        return view('back.brifs.show', [
            'record'     => $record,
            'type'       => $type,
            'type_label' => $cfg['label'],
            'prefix'     => $cfg['prefix'],
        ]);
    }

    public function delete(Request $request)
    {
        $type = $request->type;
        abort_unless(array_key_exists($type, $this->types), 404);
        DB::table($this->types[$type]['table'])->where('id', $request->id)->delete();
        return response()->json(['status' => 1]);
    }
}
