<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BidangMK extends Model
{
    protected $table = 'bidang_mk';
    protected $primaryKey='id_bidang_mk';
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = [
    'id_bidang_mk',
    'nama_bidang',
    ];

    public function tugasAkhirs(){
    	return $this->hasMany('App\TugasAkhir', 'id_bidang_mk', 'id_bidang_mk');
    }
}
