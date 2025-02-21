<?php

namespace App\Http\Controllers;

use App\Models\foto;
use App\Models\user;
use App\Models\album;
use App\Models\like;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile()
    {
        $user = auth()->user();

        $totalFoto = foto::where("user_id", $user->id)->count();

        $totalAlbum = album::where("user_id", $user->id)->count();

        $likeTerbanyak = foto::withCount("likes")
            ->where('user_id', $user)
            ->orderBy('likes_count')
            ->first();

        return view('galery.profile', ['user' => $user, 't_foto' => $totalFoto, 't_album' => $totalAlbum, 'liketerbanyak' => $likeTerbanyak]);
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
