<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\tintuc;
use Auth;
use App\theloai;
use App\loaitin;

class NewsController extends Controller
{
    public function getTinTuc(){
        $tinTuc = DB::table('tintuc')->get();
        return view('admin.news.tinTuc',['tinTuc'=>$tinTuc]);
    }
    public function getThemTin(){
        return view('admin.news.themtin');
    }
    public function postThemTin(Request $request){
        $user = Auth::user();
        $tacGia = $user['name'];
        if($request->hasFile('hinhAnh')){
            $hinhanh = uniqid().$request->hinhAnh->getClientOriginalName();
            $request->file('hinhAnh')->move('backend/uploadTinTuc/',$hinhanh);
        }
        $tin = new tintuc;
        $tin->idTheLoai = $request->theLoai;
        $tin->idLoaiTin = $request->loaiTin;
        $tin->tacGia = $tacGia;
        $tin->tieuDe = $request->tieuDe;
        $tin->tomTat = $request->tomTat;
        $tin->noiDung = $request->noiDung;
        $tin->hinhAnh = $hinhanh;
        $tin->tag = $request->tags;
        $tin->soLuotXem = '0';
        $tin->save();
        $request->session()->flash('success', 'Thêm tin thành công.');
            return redirect()->back();
    }
    public function loadSelect($idTheLoai){
        $loaiTin = DB::table('loaitin')->where('idTheLoai',$idTheLoai)->get();
        foreach($loaiTin as $lt){
            echo "<option value=".$lt->id.">".$lt->tenLoaiTin."</option>";
        }
    }
    public function getTheLoai(){
        $theloai = DB::table('theloai')->get();
        return view('admin.news.theloai',['theloai' => $theloai]);
    }
    public function postTheloai(Request $request){
        if(isset($_POST['btnThemTheLoai'])){
            $tenTheLoai = DB::table('theloai')->pluck('tenTheLoai')->toArray();
            if(in_array($request->txtTenTheLoai,$tenTheLoai)){
                $request->session()->flash('error', 'Tên thể loại này đã tồn tại trong hệ thống.');
                return redirect()->back()->withInput();
            }else{
                $tl = new theloai;
                $tl->tenTheLoai = $request->txtTenTheLoai;
                $tl->save();
                $request->session()->flash('success', 'Thêm thể loại thành công.');
                return redirect()->back();
            }
        }
        
    }
    public function getLoaiTin(){
        $loaitin = DB::table('loaitin')->orderby('tenLoaiTin')->get();
        $theloai = DB::table('theloai')->get();
        return view('admin.news.loaitin',['loaitin' => $loaitin,'theloai' => $theloai]);
    }
    public function postLoaiTin(Request $request){
        if(isset($_POST['btnThemLoaiTin'])){
            $tenLoaiTin = DB::table('loaitin')->pluck('tenLoaiTin')->toArray();
            if(in_array($request->txtTenLoaiTin,$tenLoaiTin)){
                $request->session()->flash('error', 'Loại tin này đã tồn tại trong hệ thống.');
                return redirect()->back()->withInput();
            }else{
                $lt = new loaitin;
                $lt->idTheLoai = $request->idTheLoai;
                $lt->tenLoaiTin = $request->txtTenLoaiTin;
                $lt->save();
                $request->session()->flash('success', 'Thêm loại tin thành công.');
                return redirect()->back();
            }
        }
    }
    public function deleteTL($id){
        DB::table('theloai')->where('id',$id)->delete();
        return redirect()->back()->with('success','Xóa thành công');
    }
    public function deleteLT($id){
        DB::table('loaitin')->where('id',$id)->delete();
        return redirect()->back()->with('success','Xóa thành công');
    }
    public function xoaTin($id){
        $tintuc= DB::table('tintuc')->where('id',$id)->get();
        foreach($tintuc as $tt){
            DB::table('tintuc')->where('id',$id)->delete();
            unlink("./backend/uploadTinTuc/".$tt->hinhAnh);
            return redirect()->back()->with('success','Xóa thành công');
        }
        
        
        
    }
}
