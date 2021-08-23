<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use Session;

class UserController extends Controller
{
    //
    function uploadFile(Request $request){
        if($request->hasFile('myFile'))
        {
            $timestamp = time();
            $file = $request->file('myFile');
            $filename = $file->getClientOriginalName('myFile');
            $reFilename = $timestamp.$filename;
            $file->move('Assets/images',$reFilename);
           
            return $reFilename;
        }else{
            return "false";
        }
    }
    function getRegister(){
        return view('pages.register');
    }
    function postRegister(Request $request){
        $this->validate($request,
            [
                'email'=>'required|email|unique:user,email',
                'password'=>'required|min:6|max:20',
                'phone'=>'required|min:10|max:11',
                'username'=>'required',
                're_pass'=>'required|same:password'
            ],[
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Email không đúng định dạng email',
                'email.unique'=>'Email đã có người sử dụng',
                'password.required'=>'Vui lòng nhập mật khẩu',
                're_pass.same'=>'Hai mật khẩu không khớp',
                'password.min'=>'Mật khẩu phải có ít nhât 6 kí tự',
                'phone.required'=>'Vui lòng nhập số điện thoại',
                'username.required'=>'Vui lòng nhập tên người dùng',
                're_pass.required'=>'Vui lòng nhập lại mật khẩu',
                'phone.min'=>'Số điện thoại phải có ít nhất 10 số'
            ]
            );
        $filename =  UserController::uploadFile($request) ;  
        $user = new Users();
        $user->email = $request->email;
        $user->is_active = 0;
        $user->password =md5($request->password);
        $user->phone = $request->phone;
        $user->role_id = 1;
        $user->image = $filename;
        $user->username = $request->username;
        $user->save();
      return redirect()->back()->with('Success','Đăng kí thành công');
    }
    function getLogin(){
        return view('pages.login');
    }
    function postLogin(Request $request){
         $this->validate($request,
            [
                'email'=>'required|email',
                'password'=>'required|min:6|max:20',
               
            ],[
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Email không đúng định dạng email',
                'password.required'=>'Vui lòng nhập mật khẩu',
                'password.min'=>'Mật khẩu phải có ít nhât 6 kí tự',
               
            ]
            );
        $email = $request->email;
        $password =md5($request->password);
        $user = Users::where('email','=',$email)->where('password','=',$password)->get();
        if(count($user)==1){
            Session::put('user',$user[0]);
            return redirect()->route('home');
        }else{
           return redirect()->back()->with('Error','Tài khoản hoặc mật khẩu không chính xác');
        }
       
    }
    function getLogout(){
        Session::forget('user');
        return redirect()->route('login');
    }
    function getProfileUser($id){
        $user = Users::find($id); 
         return view('pages.profileuser',['user'=>$user]);
    }
    function getEditProfile($id){
         $user = Users::find($id); 
         return view('pages.editprofile',['user'=>$user]);
    }
    function postEditProfile(Request $request,$id){
          $this->validate($request,
            [
                'phonenumber'=>'required|min:10|max:11',
                'username'=>'required',
            ],[
                
                'phonenumber.required'=>'Vui lòng nhập số điện thoại',
                'username.required'=>'Vui lòng nhập tên người dùng',             
            ]
            );
         $filename =  UserController::uploadFile($request);
         $user = Users::find($id);  
         $user->username = $request->username;
         $user->phone = $request->phonenumber;
         if($filename != "false"){
            $user->image =  $filename;
         };
         $user->save();
         return redirect('user/editprofile/'.$id)->with('Success','Sửa thành công');
    }
    function getEditPassword($id){
         $user = Users::find($id); 
         return view('pages.editpassword',['user'=>$user]);
    }
     function postEditPassword(Request $request,$id){
         $user = Users::find($id); 
         $this->validate($request,
            [
                'password'=>'required|min:6|max:20',
                're_pass'=>'required|same:password'
            ],[
                
                'password.required'=>'Vui lòng nhập mật khẩu',
                'password.min'=>'Mật khẩu phải có ít nhât 6 kí tự', 
                're_pass.required'=>'Vui lòng nhập lại mật khẩu',  
                 're_pass.same'=>'Hai mật khẩu không khớp',          
            ]
            );
         $user = Users::find($id);  
         $user->password =md5($request->password);
         $user->save();
         return redirect('user/editpassword/'.$id)->with('Success','Sửa thành công');
    }
}
