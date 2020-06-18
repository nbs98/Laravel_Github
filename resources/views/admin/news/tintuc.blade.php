@extends('admin.master')
@section('title','NBS - Danh sách tin tức')
@section('admin_content')
    {{-- <div class="row">
        <div class="col-12"> --}}
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
        <table class="table table-striped table-secondary">
            <thead class="thead-dark">
                <tr>
                    <td colspan="6" class="text-center"><h2>DANH SÁCH TIN TỨC </h2></td><td colspan="2"><a href="{{ route('admin.get.themTin') }}"><button class="btn btn-outline-danger">Thêm tin</button></a></td>
                </tr>
                <tr class="text-center">
                    <th>Hình ảnh</th>
                    <th>Tiêu đề</th>
                    <th>Lượt xem</th>
                    <th>Loại tin</th>
                    <th>Người đăng</th>
                    <th>Tags</th>
                    <th>Thời gian đăng</th>
                    <th>Thao tác</th>
                </tr>
                </thead>
                @foreach ($tinTuc as $news)
                    <tr>
                        <td scope="row"><img src="{{asset('backend/uploadTinTuc/'.$news->hinhAnh)}}" class="rounded" style="width: 80px;"></td>
                        <td>{{ $news->tieuDe }}</td>
                        <td>{{ $news->soLuotXem }}</td>
                        <td><?php $loaitin = DB::table('loaitin')->where('id',$news->idLoaiTin)->get(); ?> @foreach($loaitin as $lt) {{$lt->tenLoaiTin}}  @endforeach</td>
                        <td>{{ $news->tacGia }}</td>
                        <td>{{ $news->tag }}</td>
                        <td>{{ $news->created_at }}</td>
                        <td class="text-center"><a href=""><button class="btn btn-outline-primary text-dark bg-primary">Xem thêm</button></a><a href="{{ route('admin.get.xoaTin',$news->id) }}"><button class="btn btn-outline-danger text-light bg-dark">Xóa</button></a></td>
                    </tr>
                @endforeach
        </table>
    {{-- </div>
    </div> --}}
@endsection