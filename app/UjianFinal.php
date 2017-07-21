<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UjianFinal extends Model
{
    protected $table = 'ujian_final';
    protected $primaryKey='id_uf';
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = [
    'id_uf',
    'id_ju',
    'id_dosen',
    'created_at',
    'updated_at',
    ];

    public function jadwalSeminar(){
    	return $this->belongsTo('App\JadwalSeminar', 'id_ju', 'id_ju');
    }

    public function dosen(){
    	return $this->belongsTo('App\Dosen', 'id_dosen', 'id_dosen');
    }
}
