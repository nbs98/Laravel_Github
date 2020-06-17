@extends('master')
@foreach ($tinTuc->all() as $tin)

@section('title',$tin->tieuDe)
@section('content')
    <div class="chiTietTin">
        <div class="cate">
            {{ $tin->tieuDe }}
        </div>
        <div class="noiDung">
            <table>
                {!! htmlspecialchars_decode(stripslashes($tin-> noiDung)) !!}
            </table>
        </div>
    </div>

@endsection
@endforeach
