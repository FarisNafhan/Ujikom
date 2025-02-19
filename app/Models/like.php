<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class like extends Model
{
    protected $table = "likes";

    protected $fillable = ['user_id', 'foto_id', 'tanggal'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function foto()
    {
        return $this->belongsTo(foto::class,'foto_id');
    }
}
