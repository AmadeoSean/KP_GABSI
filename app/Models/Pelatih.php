<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelatih extends Model
{
    use HasFactory;

    public function atlets(){
        return $this->hasMany('App\Models\Atlet','id_pelatih','id');
    }

    public function catatans(){
        return $this->hasMany('App\Models\Catatan','id_pelatih','id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function JadwalLatihans(){
        return $this->hasMany('App\Models\JadwalLatihan','id_pelatih','id');
    }
}
