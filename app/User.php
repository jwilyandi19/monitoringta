<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'user';
    protected $primaryKey='id_user';
    public $incrementing = true;
    public $timestamps=false;
    protected $fillable =[
    'id_user',
    'username',
    'password',
    'role',
    'nama',
    ];

    public function tugasAkhirs(){
        return $this->hasMany('App\TugasAkhir', 'id_user', 'id_user');
    }

    public function akunDosen(){
        return $this->hasOne('App\Dosen', 'id_user', 'id_user');
    }
}
