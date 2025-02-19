<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $table = "albums";
    protected $fillable = ['nama', 'deskripsi', 'tanggal', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function galery()
    {
        return $this->belongsTo(foto::class, 'album_id');
    }
}
