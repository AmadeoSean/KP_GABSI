<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatatanPelatih extends Model
{
    use HasFactory;

    public function latihan(){
        return $this->belongsTo('App\Models\Latihan','latihan_id');
    }

    public function pasangan(){
        return $this->belongsTo('App\Models\Pasangan','pasangan_id');
    }
}
