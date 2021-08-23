@extends('layouts.master')
@section('Body')
<div>
    <p class="head3" style="font-size:40px"></p>
    <div class="row container" style="margin: 0 auto;padding: 10px 0;justify-content:center">
        <div class="col-6">
            <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Sửa thông tin</h5>
                          
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="/CGVLaravel/public/user/editprofile/{{$user->id}}"  enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <p for="schedule" class="col-form-label">Username:</p>
                                    <input type="text" class="form-control" value="{{$user->username}}" name="username" id="username" />
                                </div>
                                <div class="mb-3">
                                    <p for="showtime" class="col-form-label">Phonenumber:</p>
                                    <input type="text" class="form-control" value="{{$user->phone}}" name="phonenumber" id="phonenumberedit" />
                                </div>
                                <div class="mb-3">
                                    <p for="room" class="col-form-label">Email:</p>
                                    <input type="text" readonly class="form-control" value="{{$user->email}}" name="email" id="email" />
                                </div>
                                    <div class="form-group">
                                        <p >Chọn ảnh đại diện:</p>
                                        <input style="border-style: hidden;" type="file" name="myFile" />
                                          <p >{{$user->image}}</p>
                                    </div>
                                <p style="color: red" id="resultError1"></p>
                                <p style="color: forestgreen" id="resultSuccess1"></p>
                                 <div class="modal-footer">
                           
                               <button  type="submit" class="btn btn-danger">Submit</button>
                        </div>
                            </form>
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
            <!--  Modak Booking -->
            <div class="modal fade" id="exampleModa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Đổi mật khẩu</h5>
                            <button type="button" id="btn-close" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label for="schedule" class="col-form-label">Mật khẩu cũ:</label>
                                    <input type="password" class="form-control" name="password" id="password" />
                                </div>
                                <div class="mb-3">
                                    <label for="showtime" class="col-form-label">Mật khẩu mới :</label>
                                    <input type="password" class="form-control" name="passwordnew" id="passwordnew" />
                                </div>
                                <div class="mb-3">
                                    <label for="room" class="col-form-label">Nhập lại mật khẩu mới:</label>
                                    <input type="password" class="form-control" name="rePasswordnew" id="rePasswordnew" />
                                </div>
                                <input type="hidden" value="@userInfomatiom.email" id="emailEdit" />
                                <p style="color: red" id="resultError"></p>
                                <p style="color: forestgreen" id="resultSuccess"></p>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            <button onclick="changePass()" type="button" class="btn btn-danger">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModaltest" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Hóa đơn</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div id="result" class="modal-body">

                        </div>
                        <div class="modal-footer">
                            <button onclick="closeModel()" type="button" class="btn btn-danger">OK</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection