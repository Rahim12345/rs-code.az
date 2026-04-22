<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ContactAdminController extends Controller
{
    public function index()
    {
        $contacts = DB::table('contacts')->orderByDesc('id')->get();
        return view('back.contacts.index', compact('contacts'));
    }

    public function show($id)
    {
        $contact = DB::table('contacts')->where('id', $id)->firstOrFail();
        return view('back.contacts.show', compact('contact'));
    }

    public function delete(Request $request)
    {
        DB::table('contacts')->where('id', $request->id)->delete();
        return response()->json(['status' => 1, 'message' => 'Silindi']);
    }
}
