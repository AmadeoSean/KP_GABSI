<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatatanPartner extends Model
{
    use HasFactory;

    public function latihan(){
        return $this->belongsTo('App\Models\Latihan','latihan_id');
    }
    
    public function atlet(){
        return $this->belongsTo('App\Models\Atlet','atlet_id');
    }
}
