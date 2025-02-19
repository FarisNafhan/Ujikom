<?php

namespace App\Http\Controllers;

use App\Models\like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like(Request $request, $foto_id)
    {
        $userId = auth()->id();
        $like = like::where('user_id', $userId)->where('foto_id', $foto_id)->first();

        if ($like) {
            $like->delete();
            return response()->json(['massage' => 'Unliked']);
        } else {
            like::create([
                'user_id' => $userId,
                'foto_id' => $foto_id,
                'tanggal' => now(),
            ]);
            return response()->json(['massage'=> 'Liked']);
        }
    }
}
