<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TugasAkhir extends Model
{
    protected $table = 'tugas_akhir';
    protected $primaryKey='id_ta';
    public $incrementing = true;
    public $timestamps=true;
    protected $fillable =[
    'judul',
    'nrp',
    'id_status',
    'dosen1',
    'dosen2',
    'id_dosen1',
    'id_dosen2',
    'rmk',
    'file',
    'created_at',
    'updated_at',
    ];
}
