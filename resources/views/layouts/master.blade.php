<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cinema</title>
  <link rel="stylesheet" href="{{asset('Assets/css/phim.css')}}" />
  <link rel="stylesheet" href="{{asset('Assets/css/lightslider.css')}}" />
  <link rel="stylesheet" href="{{asset('Assets/css/form.css')}}" />
  <link rel="stylesheet" href="{{asset('Assets/css/style.css')}}" />
   <link rel="stylesheet" href="{{asset('Assets/css/table.css')}}" />
  <link rel="stylesheet" href="{{asset('Assets/fonts/material-icon/css/material-design-iconic-font.min.css')}}">
  <script src="{{asset('Assets/js/JQuery3.3.1.js')}}"></script>
  <script src="{{asset('Assets/js/lightslider.js')}}"></script>

    <script src="{{asset('Assets/js/bootstrap.min.js')}} "></script>
<script src="{{asset('Assets/js/popper.min.js')}} "></script>
 
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link rel="shortcut icon" href="{{asset('Assets/images/fav icon.png')}}" />
  <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script>
</head>

<body>
  <!--navigation-------------->
    @include('layouts.header')
    @yield('Body')
  <!--footer------------------>
     @include('layouts.footer')

</body>

</html>