<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = User::find(Auth::user()->id)->first();
        return view('pages.auth-backend.profile', [
            'user' => $user,
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'profile_picture' => ['nullable', 'mimes:jpg,jpeg,png'],
        ]);
        $user = User::findOrFail(Auth::user()->id)->first();

        if ($request->hasFile('profile_picture')) {
            $profileValue = $request->profile_picture;
            $filename = time() . date('Y-m-d') . '.' . $profileValue->getClientOriginalExtension();
            $request->profile_picture->storeAs('user', $filename, 'public');
        }
        $user->update([
            'name' => $request->name,
            'profile_picture' => $request->has('profile_picture') ?
                $filename : $user->profile_picture
        ]);
        Alert::toast('Profile berhasil diubah', 'success');
        return redirect()->route('admin.profile');
    }
}
