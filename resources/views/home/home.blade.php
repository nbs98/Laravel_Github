@extends('master')
@section('title','Laravel - NBS - Home')
@section('slide')
    <div id="mycarousel" class="carousel slide" data-ride="carousel" style="padding-top: 5px;">
      <!--Cho hiện thị chỉ số nếu muốn-->
      <ol class="carousel-indicators">
          <li data-target="#mycarousel" data-slide-to="0" class="active"></li>
          <li data-target="#mycarousel" data-slide-to="1" class=""></li>
          <li data-target="#mycarousel" data-slide-to="2" class=""></li>
          <li data-target="#mycarousel" data-slide-to="3" class=""></li>
      </ol>
      <!--Hết tạo chỉ số-->
      <!--Các slide bên trong carousel-inner-->
      <div class="carousel-inner">
          <!--Slide 1 thiết lập hiện thị đầu tiên .active-->
          <div class="carousel-item active">
              <img class="d-block w-100 img-thumbnail" alt="Slide 1" src="frontend/slide/1920x650px.jpg">
              <!--Cho thêm hiện thị thông tin-->
              <div class="carousel-caption d-none d-md-block">
                  <!-- <h5>HEHEHEHEHEHEHE</h5>
                  <p>Dòng text chú thích cho Slide 1</p> -->
              </div>
          </div>
          <!--Slide 2-->
          <div class="carousel-item">
              <img class="d-block w-100 img-thumbnail" alt="Slide 2" src="frontend/slide/Banner-trang-VNPT.com.vn.png">
          </div>
          <!--Slide 3-->
          <div class="carousel-item">
              <img class="d-block w-100 img-thumbnail" alt="Slide 3" src="frontend/slide/Banner_Home.png">
          </div>
          <div class="carousel-item">
              <img class="d-block w-100 img-thumbnail" alt="Slide 4" src="frontend/slide/Topbanner_Marvel.jpg">
          </div>
      </div>
      <!--Cho thêm khiển chuyển slide trước, sau nếu muốn-->
          <a class="carousel-control-prev" href="#mycarousel" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span></a>
          <a class="carousel-control-next" href="#mycarousel" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
      <!--Hết tạo điều khiển chuyển Slide--> 
      
@endsection

@section('content')
<div class="content bg-light rounded">
    <div class="row" style="margin:0; margin-top:5px;padding-top: 5px;">
        <div class="col-6">
            <h5 class="text-center"><span class="rounded text-danger font-weight-bold">TIN NỔI BẬT</span></h5>
            @foreach ($tinnoibat as $tinNoiBat)
            <div class="card" title="{{$tinNoiBat->tieuDe}}" style="margin-bottom: 10px; padding-bottom: 5px;">
                <div class="card-box">
                    
                    <a href="home/chitiet/{{ $tinNoiBat->id }}/{{ $tinNoiBat->tieuDe }}" class="text-decoration-none" style=""><i class="fa fa-caret-square-o-up text-success" aria-hidden="true"> </i><span class="font-weight-bold ">{{' '.$tinNoiBat->tieuDe}}</span></a>
                </div>
                <div class="card-img" style="margin-top: 5px;">
                    <div class="row">
                        <div class="col-4 col-md-5 embed-responsive" style="margin-top: 5px;">
                            <img src="{{asset('backend/uploadTinTuc/'.$tinNoiBat->hinhAnh)}}" class="img-fluid img-thumbnail" alt="Mobirise" title="" media-simple="true">
                        </div>
                        <div class="col-8 col-md-7">
                            @if (strlen($tinNoiBat->tomTat)<'190')
                            {{$tinNoiBat->tomTat }}
                            @else
                            {{ substr($tinNoiBat->tomTat,0,197).' ...' }}
                            @endif
                            <p style="martin-1op:5px;"><a href="" class="text-success text-decoration-none"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i>{{' '.$tinNoiBat->tenLoaiTin}}</a></p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @foreach ($tinnoibat2 as $tinNoiBat2)
            <div class="card bg" title="{{$tinNoiBat2->tieuDe}}" style="margin-bottom: 3px;padding-bottom: 5px;">
                <div class="card-box">
                    <a href="home/chitiet/{{ $tinNoiBat2->id }}/{{ $tinNoiBat2->tieuDe }}" class="text-decoration-none"><i class="fa fa-newspaper-o" aria-hidden="true"></i><span>
                        <?php
                            $tieude = $tinNoiBat2->tieuDe;
                            if(strlen($tieude) < 80){
                                echo $tieude;
                            }else{
                                echo substr($tieude,0,80).'...';
                            }
                        ?>

                        {{-- ERROR --}}
                        {{-- @if (strlen($tinNoiBat2->tieuDe) < 80)
                        {{$tinNoiBat2->tieuDe }}
                        @else
                        {{ substr($tinNoiBat2->tieuDe,0,80).' ...' }}
                        @endif --}}
                    </span></a>
                </div>
            </div>
            @endforeach
            
        </div>
        <div class="col-6">
            <h5 class="text-center"><span class="rounded text-danger font-weight-bold">TIN MỚI</span></h5>
            @foreach ($tinmoinhat as $tinMoiNhat)
            <div class="card" title="{{$tinMoiNhat->tieuDe}}" style="margin-bottom: 10px; padding-bottom: 5px;">
                <div class="card-box">
                    <a href="home/chitiet/{{ $tinMoiNhat->id }}/{{ $tinMoiNhat->tieuDe }}" class="text-decoration-none" style=""><i class="fa fa-caret-square-o-up text-success" aria-hidden="true"> </i><span class="font-weight-bold ">{{' '.$tinMoiNhat->tieuDe}}</span></a>
                </div>
                <div class="card-img" style="margin-top: 5px;">
                    <div class="row">
                        <div class="col-4 col-md-5" style="margin-top: 5px;">
                            <img src="{{asset('backend/uploadTinTuc/'.$tinMoiNhat->hinhAnh)}}" class="img-fluid img-thumbnail" alt="Mobirise" title="" media-simple="true">
                        </div>
                        <div class="col-8 col-md-7">
                            @if (strlen($tinMoiNhat->tomTat) < 190)
                            {{$tinMoiNhat->tomTat }}
                            @else
                            {{ substr($tinMoiNhat->tomTat,0,197).' ...' }}
                            @endif
                            <p style="margin-top:5px;"><a href="" class="text-success text-decoration-none"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i> Tin mới</a></p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @foreach ($tinmoi as $tinMoi)
            <div class="card" title="{{$tinMoi->tieuDe}}" style="margin-bottom: 3px;padding-bottom: 5px;">
                <div class="card-box">
                    <a href="home/chitiet/{{ $tinMoi->id }}/{{ $tinMoi->tieuDe }}" class="text-decoration-none"><i class="fa fa-angle-double-right" aria-hidden="true"></i>
                        <?php
                            $tieude = $tinMoi->tieuDe;
                            if(strlen($tieude) < 80){
                                echo $tieude;
                            }else{
                                echo substr($tieude,0,80).'...';
                            }
                        ?>

                        {{-- @if (strlen($tinMoi->tieuDe) < 80)
                        {{$tinMoi->tieuDe }}
                        @else
                        {{ substr($tinMoi->tieuDe,0,80).' ...' }}
                        @endif --}}
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="row"  style="margin:0px; margin-top:5px;">
        @foreach ($theloai as $theLoai)
        <?php
            $loaitin = DB::table('loaitin')->where('idTheLoai',$theLoai->id)->limit(1)->get();
        ?>
            @foreach ($loaitin as $loaiTin)
            <?php
                $tintuc = DB::table('tintuc')->where('idLoaiTin',$loaiTin->id)->orderBy('created_at', 'DESC')->limit(1)->get();
                $tintuc1 = DB::table('tintuc')->where('idLoaiTin',$loaiTin->id)->orderBy('created_at', 'DESC')->skip(1)->limit(5)->get();
            ?>
                <div class="col-6" style="padding-bottom: 10px;">
                    <h5 class="text-success font-weight-bold"><span class="rounded" style="background-color:rgb(202, 195, 195);"><i class="fa fa-odnoklassniki-square" aria-hidden="true"> </i>{!! ' '.$theLoai->tenTheLoai.' ' !!}<i class="fa fa-long-arrow-right" aria-hidden="true"></i>{{ ' '.$loaiTin->tenLoaiTin }}</span></h5>
                    @foreach ($tintuc as $tinTuc)
                        <div class="card" title="{{$tinTuc->tieuDe}}" style="margin-bottom: 5px; padding-bottom: 5px;">
                            <div class="card-box">
                                <a href="home/chitiet/{{ $tinTuc->id }}/{{ $tinTuc->tieuDe }}" class="text-decoration-none" style=""><i class="fa fa-caret-square-o-up text-success" aria-hidden="true"> </i><span class="font-weight-bold ">{{' '.$tinTuc->tieuDe}}</span></a>
                            </div>
                            <div class="card-img" style="margin-top: 5px;">
                                <div class="row">
                                    <div class="col-4 col-md-5" style="margin-top: 5px;">
                                        <img src="{{asset('backend/uploadTinTuc/'.$tinTuc->hinhAnh)}}" class="img-fluid img-thumbnail" alt="Mobirise" title="" media-simple="true">
                                    </div>
                                    <div class="col-8 col-md-7">
                                        @if (strlen($tinTuc->tomTat) < 190)
                                        {{$tinTuc->tomTat }}
                                        @else
                                        {{ substr($tinTuc->tomTat,0,197).' ...' }}
                                        @endif
                                        <p style="margin-top:5px;"><a href="" class="text-success text-decoration-none"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i> {!!$loaiTin->tenLoaiTin!!}</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @foreach ($tintuc1 as $tinTuc1)
                        <div class="card" title="{{$tinTuc1->tieuDe}}" style="margin-bottom: 3px;padding-bottom: 5px;">
                            <div class="card-box">
                                <a href="home/chitiet/{{ $tinTuc1->id }}/{{ $tinTuc1->tieuDe }}" class="text-decoration-none"><i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                    <?php
                                        $tieude = $tinTuc1->tieuDe;
                                        if(strlen($tieude) < 80){
                                            echo $tieude;
                                        }else{
                                            echo substr($tieude,0,80).'...';
                                        }
                                    ?>

                                    {{-- @if (strlen($tinTuc1->tieuDe) < 80)
                                    {{$tinTuc1->tieuDe }}
                                    @else
                                    {{ substr($tinTuc1->tieuDe,0,80).' ...' }}
                                    @endif --}}
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        @endforeach
    </div>
</div>
    <style>
        .card a{
            color: black;
        }
        .card a:hover{
            color: green;
        }
    </style>
@endsection