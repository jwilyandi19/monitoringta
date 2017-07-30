<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RumpunMK extends Model
{
    protected $table = 'rumpun_mk';
    protected $primaryKey='id_rumpun_mk';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
    'id_rumpun_mk',
    'nama_rumpun',
    ];

    public function tugasAkhirs(){
    	return $this->hasMany('App\TugasAkhir', 'id_rumpun_mk', 'id_rumpun_mk');
    }

    public function rmkDosens(){
        return $this->hasMany('App\RmkDosen', 'id_rumpun_mk', 'id_rumpun_mk');
    }
}
