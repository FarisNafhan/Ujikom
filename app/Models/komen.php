<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class komen extends Model
{
    protected $table = "komens";

    protected $fillable = ['foto_id','user_id','isi','tanggal'];

    public function foto()
    {
        return $this->belongsTo(foto::class, 'foto_id');
    }
    public function user()
    {
        return $this->belongsTo(user::class, 'user_id');
    }
}
