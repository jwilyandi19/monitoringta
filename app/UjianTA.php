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
    'id_penguji1',
    'nilai_penguji1',
    'id_penguji2',
    'nilai_penguji2',
    'id_penguji3',
    'nilai_penguji3',
    'id_penguji4',
    'nilai_penguji4',
    'id_penguji5',
    'nilai_penguji5',
    'status',
    'nilai',
    'nilai_angka',
    'evaluasi',
    'file',
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

    public function penguji1Ujian(){
        return $this->belongsTo('App\Dosen', 'id_penguji1', 'id_dosen');
    }

    public function penguji2Ujian(){
        return $this->belongsTo('App\Dosen', 'id_penguji2', 'id_dosen');
    }

    public function penguji3Ujian(){
        return $this->belongsTo('App\Dosen', 'id_penguji3', 'id_dosen');
    }

    public function penguji4Ujian(){
        return $this->belongsTo('App\Dosen', 'id_penguji4', 'id_dosen');
    }

    public function penguji5Ujian(){
        return $this->belongsTo('App\Dosen', 'id_penguji5', 'id_dosen');
    }
}
