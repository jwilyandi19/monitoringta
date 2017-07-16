<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DosenPembimbing extends Model
{
    protected $table = 'dosen_pembimbing';
    public $incrementing = false;
    public $timestamps = true;
    protected $fillable =[
    'id_dosen',
    'id_ta',
    'peran',
    'status',
    'created_at',
    'updated_at',
    ];
}
