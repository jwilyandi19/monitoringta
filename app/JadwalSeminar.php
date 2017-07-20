<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JadwalSeminar extends Model
{
    protected $table = 'jadwal_seminar';
    protected $primaryKey='id_js';
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = [
    'id_js',
    'tanggal',
    'sesi',
    'created_at',
    'updated_at',
    ];

    public function ketersediaanSeminars(){
        return $this->hasMany('App\KetersediaanSeminar', 'id_js', 'id_js');
    }

    public function seminarTAs(){
        return $this->hasMany('App\SeminarTA', 'id_js', 'id_js');
    }

    public function seminarFinals(){
        return $this->hasMany('App\SeminarFinal', 'id_js', 'id_js');
    }
}
