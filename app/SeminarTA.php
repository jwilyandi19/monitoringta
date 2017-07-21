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
    'tanggal',
    'nilai',
    'evaluasi',
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
        return $this->belongsTo('App\jadwalSeminar', 'id_js', 'id_js');
    }
}
