<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Latihan extends Model
{
    use HasFactory;
    protected $table = 'latihans';

    public function jadwalLatihan(){
        return $this->belongsTo('App\Models\JadwalLatihan','jadwal_latihan_id');
    }

    public function grup(){
        return $this->belongsTo('App\Models\Grup','grup_id');
    }

     
    public function catatanPelatih(){
        return $this->hasMany('App\Models\CatatanPelatih','latihan_id','id');
    }
    public function catatanPartner(){
        return $this->hasMany('App\Models\CatatanPartner','latihan_id','id');
    }
   
}
