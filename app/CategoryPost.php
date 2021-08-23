<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryPost extends Model
{
    //
     protected $table = 'category_post';
     public $timestamps = false;
     public function post(){
        return $this->hasMany('App\Post','id_cpost','id');
     }
}
