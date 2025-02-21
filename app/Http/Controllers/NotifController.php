<?php

namespace App\Http\Controllers;

use App\Models\foto;
use Illuminate\Http\Request;

class NotifController extends Controller
{
    public function notif()
    {
        $foto = foto::with('komentar');
        return view('galery.notif', compact('foto'));
    }
}
