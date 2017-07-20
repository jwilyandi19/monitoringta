<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UjianTA extends Model
{
    protected $table = 'ujian_ta';
    protected $primaryKey='id_ujian_ta';
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = [
    'id_ujian_ta',
    'id_ta',
    'id_ju',
    'tanggal',
    'nilai',
    'nilai_angka',
    'evaluasi',
    'created_at',
    'updated_at',
    ];

    public function tugasAkhir(){
    	return $this->belongsTo('App\TugasAkhir', 'id_ta', 'id_ta');
    }

    public function konfirmasis(){
    	return $this->hasMany('App\PengujiUjian', 'id_ujian_ta', 'id_ujian_ta');
    }

    public function jadwalUjian(){
        return $this->belongsTo('App\JadwalUjian', 'id_ju', 'id_ju');
    }
}
