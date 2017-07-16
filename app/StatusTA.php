<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusTA extends Model
{
    protected $table = 'status_ta';
    protected $primaryKey='id_status';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
    'id_status',
    'keterangan',
    ];

    public function TAs(){
    	return $this->hasMany('App\TugasAkhir', 'id_status', 'id_status');
    }
}
