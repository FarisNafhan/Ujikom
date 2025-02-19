<?php

namespace App\Http\Controllers;

use App\Models\foto;
use App\Models\komen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KomenController extends Controller
{
    public function komentar(Request $request)
    {
        $user_id = auth()->id();

        // dd($request->all(), $foto_id);
        $request->validate([
            'foto_id' => 'required|exists:fotos,id',
            'isi' => 'required|string|max:255',
        ]);
        komen::create([
            'foto_id' => $request->foto_id,
            'user_id' => $user_id,
            'isi' => $request->isi,
            'tanggal' => now(),
        ]);

        $komen_count = komen::where('foto_id', $request->foto_id)->count();

        return redirect()->route('detail-foto', ['id' => $request->foto_id]);
    }

}
