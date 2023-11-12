<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catatan extends Model
{
    use HasFactory;


    public function kejuaraan(){
        return $this->belongsTo('App\Models\Kejuaraan','id_kejuaraan');
    }

    public function atlet(){
        return $this->belongsTo('App\Models\Atlet','id_atlet');
    }

    public function pelatih(){
        return $this->belongsTo('App\Models\Pelatih','id_pelatih');
    }
}
