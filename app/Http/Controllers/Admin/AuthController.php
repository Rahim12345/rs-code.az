<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Admin;
use PragmaRX\Google2FA\Google2FA;
use Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'    => 'required|email',
            'password' => 'required|min:3|max:30',
        ], [
            'email.required'    => 'Email\'i daxil edin',
            'password.required' => 'Şifrəni daxil edin',
            'email.email'       => 'Email formatı düzgün deyil',
            'password.min'      => 'Şifrə minimum 3 simvoldan ibarət olmalıdır',
            'password.max'      => 'Şifrə maksimum 30 simvoldan ibarət ola bilər',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();

            if ($user->two_factor_enabled) {
                Auth::logout();
                $request->session()->put('2fa_user_id', $user->id);
                return redirect('/admin/2fa-challenge');
            }

            return redirect('/admin/dashboard');
        }

        return redirect()->back()->with('error', 'Email və ya şifrə yanlışdır');
    }

    public function twofaChallenge()
    {
        if (!session('2fa_user_id')) {
            return redirect('/admin/login');
        }
        return view('back.login-2fa');
    }

    public function twofaVerify(Request $request)
    {
        $userId = session('2fa_user_id');

        if (!$userId) {
            return redirect('/admin/login');
        }

        $validator = Validator::make($request->all(), [
            'code' => 'required|digits:6',
        ], [
            'code.required' => 'Kodu daxil edin',
            'code.digits'   => '6 rəqəmli kod daxil edin',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $user   = Admin::find($userId);
        $google = new Google2FA();
        $valid  = $google->verifyKey($user->two_factor_secret, $request->code);

        if (!$valid) {
            return redirect()->back()->withErrors(['code' => 'Kod yanlışdır və ya vaxtı keçib. Yenidən cəhd edin.']);
        }

        Auth::login($user);
        $request->session()->forget('2fa_user_id');

        return redirect('/admin/dashboard');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/admin/login');
    }
}
