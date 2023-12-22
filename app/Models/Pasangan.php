<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasangan extends Model
{
    use HasFactory;
    public function atlet_1(){
        return $this->belongsTo('App\Models\Atlet','id_atlet_1');
    }
    public function atlet_2(){
        return $this->belongsTo('App\Models\Atlet','id_atlet_2');
    }

    public function grup(){
        return $this->belongsTo('App\Models\Grup','grup_id');
    }
    public function catatan_pelatihs(){
        return $this->hasMany('App\Models\catatan_pelatih','pasangan_id','id');
    }
}
