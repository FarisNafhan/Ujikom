<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\User;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GaleryController extends Controller
{
    public function galery()
    {
        $user_id = auth()->id();
        $fotos = foto::where('user_id', $user_id)->with('likes', 'komentar')->get();

        foreach ($fotos as $foto) {
            $foto->is_liked = $foto->likes->where('user_id', $user_id)->count() > 0;
            $foto->like_count = $foto->likes->count();
            $foto->komen_count = $foto->komentar->count();
        }
        return view('galery.galery', compact('fotos'));
    }

    public function new_galery()
    {
        $user_id = auth()->id();
        $albums = Album::where('user_id', $user_id)->get();
        return view('galery.new_galery', compact('albums'));
    }

    public function add_galery(Request $request)
    {
        Log::info('Data dari form yang dikirim:', $request->all());

        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
            'lokasifile' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5048',
            'album_id' => 'required|exists:albums,id',
        ]);

        if ($request->hasFile('lokasifile')) {
            $file = $request->file('lokasifile');
            $filename = time() . '_' . $file->getClientOriginalName();
            $filePath = $request->file('lokasifile')->storeAs('galery', $filename, 'public');
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
        return redirect()->route('Galery')->with('success', 'Galery baru berhasil ditambahkan!!');
    }

    public function detail_galery($id)
    {

        $foto = foto::with('album')->findOrFail($id);
        $albums = album::all();
        return view('galery.detail_galery',compact('foto', 'albums'));
    }

    public function update_galery(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
            'lokasifile' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5048',
            'album_id' => 'required|exists:albums,id',
        ]);

        $foto = Foto::findOrFail($id);

        if (!$foto) {
            return redirect()->route('foto')->with('error', 'foto tidak ditemukan!');
        }

        if ($request->hasFile('lokasifile')) {
            Storage::delete('/public' . $foto->lokasifile);

            $path = $request->file('lokasifile')->store('galery', 'public');
            $foto->lokasifile = $path;
        }

        $foto -> update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'album_id' => 'required|exists:album,id',
        ]);

        return redirect()->route('Galery')->with('success','Data Foto berhasil Diubah');
    }
    public function delete_galery($id)
    {
        $foto = foto::findOrFail($id);
        $foto->delete();

        return redirect()->route('Galery')->with('success','Galery Berhasil di Hapus!!!');
    }
}
