<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal';
    protected $primaryKey='id_jadwal';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
    'id_jadwal',
    'nama',
    'tanggal',
    ];
}
