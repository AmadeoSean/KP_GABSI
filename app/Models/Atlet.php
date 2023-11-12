<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atlet extends Model
{
    use HasFactory;
    

    public function gabsi(){
        return $this->belongsTo(Gabsi::class,'id_gabsi');
    }
    
    public function pelatih(){
        return $this->belongsTo('App\Models\Pelatih','id_pelatih');
    }

    public function prestasis(){
        return $this->hasMany('App\Models\Prestasi','id_atlet','id');
    }

    public function catatans(){
        return $this->hasMany('App\Models\Catatan','id_atlet','id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }
}
