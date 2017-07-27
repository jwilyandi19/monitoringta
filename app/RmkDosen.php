<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RmkDosen extends Model
{
    protected $table = 'rmk_dosen';
    public $primaryKey = 'id_rmk_dosen';
    public $incrementing = false;
    public $timestamps = true;
    protected $fillable =[
    'id_rmk_dosen',
    'id_dosen',
    'id_rumpun_mk',
    ];

    public function rmk(){
    	return $this->belongsTo('App\RumpunMK', 'id_rumpun_mk', 'id_rumpun_mk');
    }

    public function dosen(){
    	return $this->belongsTo('App\Dosen', 'id_dosen', 'id_dosen');
    }
}
