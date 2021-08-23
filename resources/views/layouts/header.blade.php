 <nav>
    <!--logo--------------->
    <a href="/CGVLaravel/public/user/home" class="logo">
      <img src="{{asset('Assets/images/logo.png')}}" />
    </a>
    <!--menu--btn----------------->

    <label class="menu-icon" for="menu-btn">
      <span class="nav-icon"></span>
    </label>
    <!--menu-------------->
    <ul class="menu">
      <li><a href="/CGVLaravel/public/user/introduce">Giới Thiệu</a></li>
      <li><a href="/CGVLaravel/public/user/home">Phim</a></li>
      <?php $user = Session::get('user') ?>
      @if(Session::has('user'))
          <li><a href="/CGVLaravel/public/user/profileuser/{{$user->id}}">{{$user->username}}</a></li>
          <li><a href="/CGVLaravel/public/user/logout">Đăng xuất</a></li>
      @else
          <li><a href="/CGVLaravel/public/user/login">Đăng Nhập</a></li>
          <li><a href="/CGVLaravel/public/user/register">Đăng Kí</a></li>
      @endif
     
    </ul>
    <!--search------------->
   <ul class="menu" >
	   	<li>
	   	 <form style="width: 280px" class="search" action="/CGVLaravel/public/user/search" method="get">
             @csrf
	     <input style="width: 280px" type="text" name="keysearch" placeholder="Find Your Favourtie Movies" /> 
	      <!--search-icon----------->
	      <button style="border: none;background-color: #f6f5f0" type="submit" >  <i type="submit" name="signin" class="fas fa-search"></i></button>
	
	    </form>
	   	</li>
   	</ul>
  </nav>