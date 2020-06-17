@extends('master')
@section('title','Thông tin tài khoản')
@section('content')
<?php
    $level = $user['level'];
    $avatar = $user['avatar'];
?>
    <div class="content col-12 bg-light rounded" style="top: 10px;">
        <div class="info">
            @if ( Session::has('success') )
            <div class="alert alert-success alert-dismissible" style="margin-top:10px;" role="alert">
                <strong>{{ Session::get('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
            @endif
                <div class="tieude text-center">
                    <h2>THÔNG TIN TÀI KHOẢN</h2>
                </div>
                <div class="row">
                    <div class="col-4 text-center" style="margin-top: 15px;">
                        <img src="{{asset('frontend/avatar/'.$avatar)}}" class="rounded" style="width: 200px;">
                        <p style="padding-top: 10px;"><a id="show_editavatar" class="btn btn-primary text-light border-0 btn-outline-danger">Cập nhật hình ảnh</a></p>
                        <div id="edit_avatar">
                            <form action="{{ route('home.post.info') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="file-field">
                                    <div class="btn btn-light border-secondary"  style="margin-top: 10px;width:100%;">
                                        <input type="file" name="edit_avatar" accept="image/png, image/jpeg">
                                    </div>
                                </div>
                                <input type="submit" onclick="return confirm('Bạn chắc chưa?')" name="updateAvatar" value="Cập nhật" class="btn btn-outline-danger" style="margin-top: 5px;">
                            </form>
                        </div>
                    </div>
                    <form action="{{ route('home.post.info') }}" method="post" class="col-8">
                        {{ csrf_field() }}
                        <div>
                            <table class="table table-active rounded" style="margin-top: 15px;">
                                <tr>
                                    <td>Tài khoản   </td><td> <input disabled class="form-control mr-sm-2" type="edit_username" value="{{ $user['username'] }}"></td>
                                </tr>
                                <tr>
                                    <td>Họ và tên <span class="text-danger font-weight-bold">*</span></td><td> <input class="form-control mr-sm-2" type="text" name="edit_name" value="{{ $user['name'] }}"></td>
                                </tr>
                                <tr>
                                    <td>Email <span class="text-danger font-weight-bold">*</span></td><td> <input class="form-control mr-sm-2" type="text" name="edit_email" value="{{ $user['email'] }}"></td>
                                </tr>
                                <tr>
                                    <td>Quyền</td><td>
                                        @if($level==1)
                                            <input disabled class="form-control mr-sm-2 text-danger font-weight-bold" type="text" value="ADMIN">
                                        @elseif($level==2)
                                            <input disabled class="form-control mr-sm-2 text-danger font-weight-bold" type="text" value="Quản trị viên">
                                        @else
                                            <input disabled class="form-control mr-sm-2 text-danger font-weight-bold" type="text" value="Thành viên">
                                        @endif
                                    </td>
                                </tr>
                                <tr class="text-center">
                                    <td colspan="2"><input type="submit" onclick="return confirm('Bạn chắc chưa?')" name="updateInfo" value="Cập nhật thông tin" class="btn btn-primary text-light border-0 btn-outline-danger"></td>
                                </tr>
                            </table>
                        </div>
                    </form>
                </div>
                <div class="row">
                    <div class="col-4"></div>
                    <div class="changePass col-8 text-center">
                        <button id="showChangePass" class="btn btn-primary text-light border-0 btn-outline-danger">Thay đổi mật khẩu</button>
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible" style="margin-top:10px;" role="alert">
                                @foreach ($errors->all() as $error)
                                        <p>{{ $error }}</p>
                                    @endforeach
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                            </div>
                        @endif
                        <form action="{{ route('home.post.info') }}" method="post" id="changePass">
                            {{ csrf_field() }}
                            <div class="form-group col-md-12" >
                                <p><input type="password" required style="margin-top: 10px;height:40px;width:60%;margin-left:20%;" class="form-control" name="old_password" placeholder="Mật khẩu cũ ..."></p>
                                <p><input type="password" required style="margin-top: 10px;height:40px;width:60%;margin-left:20%;" class="form-control" name="new_password" placeholder="Mật khẩu mới..."></p>
                                <p><input type="password" required style="margin-top: 10px;height:40px;width:60%;margin-left:20%;" class="form-control" name="re_new_password" placeholder="Nhập lại mật khẩu mới..."></p>
                                <p><input type="submit" onclick="return confirm('Bạn chắc chưa?')" name="chagePassword" class="btn btn-primary text-light border-0 btn-outline-danger" value="Đổi mật khẩu"></p>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="admin_button text-center" style="margin-bottom: 15px;">
                    @if($level==1 || $level==2)
                    <a href="{{ route('admin.get.dashBroad') }}" class="btn btn-dark text-light border-0 btn-outline-danger">Trang quản trị viên</a>
                    @endif
                </div>
        </div>
    </div>
    <script>
        document.getElementById("edit_avatar").style.display = 'none';
        document.getElementById("show_editavatar").onclick = function () {
            document.getElementById("show_editavatar").style.display='none';
            document.getElementById("edit_avatar").style.display = 'block';
        };
        document.getElementById("changePass").style.display='none';
        document.getElementById("showChangePass").onclick = function(){
            document.getElementById("changePass").style.display='block';
            document.getElementById("showChangePass").style.display='none';
        };
    </script>
@endsection
