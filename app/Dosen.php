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
}
