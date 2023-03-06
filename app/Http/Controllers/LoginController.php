<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('pages.auth-backend.login');
    }

    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);
        $user = User::where('email', $request->email)->first();
        if (!Hash::check($request->password, $user?->password)) {
            Alert::toast('Username atau Password salah !', 'error');
            return redirect()->back();
        }
        Auth::login($user, $request->remember);
        Alert::toast('Selamat Datang ' . Auth::user()->name, 'success');
        return redirect()->route('admin.dashboard');
    }
}
