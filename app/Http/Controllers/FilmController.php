<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rating;
use App\Film;

class FilmController extends Controller
{
    //
     
    
    function getDetailFilm($id){
        $film = Film::find($id);
        $comment = Rating::where('film_id','=',$id)->get();
        return view('pages.detailfilm',['film'=>$film,'comment'=>$comment]);
    }
    function searchFilm(Request $request){
        $keysearch = $request -> keysearch;
        $film = Film::where('film_name','like',"%$keysearch%")->orWhere('actor','like',"%$keysearch%")->orWhere('director','like',"%$keysearch%")->paginate(5);
        return view('pages.search',['arrSearch'=>$film,'keysearch'=>$keysearch]);
    }
}
