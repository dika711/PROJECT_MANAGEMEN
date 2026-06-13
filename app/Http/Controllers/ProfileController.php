<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            return view('admin.profile', ['user' => $user]);
        }

        return view('user.profile', ['user' => $user]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'nickname' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'current_password' => ['required'],
            'password' => ['nullable', 'confirmed', 'min:8'],
        ]);

        // Verifikasi password lama
        if (! Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password lama tidak sesuai']);
        }

        $user->nickname = $request->nickname;
        $user->phone = $request->phone;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        // Redirect sesuai role
        if ($user->role === 'admin') {
            return redirect()->route('admin.profile')->with('status', 'Profil admin berhasil diperbarui');
        }

        return redirect()->route('user.profile')->with('status', 'Profil berhasil diperbarui');
    }
}
