<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Latihan extends Model
{
    use HasFactory;
    protected $table = "jadwal_latihans";
    public function atlets() {
        return $this->belongsToMany(Atlet::class, 
                    'atlet_jadwal_latihan',
                    'jadwal_latihan_id','atlet_id')->withPivot('catatan');
    }
}
