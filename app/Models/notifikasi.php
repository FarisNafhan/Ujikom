<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class notifikasi extends Model
{
    protected $table = "notifikasis";

    protected $fillable = [
        "id_user","foto_id","type","message","status",
    ];

    public function user()
    {
        return $this->belongsTo(User::class,"user_id");
    }
    public function foto()
    {
        return $this->belongsTo(foto::class,"foto_id");
    }
}
