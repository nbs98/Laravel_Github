<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Auth;
use App\User;
use DB;
use Hash;
use App\tintuc;
use App\theloai;


class HomeController extends Controller
{
    public function getIndex(){
        $tinNoiBat = DB::table('tintuc')->orderBy('soLuotXem', 'DESC')->join('loaitin','tintuc.idLoaiTin','=','loaitin.id')->limit(1)->get();
        $tinNoiBat2 = DB::table('tintuc')->orderBy('soLuotXem', 'DESC')->skip(1)->limit(5)->get();
        $tinMoiNhat = DB::table('tintuc')->orderBy('created_at', 'DESC')->limit(1)->get();
        $tinMoi = DB::table('tintuc')->orderBy('created_at', 'DESC')->skip(1)->limit(5)->get();
        $theloai = DB::table('theloai')->limit(4)->get();
        
        return view('home.home',['tinnoibat' => $tinNoiBat,'theloai' => $theloai,'tinnoibat2' => $tinNoiBat2,'tinmoinhat' => $tinMoiNhat,'tinmoi' => $tinMoi]);
    }
    public function getAbout(){
        return view('about');
    }
    public function getlogin(){
        return view('home.user.login');
    }
    public function getRegis(){
        return view('home.user.regis');
    }
    public function getInfo(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('home.user.info',['user' => $user]);
    }
    public function getLogout(){
        Auth::logout();
        return redirect()->route('home.get.index');
    }
    public function postLogin(Request $request){
        $username = $request->username;
        $password = $request->password;
        if(Auth::attempt(['username' => $username, 'password' => $password])){
            $request->session()->flash('logged', 'Bạn đã đăng nhập thành công với tài khoản '.strtoupper($username));
            return redirect()->route('home.get.index');
        }else{
            $request->session()->flash('error', 'Tài khoản hoặc mật khẩu không đúng!');
            return back();
        }
    }
    public function postRegis(Request $request){
        $request->validate([
            'email' => 'email',
            'username' => 'max:30|min:4',
            'avatar' =>'required',
            'password'=>'min:4',
            're-password' =>'same:password'
        ],[
            'email.email' => 'Email không đúng định dạng!',
            'username.min' => 'Tài khoản phải lớn hơn 4 kí tự!',
            'username.max' => 'Tài khoản không được quá 30 kí tự!',
            'avatar.required' => 'Bạn chưa chọn Avatar!',
            'password.min' => 'Mật khẩu phải lớn hơn 4 ký tự!',
            're-password.same' => 'Mật khẩu nhập lại không khớp!',
        ]);
        $username = $request->username;
        $users = DB::table('users')->pluck('username')->toArray();
        if(in_array($username,$users)){
            $request->session()->flash('error', 'Tài khoản đã tồn tại trong hệ thống.');
            return redirect()->back()->withInput();
        }else{
            if($request->hasFile('avatar')){
                $avatar_name = uniqid().$request->avatar->getClientOriginalName();
                $request->file('avatar')->move('frontend/avatar/',$avatar_name);
                // echo $avatar_name;
            }
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->username = $request->username;
            $user->password = bcrypt($request->password);
            $user->level = '3';
            $user->avatar = $avatar_name;
            $user->save();
            $request->session()->flash('success', 'Đăng ký tài khoản thành công.');
            return redirect()->back();
        }            
    }
    public function postInfo(Request $request){
        $users = Auth::user();
        $id = $users['id'];
        $password = $users['password'];
        if(isset($_POST['updateAvatar'])){
            $avatar = $users['avatar'];
            $request->validate([
                'edit_avatar' =>'required',
            ],[
                'edit_avatar.required' => 'Bạn chưa chọn Avatar!',
            ]);
            if($request->hasFile('edit_avatar')){
                $edit_avatar =  uniqid().$request->file('edit_avatar')->getClientOriginalName();
                $request->file('edit_avatar')->move('frontend/avatar/',$edit_avatar);
                unlink("./frontend/avatar/".$avatar);
                DB::table('users')->where('id',$id)->update(['avatar' => $edit_avatar]);
                $request->session()->flash('success', 'Cập nhật hình ảnh thành công');
                return redirect()->back();
            }else{
                echo 'Chả hiểu sao lỗi nhỉ?';
            }
        }elseif(isset($_POST['updateInfo'])){
            $edit_name = $request->edit_name;
            $edit_email = $request->edit_email;
            DB::table('users')->where('id',$id)->update(['name' => $edit_name, 'email'=> $edit_email]);
            $request->session()->flash('success', 'Cập nhật thông tin cá nhân thành công');
            return redirect()->back();
        }elseif(isset($_POST['chagePassword'])){
            $request->validate([
                'new_password'=>'min:4|max:30',
                're_new_password' =>'same:new_password'
            ],[
                'new_password.min' => 'Mật khẩu mới phải lớn hơn 4 kí tự!',
                'new_password.max' => 'Mật khẩu mới không được quá 30 kí tự!',
                're_new_password.same' => 'Mật khẩu nhập lại không khớp!',
            ]);
            $old_password = $request->old_password;
            $new_password = bcrypt($request->new_password);
            if(Hash::check($old_password, $password)){
                DB::table('users')->where('id',$id)->update(['password' => $new_password]);
                return '<script>alert("Đổi mật khẩu thành công");</script>'.redirect()->back();
            }else{
                return '<script>alert("Mật khẩu cũ không chính xác");</script>'.redirect()->back();
            }
        }
    }
    public function getChiTiet($id){
        $tin = DB::table('tintuc')->where('id',$id)->get();
        return view('home.chitiet',['tinTuc' => $tin]);
    }
}