<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Note;
use App\Models\NoteCategory;

class NoteController extends Controller
{
    public function index()
    {
        $lang       = session('lang', 'az');
        $categories = NoteCategory::withCount('notes')->orderBy('name_' . $lang)->get();
        $notes      = Note::with('category')
                          ->orderByDesc('id')
                          ->get()
                          ->groupBy('note_category_id');

        return view('front.dev-notes', compact('notes', 'categories', 'lang'));
    }

    public function show($id)
    {
        $lang = session('lang', 'az');
        $note = Note::with('category')->findOrFail($id);
        return view('front.dev-note-detail', compact('note', 'lang'));
    }
}
