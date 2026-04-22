<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NoteCategory;
use Illuminate\Http\Request;

class NoteCategoryController extends Controller
{
    public function index()
    {
        $categories = NoteCategory::withCount('notes')->orderBy('name_az')->get();
        return view('back.notes.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('back.notes.categories.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_az' => 'required|string|max:191',
            'name_en' => 'required|string|max:191',
        ]);

        NoteCategory::create($request->only('name_az', 'name_en'));

        return response()->json(['message' => 'Kateqoriya uğurla əlavə olundu']);
    }

    public function edit($id)
    {
        $category = NoteCategory::findOrFail($id);
        return view('back.notes.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = NoteCategory::findOrFail($id);

        $request->validate([
            'name_az' => 'required|string|max:191',
            'name_en' => 'required|string|max:191',
        ]);

        $category->update($request->only('name_az', 'name_en'));

        return response()->json(['message' => 'Kateqoriya uğurla yeniləndi']);
    }

    public function destroy(Request $request)
    {
        $category = NoteCategory::findOrFail($request->id);
        $category->delete();
        return response()->json(['status' => 1, 'message' => 'Kateqoriya silindi']);
    }
}
