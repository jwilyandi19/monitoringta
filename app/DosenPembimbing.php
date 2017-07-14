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
}
