<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PengujiSeminar extends Model
{
    protected $table = 'peguji_seminar';
    protected $primaryKey='id_penguji_s';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
    'id_penguji_s',
    'id_seminar_ta',
    'id_dosen',
    'peran',
    'konfirmasi',
    ];

    public function seminarTA(){
    	return $this->belongsTo('App\SeminarTA', 'id_seminar_ta', 'id_seminar_ta');
    }

    public function dosen(){
    	return $this->belongsTo('App\Dosen', 'id_dosen', 'id_dosen');
    }
}
