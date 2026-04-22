<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index()
    {
        $lang = request('lang', 'az');
        $comments = Comment::latest()->get()->map(fn($c) => [
            'id'       => $c->id,
            'name'     => $c->name,
            'position' => $c->{'position_'.$lang} ?? $c->position_az ?? null,
            'text'     => $c->{'text_'.$lang} ?? $c->text_az,
            'rating'   => $c->rating ?? 5,
            'image'    => $c->image ? asset('storage/'.$c->image) : null,
        ]);
        return response()->json(['data' => $comments]);
    }
}
