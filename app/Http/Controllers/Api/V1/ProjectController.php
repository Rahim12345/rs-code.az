<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $lang     = request('lang', 'az');
        $perPage  = (int) request('per_page', 12);

        $projects = Project::with('images')
            ->orderBy('order_no')
            ->paginate($perPage);

        return response()->json([
            'data'       => collect($projects->items())->map(fn($p) => $this->format($p, $lang)),
            'pagination' => [
                'total'        => $projects->total(),
                'per_page'     => $projects->perPage(),
                'current_page' => $projects->currentPage(),
                'last_page'    => $projects->lastPage(),
            ],
        ]);
    }

    public function show($id)
    {
        $lang    = request('lang', 'az');
        $project = Project::with('images')->find($id);
        if (!$project) return response()->json(['message' => 'Not found'], 404);
        return response()->json(['data' => $this->format($project, $lang, true)]);
    }

    private function format(Project $p, string $lang, bool $full = false): array
    {
        $data = [
            'id'     => $p->id,
            'name'   => $p->{'name_'.$lang} ?? $p->name_az,
            'image'  => $p->images->first() ? asset('storage/'.$p->images->first()->image) : null,
            'images' => $p->images->map(fn($i) => asset('storage/'.$i->image))->values(),
        ];
        if ($full) {
            $data['desc'] = $p->{'desc_'.$lang} ?? $p->desc_az;
        }
        return $data;
    }
}
