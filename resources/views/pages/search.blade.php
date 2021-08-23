@extends('layouts.master')
@section('Body')
<style>
    .pagination li{
        background-color:red;
    }
</style>
 <div class="movies-heading" style="margin-top:150px">
    <h2>Từ tìm kiếm: {{$keysearch}} </h2>
  </div>
  <section id="movies-list">
    <!--box-1------------------------>
    @foreach($arrSearch as $p)
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
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <button  type="button" class="btn btn-danger">Đặt vé</button>
      </div>
        </form>
    </div>
  </div>
</div>
    @endforeach
  
 
  </section>
  
  
@endsection