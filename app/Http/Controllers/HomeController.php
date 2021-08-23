<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Film;
use App\Post;

class HomeController extends Controller
{
    
    function __construct(){
        $phimsapchieu = Film::orderBy('id','DESC')->get();
        $phimdangchieu = Film::all();
        $khuyenmai = Post::all()->where('id_cpost',1);
        view()->share('phimsapchieu',$phimsapchieu);
        view()->share('phimdangchieu',$phimdangchieu);
        view()->share('khuyenmai',$khuyenmai);
    }
    function index(){
       return view('pages.index');
    }
  
}
