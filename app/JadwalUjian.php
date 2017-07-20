<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JadwalUjian extends Model
{
    protected $table = 'jadwal_ujian';
    protected $primaryKey='id_ju';
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = [
    'id_ju',
    'tanggal',
    'sesi',
    'created_at',
    'updated_at',
    ];

    public function ketersediaanUjian(){
        return $this->hasMany('App\KetersediaanUjian', 'id_ju', 'id_ju');
    }

    public function ujianTAs(){
        return $this->hasMany('App\UjianTA', 'id_ju', 'id_ju');
    }

    public function ujianFinals(){
        return $this->hasMany('App\UjianFinal', 'id_ju', 'id_ju');
    }
}
