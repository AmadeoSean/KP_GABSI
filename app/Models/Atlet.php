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

    public function kejuaraans() {
        return $this->belongsToMany(Kejuaraan::class, 
                    'atlet_kejuaraan',
                    'atlet_id','kejuaraan_id')->withPivot('catatan');
    }
    public function latihans() {
        return $this->belongsToMany(Latihan::class, 
                    'atlet_jadwal_latihan',
                    'atlet_id','jadwal_latihan_id')->withPivot('catatan');
    }
}
