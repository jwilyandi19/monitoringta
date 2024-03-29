<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asistensi extends Model
{
    protected $table = 'asistensi';
    protected $primaryKey='id_asistensi';
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = [
    'id_asistensi',
    'id_ta',
    'id_dosen',
    'tanggal',
    'materi',
    'disetujui',
    'created_at',
    'updated_at',
    ];

    public function tugasAkhirs(){
    	return $this->belongsTo('App\TugasAkhir', 'id_ta', 'id_ta');
    }

    public function dosen(){
        return $this->belongsTo('App\Dosen', 'id_dosen', 'id_dosen');
    }
}
