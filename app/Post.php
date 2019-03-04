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
        return $this->belognsTo('App\Photo', 'photo_id');
    }

    public function user(){
        return $this->belognsTo('App\User', 'user_id');
    }
}
