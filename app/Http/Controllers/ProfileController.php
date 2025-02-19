<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile()
    {
        $user = auth()->user();
        return view('galery.profile',compact('user'));
    }
    public function edit_profile()
    {
        $user = auth()->user();
        return view('galery.detail_profile', compact('user'));
    }

    public function save_profile(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email',
            'telepon' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
        ]);

        $user = auth()->user();
        $user -> update([
            'username' => $request->username,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
        ]);
        return redirect()->route('profile')->with('success', 'profile berhasil diperbarui');
    }
    
}
