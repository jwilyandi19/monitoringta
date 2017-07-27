<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = 'berita';
    protected $primaryKey = 'id_berita';
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = [
        'id_berita',
        'id_user',
        'judul_berita',
        'isi_berita',
        'created_at',
        'updated_at',
    ];

    public function uploader(){
        return $this->belongsTo('App\User','id_user','id_user');
    }

}