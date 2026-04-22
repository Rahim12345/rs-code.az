<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'           => 'required|string|max:100',
            'sirket'         => 'required|string|max:100',
            'email'          => 'required|email|max:100',
            'elaqe_nomresi'  => 'required|string|max:50',
            'message'        => 'required|string|max:5000',
        ]);

        $validated['ip'] = $request->ip();

        Contact::create($validated);

        return response()->json([
            'message' => 'Mesajınız uğurla göndərildi. Tezliklə sizinlə əlaqə saxlayacağıq.',
        ], 201);
    }
}
