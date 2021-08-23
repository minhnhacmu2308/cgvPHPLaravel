<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rating;
use Session;

class RatingController extends Controller
{
    //
    function postCommnet(Request $request,$idFilm){
        $comment = $request->comment;
        if($comment == ''){
            return Redirect('user/detailfilm/'.$idFilm)->with('Error','Bạn cần phải nhập bình luận');        
        }else{
            if(Session::has('user')){
                $user = Session::get('user');
                $rating = new Rating();
                $rating->film_id = $idFilm;
                $rating->rate =   $comment;
                $rating->user_id = $user->id;
                $rating->name_user = $user->username;
                $rating->save();
                return Redirect('user/detailfilm/'.$idFilm);
            }else{
                return Redirect('user/detailfilm/'.$idFilm)->with('Error','Bạn cần phải đăng nhập');
            }
        }
       
       
    }
    function deleteComment($idCmt,$idFilm){
        $comment = Rating::find($idCmt);
        $comment->delete();
        return Redirect('user/detailfilm/'.$idFilm);
    }
}