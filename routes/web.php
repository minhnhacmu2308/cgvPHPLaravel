<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['prefix'=>'user'],function(){
    Route::get('/','HomeController@index');
    Route::get('home','HomeController@index')->name('home');
    Route::get('introduce','PostController@getIntroduce');
    Route::get('register','UserController@getRegister');
    Route::get('login','UserController@getLogin')->name('login');
    Route::post('login','UserController@postLogin')->name('postlogin');
    Route::get('detailfilm/{id}','FilmController@getDetailFilm');
    Route::get('detailpost/{id}','PostController@getDetailPost');
    Route::get('search',"FilmController@searchFilm");
    Route::post('register','UserController@postRegister')->name('register');
    Route::get('logout',"UserController@getLogout");
    Route::get('profileuser/{email}',"UserController@getProfileUser")->middleware('MyMiddleware');
    Route::get('editprofile/{id}',"UserController@getEditProfile")->middleware('MyMiddleware');
    Route::post('editprofile/{id}',"UserController@postEditProfile")->name('editprofile')->middleware('MyMiddleware');
    Route::get('editpassword/{id}',"UserController@getEditPassword")->middleware('MyMiddleware');
    Route::post('editpassword/{id}',"UserController@postEditPassword")->name('editpassword')->middleware('MyMiddleware');
    Route::post('comment/{idFilm}',"RatingController@postCommnet")->name('postcomment');
    Route::get('delete/comment/{idCmt}/{idFilm}',"RatingController@deleteComment");
});

// Route::get('db/get',function(){
//     $data = DB::table('user')->get();
//     foreach($data as $row){
//      foreach($row as $a){
//       echo $row;
//     }
//     }
// });
// Route::get('model/category/save', function(){
//     $category = new App\CategoryFilm();
//     $category->name = "minh nha";
//     $category->save();
//     echo " Đã thực hiện thành công";
// });
// Route::get('lienket',function(){
//     $data = App\Post::find(15)->categorypost->toArray();
//     var_dump($data);
// });
// Route::get('lienketcategory',function(){
//     $data = App\CategoryPost::find(1)->post->toArray();
//     var_dump($data);
// });
// Route::group(['middleware' => ['web']], function(){
//     Route::get('Session', function(){
//         Session::put('login','hello');
//         echo"Da dat session";
//         echo"<br>";
//         if(Session::has('login'))
//             echo" session";
//         else
//              echo"khong có session";
//     });
// });
// Route::get('trangchu/cgv', function () {
//     return '<h1> xin chao cac ban</h1>';
// });
// Route::get('trangchu/cgv/{ten}', function ($ten) {
//     return '<h1> xin chao cac ban</h1>'.$ten;
// })->where(['ten' => '[0-9]+']);
// Route::get('Route1',['as' => 'MyRoute',function(){
//     echo"XIn chao cac ban";
// }]);
// Route::get('Route2',function(){
//     echo"XIn chao cac ban";
// })->name('MyRoute2');
// Route::get('goiten',function(){
//     return redirect() -> route('MyRoute2');
// });
// Route::group(['prefix'=>'MyGroup'],function(){
//     Route::get('User1', function(){
//         echo"XIn chao cac ban";
//     });
//      Route::get('User2', function(){
//          echo"XIn chao cac ban";
//     });
// });
// Route::get('Home','HomeController@XinChao');
// Route::get('getForm' , function(){
//     return view('testForm');
// });
// Route::post('postForm',['as' => 'postForm','uses' => 'HomeController@postForm']);