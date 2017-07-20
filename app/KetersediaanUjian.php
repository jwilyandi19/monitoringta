<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KetersediaanUjian extends Model
{
    protected $table = 'ketersediaan_ujian';
    protected $primaryKey='id_ku';
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = [
    'id_ku',
    'id_ju',
    'id_dosen',
    'created_at',
    'updated_at',
    ];

    public function jadwalUjian(){
    	return $this->belongsTo('App\JadwalUjian', 'id_ju', 'id_ju');
    }

    public function dosen(){
    	return $this->belongsTo('App\Dosen', 'id_dosen', 'id_dosen');
    }
}
