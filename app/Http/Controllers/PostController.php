<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    //
    function getDetailPost($id){
        $post = Post::find($id);
        return view('pages.detailpost',['post'=>$post]);
    }
    function getIntroduce(){
        return view('pages.introduce');
    }
}
