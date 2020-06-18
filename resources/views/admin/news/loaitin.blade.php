@extends('admin.master')
@section('title','NBS - Quản lý loại tin')
@section('admin_content')
<div class="category bg-dark rounded" style="margin:0;">
    @if ( Session::has('success') )
        <div class="alert alert-success alert-dismissible" style="margin-top:10px;" role="alert">
            <strong>{{ Session::get('success') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
        </div>
    @elseif ( Session::has('error') )
        <div class="alert alert-danger alert-dismissible" style="margin-top:10px;" role="alert">
            <strong>{{ Session::get('error') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
        </div>
    @endif
    <div class="row">
        <div class="col-12" style="">
            <table class="table table-striped table-bordered table-dark text-center" >
                <tr class="text-center">
                    <td colspan="4" class="font-weight-bold"><h3>DANH SÁCH LOẠI TIN</h3></td>
                </tr>
                <tr class="font-weight-bold text-center">
                    <td>#</td>
                    <td>Thể loại</td>
                    <td>Tên loại tin</td>
                    <td style="width: 20%;">Thao tác</td>
                </tr>
                <?php
                    $i=1;
                ?>
                @foreach ($loaitin as $lt)
                    <tr>
                        <td>{{$i++}}</td>
                        <td title="Thể loại">
                            <?php
                                $theloaii = DB::table('theloai')->where('id',$lt->idTheLoai)->get();
                            ?>
                            @foreach($theloaii as $tll)
                            {{$tll->tenTheLoai}}
                            @endforeach
                        </td>
                        <td title="Tên loại tin">{{$lt->tenLoaiTin}}</td>
                        <td><a href=""><button class="btn btn-outline-light">Sửa</button></a> <a href="{{ route('admin.deleteLT',$lt->id) }}"><button class="btn btn-outline-light">Xóa</button></a></td>
                    </tr>
                    
                @endforeach
                <tr>
                    <td colspan="4" class="text-center"><button id="btnThemLT" class="btn btn-outline-info">Thêm loại tin</button></td>
                </tr>
            </table>
            <div id="loaiTin">
                <form action="{{ route('admin.post.loaiTin') }}" method="post">
                    {{ csrf_field() }}
                    <table class="table table-borderless table-dark">
                        <tr>
                            <td colspan="2" class="text-center"><h4>Thêm loại tin</h4></td>
                        </tr>
                        <tr>
                            <td>Chọn thể loại: </td><td><select name="idTheLoai" style="width: 50%;" class="form-control" id="theLoai">
                                @foreach ($theloai as $tl)
                                    <option value="{{$tl->id}}">{{$tl->tenTheLoai}}</option>    
                                @endforeach
                            </select></td>
                        </tr>
                        <tr>
                            <td>Tên loại tin: </td><td><input type="text" name="txtTenLoaiTin" class="form-control" required></td>
                        </tr>
                        <tr>
                            <td class="text-center" colspan="2"><button name="btnThemLoaiTin" class="btn btn-outline-light">Thêm</button></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.getElementById("loaiTin").style.display = 'none';
        document.getElementById("btnThemLT").onclick = function(){
        document.getElementById("loaiTin").style.display = 'block';
    }
    </script>
</div>
@endsection