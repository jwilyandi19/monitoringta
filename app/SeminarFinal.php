<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeminarFinal extends Model
{
    protected $table = 'seminar_final';
    protected $primaryKey='id_sf';
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = [
    'id_sf',
    'id_js',
    'id_dosen',
    'created_at',
    'updated_at',
    ];

    public function jadwalSeminar(){
    	return $this->belongsTo('App\JadwalSeminar', 'id_js', 'id_js');
    }

    public function dosen(){
    	return $this->belongsTo('App\Dosen', 'id_dosen', 'id_dosen');
    }
}
