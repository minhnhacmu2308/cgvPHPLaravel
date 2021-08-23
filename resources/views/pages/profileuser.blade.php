@extends('layouts.master')
@section('Body')
<div>
    <p class="head3" style="font-size:40px"></p>
    <div class="row container" style="border: 1px solid #d42304;margin: 0 auto;padding: 10px 0">
        <div class="col-4">
            <img class="image3" src="{{asset('Assets/images/'.$user->image)}}" alt="" />
        </div>
        <div class="col-6">
            <p id="textUsername"><span style="font-weight:bold">Username : </span>{{$user->username}}</p><br>
            <p id="textEmail"><span style="font-weight:bold">Email : </span>{{$user->email}}</p><br>

            <p id="textPhonenumber"><span style="font-weight:bold">Phone number: </span> {{$user->phone}}</p><br>

            <div class="button--movie">
                <a  class="btn btn-danger" href ="/CGVLaravel/public/user/editprofile/{{$user->id}}"
                        style="margin-right: 20px">
                    Edit profile
                </a>
                <input type="hidden" class="form-control" name="idFilmT" id="idFilmT" value="@Model.id" placeholder="Password">
                <a class="btn btn-danger" href ="/CGVLaravel/public/user/editpassword/{{$user->id}}" >Đổi mật khẩu</a>

            </div>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Sửa thông tin</h5>
                            <button type="button" id="btn-close" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label for="schedule" class="col-form-label">Username:</label>
                                    <input type="text" class="form-control" value="@Model.username" name="username" id="username" />
                                </div>
                                <div class="mb-3">
                                    <label for="showtime" class="col-form-label">Phonenumber:</label>
                                    <input type="text" class="form-control" value="@Model.phonenumber" name="phonenumber" id="phonenumberedit" />
                                </div>
                                <div class="mb-3">
                                    <label for="room" class="col-form-label">Email:</label>
                                    <input type="text" readonly class="form-control" value="@Model.email" name="email" id="email" />
                                </div>

                                <p style="color: red" id="resultError1"></p>
                                <p style="color: forestgreen" id="resultSuccess1"></p>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            <button onclick="editProfile()" type="button" class="btn btn-danger">Submit</button>
                        </div>
                    </div>
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