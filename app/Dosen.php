<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = 'dosen';
    protected $primaryKey='id_dosen';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
    'id_dosen',
    'id_user',
    'nip',
    'nama',
    'nama_lengkap',
    ];

    public function bimbingans(){
    	return $this->hasMany('App\DosenPembimbing', 'id_dosen', 'id_dosen');
    }

    public function user(){
    	return $this->belongsTo('App\User', 'id_user', 'id_user');
    }

    public function pembimbing1s(){
        return $this->hasMany('App\TugasAkhir', 'id_dosbing1', 'id_dosen');
    }

    public function pembimbing2s(){
        return $this->hasMany('App\TugasAkhir', 'id_dosbing2', 'id_dosen');
    }

    public function ketersediaanSeminars(){
        return $this->hasMany('App\KetersediaanSeminar', 'id_dosen', 'id_dosen');
    }

    public function ketersediaanUjians(){
        return $this->hasMany('App\KetersediaanUjian', 'id_dosen', 'id_dosen');
    }

    public function pengujiUjians(){
        return $this->hasMany('App\PengujiUjian', 'id_dosen', 'id_dosen');
    }

    public function pengujiSeminars(){
        return $this->hasMany('App\PengujiSeminar', 'id_dosen', 'id_dosen');
    }

    public function ujianFinals(){
        return $this->hasMany('App\UjianFinal', 'id_dosen', 'id_dosen');
    }

    public function seminarFinals(){
        return $this->hasMany('App\SeminarFinal', 'id_dosen', 'id_dosen');
    }

    public function rmks(){
        return $this->hasMany('App\RmkDosen', 'id_dosen', 'id_dosen');
    }

    public function penguji1s(){
        return $this->hasMany('App\SeminarTA', 'id_penguji1', 'id_dosen');
    }

    public function penguji2s(){
        return $this->hasMany('App\SeminarTA', 'id_penguji2', 'id_dosen');
    }

    public function penguji3s(){
        return $this->hasMany('App\SeminarTA', 'id_penguji3', 'id_dosen');
    }

    public function penguji4s(){
        return $this->hasMany('App\SeminarTA', 'id_penguji4', 'id_dosen');
    }

    public function penguji5s(){
        return $this->hasMany('App\SeminarTA', 'id_penguji5', 'id_dosen');
    }

    public function pegnuji1Ujians(){
        return $this->hasMany('App\UjianTA', 'id_penguji1', 'id_dosen');
    }

    public function pegnuji2Ujians(){
        return $this->hasMany('App\UjianTA', 'id_penguji2', 'id_dosen');
    }

    public function pegnuji3Ujians(){
        return $this->hasMany('App\UjianTA', 'id_penguji3', 'id_dosen');
    }

    public function pegnuji4Ujians(){
        return $this->hasMany('App\UjianTA', 'id_penguji4', 'id_dosen');
    }

    public function pegnuji5Ujians(){
        return $this->hasMany('App\UjianTA', 'id_penguji5', 'id_dosen');
    }
}
