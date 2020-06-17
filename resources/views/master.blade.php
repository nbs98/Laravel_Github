<!doctype html>
<html lang="en">
  <?php
    $user = Auth::user();
  ?>
  <head>
    <title>@yield('title')</title>
    <style>
      body{
        background-image: linear-gradient(to right, rgba(121, 107, 250, 0.698),rgba(148, 78, 155, 0.698));
      }
      .logo:hover,.logo:focus{
        transform: rotate(360deg);
        transition: 2s;
        font-size: 40px;
        
      }
      ul li:hover{
        transition: 0.5s;
        font-size: 18px;
      }
    </style>
    {{-- CKEDITOR --}}
    <script src="{{ asset('/frontend/ckeditor/ckeditor.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/frontend/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/frontend/font-awesome-4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <div class="container">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-light bg-light rounded justify-content-between">
      <a class="navbar-brand font-weight-bold text-danger logo" href="{{ route('home.get.index')}}">NBS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav font-weight-bold">
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('home.get.index') }}"><span class="fa fa-home" aria-hidden="true"></span> Trang chủ</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-newspaper-o" aria-hidden="true"></i> Tin tức
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="fa fa-scribd" aria-hidden="true"></i> Cộng đồng</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{ route('home.get.about') }}"><i class="fa fa-info-circle" aria-hidden="true"></i> About me</a>
            </li>
          </ul>
          <ul class="nav">
            @if(!Auth::check())
              <li class="nav-item">
              <a class="nav-link" href="{{ route('home.get.login') }}"><img src="/frontend/icon/login.png" class="" style="width: 30px;" alt="Login"></a>
              </li>
            @else
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle bg-light rounded" href="#" id="homeUserInfoDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span><img src="{{asset('frontend/avatar/'.$user['avatar'])}}" class="rounded" style="width: 25px;"></span>
              </a>
              <div class="dropdown-menu" aria-labelledby="homeUserInfoDropdown">
                <a class="dropdown-item" href="{{ route('home.get.info') }}">Thông tin tài khoản</a>
                <a class="dropdown-item" onclick="return confirm('Bạn có muốn đăng xuất không?')" href="{{ route('home.get.logout') }}">Đăng xuất</a>
              </div>
            </li>
            @endif
          </ul>
        </div>
        <form class="form-inline" style="margin-right: 30px;">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-danger border-0 text-light btn-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </nav>
      <!-- endNavbar -->
      @if ( Session::has('logged') )
        <div class="alert alert-success alert-dismissible" style="margin-top:10px;" role="alert">
            <strong>{{ Session::get('logged') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
        </div>
    @endif
      <div class="slide">
        @yield('slide')
      </div>
      <div class="content">
        @yield('content')
      </div>
      <div class="footer" style="margin-top: 12px;">
        <!-- Footer -->
        <footer class="page-footer rounded font-small blue bg-secondary">

          <!-- Copyright -->
          <div class="footer-copyright text-center text-light py-3">© 2020 Copyright:
          <a href="{{ route('home.get.index') }}" class="text-warning font-weight-bold"> NBS</a>
          </div>
          <!-- Copyright -->
        </footer>
        <!-- Footer -->
      </div>
    </div>
    <script> CKEDITOR.replace('editor1'); </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>