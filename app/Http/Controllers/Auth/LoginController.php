<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{ 
    public function login(Request $request)
    {
        if (!$request->filled('no_tlp') || !$request->filled('password')) {
            return back()->with('error', 'No Telepon dan Password wajib diisi');
        }

        $user = User::where('no_tlp', $request->no_tlp)->first();

        if (!$user){
            return back()->with('error', 'No Telepon tidak terdaftar');
        }

        if (!Hash::check($request->password, $user->password)){
            return back()->with('error', 'Password salah');
        }

        if ($user->status !=1) {
            return back()->with('error', 'Akun belum aktif, Harap Kontak Admin');
        }

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->intended('/dashboard')->with('success', 'Login berhasil!');

    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
