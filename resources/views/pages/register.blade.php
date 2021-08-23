 @extends('layouts.master')
@section('Body')
 <section class="signup">
        <div class="container">
            <div class="signup-content" style="margin-top: 170px;">
                <div class="signup-form">
                    <h2 class="form-title" style="color: #D42304;">Sign up</h2>
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
                    <form method="POST" action="{{route('register')}}" class="register-form"  id="register-form" enctype="multipart/form-data">
                      @csrf
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="username" id="name" placeholder="Your Username"/>
                        </div>
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input type="email" name="email" id="email" placeholder="Your Email"/>
                        </div>
                        <div class="form-group">
                          <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                          <input type="tel" name="phone" id="phone" pattern="[0-9]{3}[0-9]{4}[0-9]{3}"
                          placeholder="Your Phone"/>
                      </div>
                        <div class="form-group">
                            <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password" id="pass" placeholder="Password"/>
                        </div>
                        <div class="form-group">
                            <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                            <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password"/>
                        </div>
                          <div class="form-group">
                            <p >Chọn ảnh đại diện:</p>
                            <input style="border-style: hidden;" type="file" name="myFile" />
                        </div>
                      
                           
                     
                        <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                        </div>
                    </form>
                </div>
                <div class="signup-image">
                    <figure><img src="{{asset('Assets/images/signup.jpg')}}" /></figure>
                    <a href="dangnhap.html" class="signup-image-link" style="color: #D42304;">I am already member</a>
                </div>
            </div>
        </div>
    </section>
    @endsection