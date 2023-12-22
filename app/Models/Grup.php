<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grup extends Model
{
    use HasFactory;
    protected $table = "grups";

    public function pasangans(){
        return $this->hasMany('App\Models\Pasangan','grup_id', 'id');
    }

    public function latihans(){
        return $this->hasMany('App\Models\Latihan','grup_id', 'id');
    }
}
