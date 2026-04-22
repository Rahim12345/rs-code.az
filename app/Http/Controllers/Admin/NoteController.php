<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Note;
use App\Models\NoteCategory;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index(Request $request)
    {
        $query = Note::with('category')->orderByDesc('id');

        if ($request->filled('category')) {
            $query->where('note_category_id', $request->category);
        }
        if ($request->filled('search')) {
            $q = $request->search;
            $query->where(function ($qb) use ($q) {
                $qb->where('title_az', 'like', "%$q%")
                   ->orWhere('title_en', 'like', "%$q%");
            });
        }

        $notes      = $query->paginate(30)->withQueryString();
        $categories = NoteCategory::orderBy('name_az')->get();
        return view('back.notes.index', compact('notes', 'categories'));
    }

    public function create()
    {
        $categories = NoteCategory::orderBy('name_az')->get();
        return view('back.notes.add', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title_az'          => 'required|string|max:191',
            'title_en'          => 'nullable|string|max:191',
            'body_az'           => 'required',
            'body_en'           => 'nullable',
            'note_category_id'  => 'nullable|exists:note_categories,id',
        ]);

        Note::create($request->only('title_az', 'title_en', 'body_az', 'body_en', 'note_category_id'));

        return response()->json(['message' => 'Qeyd uğurla əlavə olundu']);
    }

    public function edit($id)
    {
        $note       = Note::findOrFail($id);
        $categories = NoteCategory::orderBy('name_az')->get();
        return view('back.notes.edit', compact('note', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $note = Note::findOrFail($id);

        $request->validate([
            'title_az'          => 'required|string|max:191',
            'title_en'          => 'nullable|string|max:191',
            'body_az'           => 'required',
            'body_en'           => 'nullable',
            'note_category_id'  => 'nullable|exists:note_categories,id',
        ]);

        $note->update($request->only('title_az', 'title_en', 'body_az', 'body_en', 'note_category_id'));

        return response()->json(['message' => 'Qeyd uğurla yeniləndi']);
    }

    public function destroy(Request $request)
    {
        $note = Note::findOrFail($request->id);
        $note->delete();
        return response()->json(['status' => 1, 'message' => 'Qeyd silindi', 'id' => $note->id]);
    }
}
