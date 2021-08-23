 @extends('layouts.master')
@section('Body')
<div>
 <p class="head3" style="font-size:40px">{{$film->film_name}}</p>
        <div class="row container" style="border: 1px solid #d42304;margin: 0 auto;padding: 10px 0">
        <div class="col-4">
         <img class="image3" src="{{asset('Assets/images/'.$film->image)}}" alt=""/>
        </div>
        <div class="col-6">
         <p ><span style="font-weight:bold">Diễn viên : </span>{{$film->actor}}</p><br>
            <p ><span style="font-weight:bold">Đạo diễn : </span>{{$film->director}}</p><br>
            <p ><span style="font-weight:bold">Thể loại : </span> </p><br>
            <p ><span style="font-weight:bold">Thời lượng : </span>{{$film->duration}}</p><br>
            <p ><span style="font-weight:bold">Nội dung : </span> {!!$film->description!!}  </p><br>
     <div class="button--movie">
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal"
          style="margin-right: 20px">
          Trailer
        </button>
        <input type="hidden" class="form-control" name="idFilmT" id="idFilmT" value="{{$film->id}}" placeholder="Password">
        <button  type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModa" data-bs-whatever="@mdo">Đặt Vé</button>
        
            </div>
        </div> 
         <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-body">
            <iframe width="1104" height="621" src="{{$film->trailer}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </div>
   
    <div class="modal fade" id="exampleModa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{$film->film_name}}</h5>
        <button type="button" id="btn-close{{$film->id}}" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
    </div>
      <div>
            <div class=" mt-5">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-8">
                       
                        <div id="responeAjax">
                            <div class="headings d-flex justify-content-between align-items-center mb-3">
                                <h5 id="numberComment">Comments {{count($comment)}}</h5>

                            </div>

                            @foreach($comment as $cmt)
                          

                                <div class="card p-3" id="@item1.id">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <input type="hidden" value="@item1.film_id" id="idFilm" />
                                        <div class="user d-flex flex-row align-items-center">
                                            <img src="https://i.imgur.com/hczKIze.jpg"
                                                 width="30" class="user-img rounded-circle mr-2"> <span></span><h5 style="margin-left: 10px">{{$cmt->name_user}}</h5>
                                            </div> <small>{{$cmt->created_time}}</small>

                                        </div>
                                        <div class="action d-flex justify-content-between mt-2 align-items-center">
                                            <div class="reply px-4"> <p>{{$cmt->rate}}</p></div>


                                            <div class="icons align-items-center"> <i class="fa fa-star text-warning"></i> <i class="fa fa-check-circle-o check-icon"></i> </div>
                                        </div>
                                        <?php $userSession = Session::get('user')  ?>
                                      
                                        <div class="action d-flex justify-content-between mt-2 align-items-center">
                                            <div class="reply px-4"></div>
                                            @if(Session::has('user'))
                                                @if($userSession->id == $cmt->user_id)
                                                    <a href="/CGVLaravel/public/user/delete/comment/{{$cmt->id}}/{{$film->id}}" value="Xóa" class="btn btn-danger">Xóa</a>      
                                                @endif
                                            @endif
                                            
                                        </div>

                                    </div>

                           @endforeach


                            <div class="card p-3">
                                <form method="POST" action="/CGVLaravel/public/user/comment/{{$film->id}}" class="form-inline">
                                @csrf
                                    <div class="row">
                                        <div class="form-group  col-10">

                                            <input type="text" class="form-control" name="comment" id="comment" placeholder="commnet">
                                            <p style="color: red;margin-top: 10px" id="error"></p>
                                        </div>
                                        <div class="col-2">
                                            <button type="submit" class="btn btn-primary mb-2">Post</button>
                                        </div>
                                    </div>


                                </form>
                                 @if(Session::has('Error'))
                                <div class="alert alert-danger">
                                  {{Session::get('Error')}}
                                </div>
                              @endif
                            </div>
                            
                      </div>
        </div>
    </div>
</div>

@endsection