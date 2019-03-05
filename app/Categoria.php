<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
    use SoftDeletes;
    protected $table = "categoria";
    protected $fillable = [
        'name'
    ];

    public function posts(){
        return $this->hasMany('App\Post', 'categoria_id');
    }
}
