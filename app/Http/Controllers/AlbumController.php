<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AlbumController extends Controller
{
    public function album()
    {
        $users = auth()->id();
        $albums = Album::where('user_id', $users)->get();
        return view('galery.album', compact('albums'));
    }

    public function new_album()
    {
        $user = Auth::user();
        return view('galery.new_album', compact('user'));
    }

    public function add_album(Request $request)
    {

        Log::info('Request data received for AddAlbum:', $request->all());

        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
        ]);



        Album::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'tanggal' => now(),
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('album')->with('success', 'album berhasil ditambahkan!');
    }

    public function detail_album($id)
    {
        $album = album::findOrFail($id);
        return view('galery.detail_album', compact('album'));
    }

    public function save_album(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
        ]);

        $album = album::find($id);
        if (!$album) {
            return redirect()->route('album')->with('error', 'Album tidak ditemukan!');
        }

        $album -> update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('album')->with('success', 'album berhasil diperbarui!!!');
    }
    public function delete_album($id)
    {
        $album = album::findOrFail($id);
        $album->delete();

        return redirect()->route('album')->with('success','Galery Berhasil di Hapus!!!');
    }
}
