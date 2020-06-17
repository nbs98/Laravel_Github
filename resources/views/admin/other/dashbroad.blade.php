@extends('admin.master')
@section('title','NBS - Trang điều khiển')
@section('admin_content')
    <div class="content bg-light rounded" style="padding-top: 5px;">
        <div class="container-fluid">
            <h1 class="mt-4">BẢNG ĐIỀU KHIỂN</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Thông tin chung</li>
            </ol>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4 text-center">
                        <div class="card-body"><h1>{{ $demtheloai }}</h1><h2>THỂ LOẠI</h2></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">Chi tiết</a>
                            <div class="small text-white"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4 text-center">
                        <div class="card-body"><h1>{{ $demloaitin }}</h1><h2>LOẠI TIN</h2></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">Chi tiết</a>
                            <div class="small text-white"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4 text-center">
                        <div class="card-body"><h1>{{ $demtintuc }}</h1><h2>TIN TỨC</h2></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">Chi tiết</a>
                            <div class="small text-white"><i class="fa fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4 text-center">
                        <div class="card-body"><h1>{{ $demcomment }}</h1><h2>COMMENT</h2></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">Chi tiết</a>
                            <div class="small text-white"><i class="fa fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection