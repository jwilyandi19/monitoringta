<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TugasAkhir extends Model
{
    protected $table = 'tugas_akhir';
    protected $primaryKey='id_ta';
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = [
    'id_ta',
    'id_user',
    'id_dosbing1',
    'id-dosbing2',
    'id_status',
    'id_bidang_mk',
    'id_rumpun_mk',
    'judul',
    'file',
    'created_at',
    'updated_at',
    ];

    public function user(){
        return $this->belongsTo('App\User', 'id_user', 'id_user');
    }

    public function dosbing1(){
        return $this->belongsTo('App\Dosen', 'id_dosbing1', 'id_dosen');
    }

    public function dosbing2(){
        return $this->belongsTo('App\Dosen', 'id_dosbing2', 'id_dosen');
    }

    public function status(){
        return $this->belongsTo('App\StatusTA', 'id_status', 'id_status');
    }

    public function bidang(){
        return $this->belongsTo('App\BidangMK', 'id_bidang_mk', 'id_bidang_mk');
    }

    public function rmk(){
        return $this->belongsTo('App\RumpunMK', 'id_rumpun_mk', 'id_rumpun_mk');
    }

    public function asistensis(){
        return $this->hasMany('App\Asistensi', 'id_ta', 'id_ta');
    }
    
    public function pengajuans(){
        return $this->hasMany('App\DosenPembimbing', 'id_ta', 'id_ta');
    }

    public function seminarTA(){
        return $this->hasOne('App\SeminarTA', 'id_ta', 'id_ta');
    }

    public function ujianTA(){
        return $this->hasOne('App\UjianTA', 'id_ta', 'id_ta');
    }
}
