<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DosenPembimbing extends Model
{
    protected $table = 'dosen_pembimbing';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable =[
    'id_dosen',
    'id_ta',
    'peran',
    'status',
    ];

    public function tugasAkhir(){
    	return $this->belongsTo('App\TugasAkhir', 'id_ta', 'id_ta');
    }

    public function dataDosen(){
    	return $this->belongsTo('App\Dosen', 'id_dosen', 'id_dosen');
    }
}
