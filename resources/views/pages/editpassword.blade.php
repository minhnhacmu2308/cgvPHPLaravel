@extends('layouts.master')
@section('Body')
<div>
    <p class="head3" style="font-size:40px"></p>
    <div class="row container" style="margin: 0 auto;padding: 10px 0;justify-content:center">
        <div class="col-6">
            <div class="modal-content">
                <div class="modal-header">
                        
                        <div class="modal-body">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Đổi mật khẩu</h5>
                           
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="/CGVLaravel/public/user/editpassword/{{$user->id}}">
                             @csrf
                                <div class="mb-3">
                                    <p for="showtime" class="col-form-label">Mật khẩu mới :</p>
                                    <input type="password" class="form-control" name="password" id="passwordnew" />
                                </div>
                                <div class="mb-3">
                                    <p for="room" class="col-form-label">Nhập lại mật khẩu mới:</p>
                                    <input type="password" class="form-control" name="re_pass" id="rePasswordnew" />
                                </div>
                                <p style="color: red" id="resultError"></p>
                                <p style="color: forestgreen" id="resultSuccess"></p>
                                  <div class="modal-footer">
                                  
                                    <button  type="submit" class="btn btn-danger">Submit</button>
                                </div>
                            </form>
                        </div>
                      
                             @if(count($errors)>0)
                                <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                        {{$err}}<br>
                                @endforeach
                                </div>
                            @endif
                            @if(Session::has('Success'))
                                <div class="alert alert-success">
                                {{Session::get('Success')}}
                                </div>
                            @endif
                    </div>
                       
                </div>
           
        </div>
    </div>
</div>
@endsection