<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeminarTA extends Model
{
    protected $table = 'seminar_ta';
    protected $primaryKey='id_seminar_ta';
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = [
    'id_seminar_ta',
    'id_ta',
    'id_js',
    'id_penguji1',
    'id_penguji2',
    'id_penguji3',
    'id_penguji4',
    'id_penguji5',
    'status',
    'nilai',
    'evaluasi',
    'file',
    'created_at',
    'updated_at',
    ];

    public function tugasAkhir(){
    	return $this->belongsTo('App\TugasAkhir', 'id_ta', 'id_ta');
    }

    public function konfirmasis(){
    	return $this->hasMany('App\PengujiSeminar', 'id_seminar_ta', 'id_seminar_ta');
    }

    public function jadwalSeminar(){
        return $this->belongsTo('App\JadwalSeminar', 'id_js', 'id_js');
    }

    public function penguji1(){
        return $this->belongsTo('App\Dosen', 'id_penguji1', 'id_dosen');
    }

    public function penguji2(){
        return $this->belongsTo('App\Dosen', 'id_penguji2', 'id_dosen');
    }

    public function penguji3(){
        return $this->belongsTo('App\Dosen', 'id_penguji3', 'id_dosen');
    }

    public function penguji4(){
        return $this->belongsTo('App\Dosen', 'id_penguji4', 'id_dosen');
    }

    public function penguji5(){
        return $this->belongsTo('App\Dosen', 'id_penguji5', 'id_dosen');
    }
}
