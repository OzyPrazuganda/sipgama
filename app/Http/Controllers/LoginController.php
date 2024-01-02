<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pembayaran;
use App\Models\Permohonan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'Login'
        ]);
    }

    public function profile()
    {
        return view('login.profile', [
            'users' => User::all(['*'])
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'nik' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Memeriksa peran pengguna setelah berhasil masuk
            $user = Auth::user();
            if ($user->role == 'admin' || $user->role == 'bendahara' || $user->role == 'pimpinan') {
                return redirect()->intended('/dashboard_admin');
            } elseif ($user->role == 'warga') {
                return redirect()->intended('/dashboard_warga');
            }
        }

        Alert::error('Login Failed', 'Invalid credentials');

        return back();
    }


    public function logout(Request $request)
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('');
    }
}
