<!doctype html>
<html lang="en">
  <head>
    <?php
      $user = Auth::user();
      $level = $user['level'];
      $avatar = $user['avatar'];
      if($level==3){
        echo '<script>alert("Bạn không có quyền truy cập!!!")</script>'.redirect()->route('home.get.index');
      }
    ?>
    <title>@yield('title')</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/frontend/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/frontend/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/frontend/tagsinput/dist/bootstrap-tagsinput.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/admin_style.css')}}">
    {{-- CKEDITOR --}}
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <style>
      body{
        background-image: linear-gradient(to right, rgba(53, 53, 53, 0.897), rgb(180, 180, 180));
      }
    </style>
  </head>
  <body>
    <nav class="nav justify-content-between bg-danger ">
      <a class="nav-link active text-warning font-weight-bold" href="{{ route('admin.get.dashBroad') }}">NBS</a>
    <a class="nav-link text-light font-weight-bold" href="{{ route('home.get.index') }}"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Trang chủ</a>
    </nav>
        <!-- Bootstrap row -->
        <div class="row" id="body-row">
            <!-- Sidebar -->
            <div id="sidebar-container" class="sidebar-expanded d-none d-md-block">
                <!-- d-* hiddens the Sidebar in smaller devices. Its itens can be kept on the Navbar 'Menu' -->
                <!-- Bootstrap List Group -->
                <ul class="list-group">
                    <!-- Separator with title -->
                    <li>
                      <div class="row accinfo bg-dark" style="margin: 0px; padding-top: 10px;">
                        <div class="col-5 text-center">
                          <img src="{{asset('frontend/avatar/'.$avatar)}}" class="rounded" style="width: 80px;">
                        </div>
                        <div class="col-7 text-center info" style="padding: 10px;">
                          <p class="text-light font-weight-bold bg-danger rounded">{{ $user['name'] }}</p>
                          <p class="text-light">
                            @if($level==1)
                              Admin
                            @elseif($level==2)
                              Quản trị viên
                            @endif
                          </p>
                        </div>
                      </div>
                    </li>
                    <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                        <small>MENU CHÍNH</small>
                    </li>
                    <!-- /END Separator -->
                    <!-- Menu with submenu -->
                    <a href="{{ route('admin.get.dashBroad') }}" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-start align-items-center">
                            <span class="fa fa-dashboard fa-fw mr-3"></span>
                            <span class="menu-collapsed">Bảng điều khiển</span>
                        </div>
                    </a>

                    <a href="#qlcongviec" data-toggle="collapse" class="bg-dark list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-start align-items-center">
                            <span class="fa fa-tasks fa-fw mr-3"></span>
                            <span class="menu-collapsed">Công việc</span>   
                            <span class="submenu-icon ml-auto"></span> 
                        </div>
                    </a>
                      <div id='qlcongviec' class="collapse sidebar-submenu">
                        <a href="{{route('admin.get.theLoai')}}" class="list-group-item list-group-item-action bg-dark text-white">
                          <i class="fa fa-long-arrow-right text-warning" aria-hidden="true"></i><span class="menu-collapsed"> Quản lý thể loại</span>
                        </a>
                      </div>
                      <div id='qlcongviec' class="collapse sidebar-submenu">
                        <a href="{{route('admin.get.loaiTin')}}" class="list-group-item list-group-item-action bg-dark text-white">
                          <i class="fa fa-long-arrow-right text-warning" aria-hidden="true"></i><span class="menu-collapsed"> Quản lý loại tin</span>
                        </a>
                      </div>
                      <div id='qlcongviec' class="collapse sidebar-submenu">
                        <a href="{{route('admin.get.tinTuc')}}" class="list-group-item list-group-item-action bg-dark text-white">
                          <i class="fa fa-long-arrow-right text-warning" aria-hidden="true"></i><span class="menu-collapsed"> Quản lý tin tức</span>
                        </a>
                      </div>
                      <div id='qlcongviec' class="collapse sidebar-submenu">
                        <a href="" class="list-group-item list-group-item-action bg-dark text-white">
                          <i class="fa fa-long-arrow-right text-warning" aria-hidden="true"></i><span class="menu-collapsed"> Quản lý Comment</span>
                        </a>
                      </div>
                      <a href="#taikhoan" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-start align-items-center">
                            <span class="fa fa-user fa-fw mr-3"></span>
                            <span class="menu-collapsed">Tài khoản</span>
                            <span class="submenu-icon ml-auto"></span>
                        </div>
                      </a>
                      <!-- Submenu content -->
                        <div id='taikhoan' class="collapse sidebar-submenu">
                          <a href="{{ route('admin.get.listAccount') }}" class="list-group-item list-group-item-action bg-dark text-white">
                            <i class="fa fa-long-arrow-right text-warning" aria-hidden="true"></i><span class="menu-collapsed"> Danh sách tài khoản</span>
                            </a>
                        </div>
                    <!-- Separator with title -->
                    <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                        <small>TÙY CHỌN</small>
                    </li>
                    <!-- /END Separator -->
                    <a href="#" class="bg-dark list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-start align-items-center">
                            <span class="fa fa-calendar fa-fw mr-3"></span>
                            <span class="menu-collapsed">Calendar</span>
                        </div>
                    </a>
                    <a href="#" class="bg-dark list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-start align-items-center">
                            <span class="fa fa-envelope-o fa-fw mr-3"></span>
                            <span class="menu-collapsed">Messages <span class="badge badge-pill badge-primary ml-2">5</span></span>
                        </div>
                    </a>
                    <!-- Separator without title -->
                    <li class="list-group-item sidebar-separator menu-collapsed"></li>
                    <!-- /END Separator -->
                    <a href="#" class="bg-dark list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-start align-items-center">
                            <span class="fa fa-question fa-fw mr-3"></span>
                            <span class="menu-collapsed">Trợ giúp</span>
                        </div>
                    </a>
                    <a href="#top" data-toggle="sidebar-colapse" class="bg-dark list-group-item list-group-item-action d-flex align-items-center">
                        <div class="d-flex w-100 justify-content-start align-items-center">
                            <span id="collapse-icon" class="fa fa-2x mr-3"></span>
                            <span id="collapse-text" class="menu-collapsed">Thu gọn</span>
                        </div>
                    </a>
                </ul><!-- List Group END-->
            </div><!-- sidebar-container END -->
            <!-- MAIN -->
            <div class="col p-4">
              @yield('admin_content')
            </div><!-- Main Col END -->
        </div><!-- body-row END -->
      {{-- </div> --}}
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
      // Hide submenus
      $('#body-row .collapse').collapse('hide'); 

      // Collapse/Expand icon
      $('#collapse-icon').addClass('fa-angle-double-left'); 

      // Collapse click
      $('[data-toggle=sidebar-colapse]').click(function() {
          SidebarCollapse();
      });

      function SidebarCollapse () {
          $('.menu-collapsed').toggleClass('d-none');
          $('.sidebar-submenu').toggleClass('d-none');
          $('.accinfo').toggleClass('d-none');
          $('.submenu-icon').toggleClass('d-none');
          $('#sidebar-container').toggleClass('sidebar-expanded sidebar-collapsed');
          
          // Treating d-flex/d-none on separators with title
          var SeparatorTitle = $('.sidebar-separator-title');
          if ( SeparatorTitle.hasClass('d-flex') ) {
              SeparatorTitle.removeClass('d-flex');
          } else {
              SeparatorTitle.addClass('d-flex');
          }
          
          // Collapse/Expand icon
          $('#collapse-icon').toggleClass('fa-angle-double-left fa-angle-double-right');
      }
    </script>
    <script src="/frontend/tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <script> CKEDITOR.replace('editor1'); </script>
  </body>
</html>