@extends('layouts.master')
@section('Body')
 <section class="sign-in">
        <div class="container">
            <div class="signin-content" style="margin-top: 170px;">
                <div class="signin-image">
                    <figure> <img src="{{asset('Assets/images/signin.jpg')}}" /></figure>
                    <a href="dangki.html" class="signup-image-link" style="color: #D42304;">Create an account</a>
                </div>
                <div class="signin-form">
                    <h2 class="form-title" style="color: #D42304;">Sign In</h2>
                     @if(count($errors)>0)
                         <div class="alert alert-danger">
                         @foreach($errors->all() as $err)
                                {{$err}}<br>
                         @endforeach
                        </div>
                    @endif
                    @if(Session::has('Error'))
                        <div class="alert alert-danger">
                           {{Session::get('Error')}}
                        </div>
                    @endif
                    <form method="POST" action="{{route('postlogin')}}" class="register-form" id="login-form">
                         @csrf
                        <div class="form-group">
                            <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="email" id="your_name" placeholder="Email"/>
                        </div>
                        <div class="form-group">
                            <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password" id="your_pass" placeholder="Password"/>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection