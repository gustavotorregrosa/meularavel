<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    protected $table = "post";
    protected $guarded = [];


    public function photo(){
        return $this->belongsTo('App\Photo', 'photo_id');
    }

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function categoria(){
        return $this->belongsTo('App\Categoria', 'categoria_id ');
    }


}
