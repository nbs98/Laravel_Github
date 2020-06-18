@extends('master')
@foreach ($tinTuc->all() as $tin)

@section('title',$tin->tieuDe)
@section('content')
    <div class="row bg-light rounded" style="padding-top:10px;margin:0; margin-top: 10px;">
        <div class="col-8">
            <div class="duongdan" style="padding-bottom: 15px;">
                <a href="{{route('home.get.index')}}" class="font-weight-bold text-info text-decoration-none">TRANG CHỦ </a> | <a href="" class="text-decoration-none text-info font-weight-bold"><?php $theloai = DB::table('theloai')->where('id',$tin->idTheLoai)->get(); ?>@foreach($theloai as $tl) {{ $tl->tenTheLoai }} @endforeach</a>
            </div>
            <div class="tieude border-top">
                <h5 class="font-weight-bold"><i class="fa fa-gg text-danger" aria-hidden="true"></i>{{ ' '.$tin->tieuDe }}</h5>
            </div>
            <div class="time" style="margin-left: 40px; font-size: 14px; opacity: 0.7; padding-bottom: 15px; padding-top:5px;">
            <?php
                $time = $tin->created_at;
            ?>
                <span class="font-italic"> Posted by </span> <span class="font-italic text-danger font-weight-bold">{{ $tin->tacGia }}</span><span class="font-italic"> on {{ date('l, d/m/Y', strtotime($time)) }} at {{ date('H:i A', strtotime($time)) }}</span> 
            </div>
            <div class="noiDung embed-responsive">
                <table>
                    {!! htmlspecialchars_decode(stripslashes($tin-> noiDung)) !!}
                </table>
            </div>
        </div>
        <div class="col-4">
            <p class="font-weight-bold text-primary border-bottom">CÙNG CHUYÊN MỤC</p>
            <?php
                $tincm = DB::table('tintuc')->where('idTheLoai',$tin->idTheLoai)->get();
            ?>
            <div class="row border border-dark" style="margin: 0;">
                @foreach ($tincm as $tincungcm)
                <div class="col-4" style="padding-top: 10px;">
                    <img src="{{asset('backend/uploadTinTuc/'.$tincungcm->hinhAnh)}}" class="img-fluid" title="{{ $tincungcm->tieuDe }}">
                </div>
                <div class="col-8" style="padding-bottom: 10px;">
                    
                    @if (strlen($tincungcm->tieuDe) < 80)
                    {{$tincungcm->tieuDe}}
                    @else
                        {{ substr($tincungcm->tieuDe,0,80).' ...' }}
                    @endif
                </div>
                @endforeach
            </div>
            Tin liên quan
            <div class="row">
                <div class="col-4">
                    hiinh anh
                </div>
                <div class="col-8">
                    tieu de
                </div>
            </div>
        </div>
    </div>

@endsection
@endforeach
