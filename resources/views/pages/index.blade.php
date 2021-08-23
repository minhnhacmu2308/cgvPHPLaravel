@extends('layouts.master')
@section('Body')
<section id="main">
    <!--showcase----------------------->
    <!--heading------------->
    <h1 class="showcase-heading">Phim Sắp Chiếu</h1>

    <ul id="autoWidth" class="cs-hidden">
      <!--box-1--------------------------->
      @foreach($phimsapchieu as $p){
        <li class="item-a">
          <!--showcase-box------------------->
          <div class="showcase-box">
      
            <a href="/CGVLaravel/public/user/detailfilm/{{$p->id}}"><img src="{{asset('Assets/images/'.$p->image)}}"/></a>
           
          </div>
         
        </li>
      }
      @endforeach
      <!--box-2--------------------------->
     
    </ul>
  </section>

  <!--latest-movies---------------------->
  <section id="latest">
    <h2 class="latest-heading"> KHUYẾN MÃI</h2>
    <!--slider------------------->
    <ul id="autoWidth2" class="cs-hidden">
      <!--slide-box-1------------------>
     @foreach($khuyenmai as $km)
     <li class="item-a">
        <div class="latest-box">
          <!--img-------->
          <div class="latest-b-img">
            <a href="/CGVLaravel/public/user/detailpost/{{$km->id}}">
              <img src="{{asset('Assets/images/'.$km->image)}}" /></a>
          </div>
          <!--text---------->
          <div class="latest-b-text">
            <strong><i class="fab fa-hotjar"></i></strong>
            <p>Ưu đãi Hot</p>
          </div>
        </div>
      </li>
     @endforeach

    </ul>
  </section>

  <!--movies---------------------------->
  <div class="movies-heading">
    <h2>Phim Đang Chiếu</h2>
  </div>
  <section id="movies-list">
    <!--box-1------------------------>
    @foreach($phimdangchieu as $p)
  <div class="movies-box">
      <!--img------------>
      <div class="movies-img">
        <div class="quality">4K</div>
        <img src="{{asset('Assets/images/'.$p->image)}}" />
      </div>
      <!--text--------->
      <a href="/CGVLaravel/public/user/detailfilm/{{$p->id}}"> {{$p->film_name}}</a>
      <!-- Button trigger modal -->
      <div class="button--movie">
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{$p->id}}"
          style="margin-right: 20px">
          Trailer
        </button>
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModa{{$p->id}}"  >Đặt Vé</button>
      </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal{{$p->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-body">
            <iframe width="1104" height="621" src="{{$p->trailer}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </div>
    	<div class="modal fade" id="exampleModa{{$p->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{$p->film_name}}</h5>
        <button type="button" id="btn-close{{$p->id}}" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form >
          <div class="mb-3">
         
           
            <select required  class="form-select"  name="schedule" aria-label="Default select example">
              <option value="0">Chọn lịch chiếu</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
		      	</select>
          </div>
          <div class="mb-3">
         
          <select class="form-select"   name="showtime" aria-label="Default select example">
			  <option value="0">Chọn suất chiếu</option>			  		  
			</select>
          </div>
          <div class="mb-3">
        
          <select  class="form-select"  name="room" aria-label="Default select example">
			  <option  value="0">Chọn phòng</option>
			</select>
          </div>
          <div class="mb-3">
        
          <select  multiple="multiple" class="form-select"  name="seat" aria-label="Default select example">
			  <option  value="0">Chọn ghế</option>
			  
			</select>
          </div>
          
     
      </div>
      <div class="modal-footer" style="margin-top:150px !important">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <button  type="button" class="btn btn-danger">Đặt vé</button>
      </div>
        </form>
    </div>
  </div>
</div>
    @endforeach

  
  </section>
  <script>
    $(document).ready(function () {
      $("#autoWidth,#autoWidth2").lightSlider({
        autoWidth: true,
        loop: true,
        onSliderLoad: function () {
          $("#autoWidth,#autoWidth2").removeClass("cS-hidden");
        },
      });
    });
  </script>
  <!--btns--------------->
  <!-- <div class="btns">
    <a href="#">Previous</a>
    <a href="#">Next</a>
  </div> -->
  <!--stopplaying--------------->
  <script>
    $("#exampleModal1").on("hidden.bs.modal", function (e) {
      $("#exampleModal1 iframe").attr(
        "src",
        $("#exampleModal1 iframe").attr("src")
      );
    });
  </script>
   <script>
    $("#exampleModal2").on("hidden.bs.modal", function (e) {
      $("#exampleModal2 iframe").attr(
        "src",
        $("#exampleModal2 iframe").attr("src")
      );
    });
  </script>
   <script>
    $("#exampleModal3").on("hidden.bs.modal", function (e) {
      $("#exampleModal3 iframe").attr(
        "src",
        $("#exampleModal3 iframe").attr("src")
      );
    });
  </script>
   <script>
    $("#exampleModal4").on("hidden.bs.modal", function (e) {
      $("#exampleModal4 iframe").attr(
        "src",
        $("#exampleModal4 iframe").attr("src")
      );
    });
  </script>
@endsection