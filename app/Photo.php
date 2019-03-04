<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = 'photo';
    protected $fillable = [
        'path'
    ];
    protected $upload = "/imagens/";

    public function getPathAttribute($path){
        return $this->upload.$path;
    }
}
