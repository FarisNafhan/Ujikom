<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\foto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    public function landing()
    {
        $fotos = foto::all();
        return view('galery.landing', compact('fotos'));
    }

    public function home()
    {
        $user_id = auth()->id();
        $fotos = foto::inRandomOrder()->with('likes', 'komentar')->get();

        foreach ($fotos as $foto) {
            $foto->is_liked = $foto->likes->where('user_id', $user_id)->count() > 0;
            $foto->like_count = $foto->likes->count();
            $foto->komen_count = $foto->komentar->count();
        }
        return view('galery.home', compact('fotos'));
    }
    public function notif()
    {

    }
}
