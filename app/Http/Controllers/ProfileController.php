<?php

namespace App\Http\Controllers;

use App\Models\foto;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function my_galery()
    {
        $fotos = foto::all();
        return view("profile", compact('fotos'));
    }
}
