<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'user';
    protected $primaryKey='user_id';
    public $incrementing = true;
    public $timestamps=false;
    protected $fillable =[
    'user_id',
    'user_username',
    'user_password',
    'user_role',
    'user_name',
    ];
}
