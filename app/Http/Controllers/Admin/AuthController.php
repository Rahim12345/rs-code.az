<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required|min:3|max:30'
        ];

        $messages = [
            'email.required' => 'Email\'i daxil edin',
            'password.required' => 'Şifrəni daxil edin',
            'email.email' => 'Email formatı düzgün deyil',
            'password.min' => 'Şifrə minimum 3 simvoldan ibarət olmalıdır',
            'password.max' => 'Şifrə maksimum 30 simvoldan ibarət ola bilər',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) 
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $email = $request->email;
        $password = $request->password;

        if (Auth::attempt(['email' => $email, 'password' => $password])) 
        {
            return redirect('/admin/dashboard');
        }
        else {
            return redirect()->back()->with('error', 'Email və ya şifrə yanlışdır');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/admin/login');
    }
}
