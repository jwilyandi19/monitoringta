<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TugasAkhir extends Model
{
    protected $table = 'tugas_akhir';
    protected $primaryKey='id_ta';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
    'id_ta',
    'id_user',
    'id_status',
    'id_bidang_mk',
    'judul',
    'file',
    ];

    public function asistensis(){
        return $this->hasMany('App\Asistensi', 'id_ta', 'id_ta');
    }

    public function dosbings(){
        return $this->hasMany('App\DosenPembimbing', 'id_ta', 'id_ta');
    }

    public function status(){
        return $this->hasOne('App\StatusTA', 'id_status', 'id_status');
    }

    public function user(){
        return $this->hasOne('App\User', 'id_user', 'id_user');
    }
}
