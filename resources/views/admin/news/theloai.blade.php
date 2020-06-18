@extends('admin.master')
@section('title','NBS - Quản lý thể loại')
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
        <div class="col-12 text-center" style="">
            <table class="table table-striped table-bordered table-dark" style="">
                <tr class="text-center">
                    <td colspan="4" class="font-weight-bold"><h3>DANH SÁCH THỂ LOẠI</h3></td>
                </tr>
                <tr class="font-weight-bold text-center">
                    <td>#</td>
                    <td>Tên thể loại</td> 
                    <td style="width: 20%;">Thao tác</td>
                </tr>
                <?php
                    $j=1;
                ?>
                @foreach ($theloai as $tl)
                    <tr>
                        <td>{{$j++}}</td>
                        <td title="Tên thể loại">{{$tl->tenTheLoai}}</td>
                        <td><a href=""><button name="suaTheLoai" class="btn btn-outline-light">Sửa</button></a> <a href="{{ route('admin.deleteTL',$tl->id) }}"><button id="xoaTheLoai" class="btn btn-outline-light">Xóa</button></a></td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3" class="text-center"><button id="btnThemTL" class="btn btn-outline-info">Thêm thể loại</button></td>
                </tr>
            </table>
            <div id="theLoai" class="">
                <form action="{{ route('admin.post.theLoai') }}" method="post">
                    {{ csrf_field() }}
                    <table class="table table-borderless table-dark">
                        <tr>
                            <td colspan="2" class="text-center"><h4>Thêm thể loại</h4></td>
                        </tr>
                        
                        <tr>
                            <td>Tên thể loại: </td><td><input type="text" name="txtTenTheLoai" class="form-control" required></td>
                        </tr>
                        <tr>
                            <td class="text-center" colspan="2"><button name="btnThemTheLoai" class="btn btn-outline-light">Thêm</button></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById("theLoai").style.display = 'none';
    
    document.getElementById("btnThemTL").onclick = function(){
        document.getElementById("theLoai").style.display = 'block';
    }
    
</script>
@endsection