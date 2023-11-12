<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    use HasFactory;

    
    public function atlet(){
        return $this->belongsTo('App\Models\Atlet','id_atlet');
    }

    public function kejuaraan(){
        return $this->belongsTo('App\Models\Kejuaraan','id_kejuaraan');
    }
}
