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
    'taggal',
    'materi',
    'created_at',
    'updated_at',
    ];

    public function ta(){
    	return $this->hasOne('App\TugasAkhir', 'id_ta', 'id_ta');
    }
}
