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
}
