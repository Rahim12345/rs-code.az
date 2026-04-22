<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function index()
    {
        $lang    = request('lang', 'az');
        $perPage = (int) request('per_page', 10);

        $blogs = DB::table('blogs')->orderByDesc('id')->paginate($perPage);

        return response()->json([
            'data'       => collect($blogs->items())->map(fn($b) => $this->format($b, $lang)),
            'pagination' => [
                'total'        => $blogs->total(),
                'per_page'     => $blogs->perPage(),
                'current_page' => $blogs->currentPage(),
                'last_page'    => $blogs->lastPage(),
            ],
        ]);
    }

    public function show($id)
    {
        $lang = request('lang', 'az');
        $blog = DB::table('blogs')->where('id', $id)->first();
        if (!$blog) return response()->json(['message' => 'Not found'], 404);
        return response()->json(['data' => $this->format($blog, $lang, true)]);
    }

    private function format(object $b, string $lang, bool $full = false): array
    {
        $photo = $b->photo;
        $image = ($photo && !str_starts_with($photo, 'http'))
                 ? asset('images/blog/'.$photo)
                 : ($photo ?: null);

        $data = [
            'id'     => $b->id,
            'title'  => $b->{'title_'.$lang} ?? $b->title_az,
            'review' => $b->{'review_'.$lang} ?? $b->review_az,
            'date'   => $b->{'date_'.$lang}   ?? $b->date_az,
            'image'  => $image,
        ];
        if ($full) {
            $data['body'] = $b->{'text_'.$lang} ?? $b->text_az;
        }
        return $data;
    }
}
