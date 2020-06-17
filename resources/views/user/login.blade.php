@extends('master')
@section('title','Trang đăng nhập')
@section('content')
    <div class="content bg-light rounded" style="top: 10px;">
        <form action="{{ route('home.post.login') }}" method="post">
            {{ csrf_field() }}
            <div class="login bg-light text-center">
                @if ( Session::has('error') )
                    <div class="alert alert-danger alert-dismissible" style="margin-top:10px;" role="alert">
                        <strong>{{ Session::get('error') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                    </div>
                @endif
                <h2 style="padding: 10px;" class="text-danger">ĐĂNG NHẬP</h2>
                <div class="login col-auto">
                    <input type="text" class="form-control" placeholder="Tài khoản..." style="width:40%;margin-left:30%;" name="username" value="{{ old('username') }}" required autofocus>
                    <input type="password" placeholder="Mật khẩu...." class="form-control" style="width:40%;margin-left:30%;margin-top: 10px;" name="password" required>
                    <input type="submit" value="Đăng nhập" class="btn btn-outline-danger" style="margin-top: 20px;height:50px;">
                </div>
                <div class="regis" style="margin-top:10px; padding-bottom: 10px;">
                    <span class="text-dark font-italic">Chưa có tài khoản? </span><a href="{{ route('home.get.regis') }}"> Đăng ký</a>
                </div>
            </div>
        </form>
    </div>
@endsection
