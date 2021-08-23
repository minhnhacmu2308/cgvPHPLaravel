<?php
use Illuminate\Http\Request;
class UploadFileUtils
{
     function uploadFile(Request $request){
        if($request->hasFile('myFile'))
        {
            $file = $request->file('myFile');
            $filename = $file->getClientOriginalName('myFile');
            $file->move('Assets/images',$filename);
            return $filename;
        }else{
            echo"chua";
        }
    }
}