<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gabsi extends Model
{
    use HasFactory;

    public function atlets(){
        return $this->hasMany('App\Models\Atlet','id_gabsi','id');
    }
}
