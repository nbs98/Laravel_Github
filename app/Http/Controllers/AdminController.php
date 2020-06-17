<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class AdminController extends Controller
{

    public function getListAccount(){
        return view('admin.user.listAccount');
    }
    public function getDashBroad(){
        if(Auth::check()){
            $demTheLoai = DB::table('theloai')->get()->count();
            $demLoaiTin = DB::table('loaitin')->get()->count();
            $demTinTuc = DB::table('tintuc')->get()->count();
            $demComment = DB::table('comment')->get()->count();
            return view('admin.other.dashbroad',['demtheloai' => $demTheLoai,'demloaitin' => $demLoaiTin,'demtintuc' => $demTinTuc,'demcomment' => $demComment]);
        }
        else{
            echo "<script>alert('Bạn phải đăng nhập!!!')</script>";
            return view('user.login');
        }
    }
}
