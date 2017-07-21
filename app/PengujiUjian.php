<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PengujiUjian extends Model
{
    protected $table = 'peguji_ujian';
    protected $primaryKey='id_penguji_u';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
    'id_penguji_u',
    'id_ujian_ta',
    'id_dosen',
    'konfirmasi',
    ];

    public function ujianTA(){
    	return $this->belongsTo('App\UjianTA', 'id_ujian_ta', 'id_ujian_ta');
    }

    public function dosen(){
    	return $this->belongsTo('App\Dosen', 'id_dosen', 'id_dosen');
    }
}
