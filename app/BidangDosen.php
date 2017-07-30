<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BidangDosen extends Model
{
    protected $table = 'bidang_dosen';
    public $primaryKey = 'id_bidang_dosen';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable =[
    'id_bidang_dosen',
    'id_dosen',
    'id_bidang_mk',
    ];

    public function bidang(){
    	return $this->belongsTo('App\BidangMK', 'id_bidang_mk', 'id_bidang_mk');
    }

    public function dosen(){
    	return $this->belongsTo('App\Dosen', 'id_dosen', 'id_dosen');
    }
}
