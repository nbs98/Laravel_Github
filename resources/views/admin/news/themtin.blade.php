@extends('admin.master')
@section('title','NBS - Thêm tin tức')
@section('admin_content')
<?php
    $theLoai = DB::table('theloai')->get();
    $loaiTin = DB::table('loaitin')->get();
?>
    <div class="themTin">
        <div class="text-center">
            @if ( Session::has('success') )
                <div class="alert alert-success alert-dismissible" style="margin-top:10px;" role="alert">
                    <strong>{{ Session::get('success') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                </div>
            @endif
            <h2>THÊM TIN TỨC</h2>
        </div>
        <form action="{{ route('admin.post.themTin') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <table class="table table-borderless text-light">
                <tr>
                    <td>Chọn thể loại</td>
                    <td><select name="theLoai" id="theLoai" class="form-control" style="width: 50%;">
                            <option value="" selected="selected">--- Lựa chọn thể loại ---</option>
                            @foreach ($theLoai as $tl)
                                <option value="{{$tl->id}}">{{$tl->tenTheLoai}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Chọn loại tin</td>
                    <td>
                        <select name="loaiTin" id="loaiTin" class="form-control" style="width: 50%;">
                            <option value="" selected="selected">--- Lựa chọn loại tin ---</option>
                            @foreach ($loaiTin as $lt)
                                <option value="{{$lt->id}}">{{$lt->tenLoaiTin}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Tiêu đề</td>
                    <td><input type="text" class="form-control" name="tieuDe"></td>
                </tr>
                <tr>
                    <td>Tóm tắt</td>
                    <td><input type="text" class="form-control" name="tomTat"></td>
                </tr>
                <tr>
                    <td>Nội dung</td>
                    <td><textarea name="noiDung" id="editor1" cols="30" rows="10"></textarea></td>
                </tr>
                <tr>
                    <td><p>Hình ảnh hiển thị </p><span class="font-italic">(Ảnh ngang)</span></td>
                    <td><input type="file" class="bg-light form-control" style="width: 50%;" name="hinhAnh" accept="image/png, image/jpeg"></td>
                </tr>
                <tr>
                    <td>Tags</td>
                    <td><input type="text" name="tags" data-role="tagsinput" class="form-control" placeholder="Tab để xác nhận"></td>
                </tr>
                <tr class="text-center">
                    <td colspan="2"><input type="submit" class="btn text-danger btn-light btn-outline-success" value="Thêm tin tức"> <a href="{{ route('admin.get.tinTuc') }}" class="btn btn-light btn-outline-danger">Trở lại</a></td>
                </tr>
            </table>
        </form>
    </div>
    <script>
        $(document).ready(function () {
            $("#theLoai").change(function(){
                var idTheloai = $(this).val();
                $.get("loadSelect/"+idTheloai,function(data) {
                    // alert(data);
                    $("#loaiTin").html(data);
                });
            });
        });
    </script>
@endsection