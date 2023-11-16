<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kejuaraan extends Model
{
    use HasFactory;

    public function prestasis(){
        return $this->hasMany('App\Models\Prestasi','id_kejuaraan','id');
    }

    public function catatans(){
        return $this->hasMany('App\Models\Catatan','id_kejuaraan','id');
    }

    public function atlets() {
        return $this->belongsToMany(Atlet::class, 
                    'atlet_kejuaraan',
                    'kejuaraan_id','atlet_id')->withPivot('catatan');
    }
}
