@extends('master')
@section('title','Đăng ký tài khoản')
@section('content')
    <div class="content bg-light rounded" style="top: 10px;">
        <form method="post" action=" {{ route('home.post.regis') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            @if ( Session::has('success') )
                <div class="alert alert-success alert-dismissible" style="margin-top:10px;" role="alert">
                    <strong>{{ Session::get('success') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                </div>
            @elseif(Session::has('error'))
                <div class="alert alert-danger alert-dismissible" style="margin-top:10px;" role="alert">
                    <strong>{{ Session::get('error') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                </div>
            @endif
            <div class="login bg-light text-center">
                <h2 style="padding: 10px;" class="text-danger">ĐĂNG KÝ TÀI KHOẢN</h2>
                <div class="login col-auto">
                    <input type="text" name="name" class="form-control" style="margin-top: 10px;height:40px; width:40%;margin-left:30%" placeholder="Họ và tên..." required autofocus>
                    <div class="file-field">
                        <div class="btn btn-light border-secondary"  style="margin-top: 10px;width:40%;">
                            <span class="font-weight-bold">Avatar:</span>
                            <input type="file" name="avatar" accept="image/png, image/jpeg">
                        </div>
                    </div>
                    @if ($errors->has('avatar'))
                        <span class="help-block text-danger">
                            <strong>{{ $errors->first('avatar') }}</strong>
                        </span>
                    @endif
                    {{-- <input type="file" name="avatar" class="form-control" style="margin-top: 10px;height:40px; width:40%;margin-left:20%;"> --}}
                    <input type="text" name="email" class="form-control" style="margin-top: 10px;height:40px; width:40%;margin-left:30%" placeholder="Email..." required>
                    @if ($errors->has('email'))
                        <span class="help-block text-danger">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                    <input type="text" name="username" class="form-control" style="margin-top: 10px;height:40px; width:40%;margin-left:30%" placeholder="Tài khoản..." required>
                    @if ($errors->has('username'))
                        <span class="help-block text-danger">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                    <input type="password" name="password" class="form-control" style="margin-top: 10px;height:40px;width:40%;margin-left:30%" placeholder="Mật khẩu..." required>
                    @if ($errors->has('password'))
                        <span class="help-block text-danger">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                    <input type="password" name="re-password" class="form-control" style="margin-top: 10px;height:40px;width:40%;margin-left:30%" placeholder="Nhập lại mật khẩu..." required>
                    @if ($errors->has('re-password'))
                        <span class="help-block text-danger ">
                            <strong>{{ $errors->first('re-password') }}</strong>
                        </span>
                    @endif
                </div>
                <input type="submit" value="Đăng ký tài khoản" class="btn btn-outline-danger" style="margin-top: 20px;height:50px;">
                <div class="regis" style="margin-top:10px; padding-bottom: 10px;">
                    <span class="text-dark font-italic">Đã có tài khoản? </span><a href="{{ route('home.get.login') }}"> Đăng nhập</a>
                </div>
            </div>
        </form>
    </div>
@endsection