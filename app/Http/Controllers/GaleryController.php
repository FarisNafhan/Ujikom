<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\User;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class GaleryController extends Controller
{
    public function Galery()
    {
        $user_id = auth()->id();
        $fotos = foto::inRandomOrder()->where('user_id', $user_id)->with('likes', 'komentar')->get();

        foreach ($fotos as $foto) {
            $foto->is_liked = $foto->likes->where('user_id', $user_id)->count() > 0;
            $foto->like_count = $foto->likes->count();
            $foto->komen_count = $foto->komentar->count();
        }
        return view('galery.galery', compact('fotos'));
    }

    public function NewGalery()
    {
        $user_id = auth()->id();
        $albums = Album::where('user_id', $user_id)->get();
        return view('galery.new_galery', compact('albums'));
    }

    public function downloadFoto($id)
    {
        $foto = Foto::findOrFail($id);

        $file = storage_path('app/public/' . $foto->lokasifile);

        if (file_exists($file)) {
            return response()->download($file);
        } else {
            return abort(404, 'File Not Found');
        }
    }

    public function AddGalery(Request $request)
    {
        Log::info('Data dari form yang dikirim:', $request->all());

        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
            'lokasifile' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'album_id' => 'required|exists:albums,id',
        ]);

        if ($request->hasFile('lokasifile')) {
            $filePath = $request->file('lokasifile')->store('galery', 'public');
            Log::info('File uploaded successfully: ' . $filePath);
        } else {
            Log::warning('No file uploaded.');
        }


        Foto::create([
            'judul' => $request->input('judul'),
            'deskripsi' => $request->input('deskripsi'),
            'lokasifile' => $filePath,
            'album_id' => $request->input('album_id'),
            'user_id' => Auth::id(),
        ]);
        return redirect()->route('galery')->with('success', 'Gacor Kang 🔥🔥🔥');
    }

    public function detailFoto($id)
    {
        $foto = foto::with('komentar')->findOrFail($id);
        return view('galery.detailFoto' ,compact('foto'));
    }
}
