<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalLatihan extends Model
{
    use HasFactory;
    protected $table = "jadwal_latihans";
     

    
    public function pelatih(){
        return $this->belongsTo('App\Models\Pelatih','id_pelatih');
    }

    
    public function latihan(){
        return $this->hasOne('App\Models\Latihan','jadwal_latihan_id','id');
    }
}
