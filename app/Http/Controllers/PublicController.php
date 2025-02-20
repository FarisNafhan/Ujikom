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
        $albums = album::all();
        $fotos = foto::inRandomOrder()->with('likes', 'komentar')->get();

        foreach ($fotos as $foto) {
            $foto->is_liked = $foto->likes->where('user_id', $user_id)->count() > 0;
            $foto->like_count = $foto->likes->count();
            $foto->komen_count = $foto->komentar->count();
        }
        return view('galery.home', compact('fotos', 'albums'));
    }

    // public function notif()
    // {

    // }

    public function detail_foto($id)
    {
        $foto = foto::with('komentar')->findOrFail($id);
        return view('galery.detail_foto' ,compact('foto'));
    }

    public function download_foto($id)
    {
        $foto = Foto::findOrFail($id);

        $file = storage_path('app/public/' . $foto->lokasifile);

        if (file_exists($file)) {
            return response()->download($file);
        } else {
            return abort(404, 'File Not Found');
        }
    }

    public function laporan()
    {
        $user_id = auth()->id();
        $fotos = foto::where('user_id', $user_id)->with('likes', 'komentar')->get();

        return view('galery.laporan', compact('fotos'));
    }
}
