<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $table = 'post';
    public $timestamps = false;
    public function categorypost(){
        return $this->belongsTo('App\CategoryPost','id_cpost','id');
    }
}
