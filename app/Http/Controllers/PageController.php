<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DangNhapRequest;
use App\Http\Requests\EditUserRequest;
use App\Http\Requests\DangKyRequest;
use App\Http\Requests\CommentRequest;
use Illuminate\Support\Facades\Auth;

use DB;
use App\TheLoai;
use App\Slide;
use App\LoaiTin;
use App\TinTuc;
use App\User;
use App\Comment;
class PageController extends Controller
{
    function __construct(){
    	$theloai = TheLoai::all();	
    	$slide = Slide::all();
    	view()->share('theloai',$theloai);
    	view()->share('slide',$slide);
    }

    public function TrangChu(){
    	//$theloai = TheLoai::all();
    	return view('pages.trangchu');
    }
    public function LienHe(){
    	//$theloai = TheLoai::all();
    	return view('pages.lienhe');
    }
    public function LoaiTin($id){
    	$loaitin = LoaiTin::find($id);
    	$tintuc = TinTuc::where('idLoaiTin',$id)->paginate(5);
    	return view('pages.loaitin',compact('loaitin','tintuc'));
    }
    public function TinTuc($id){
    	$tintuc = TinTuc::find($id);
        $comment = $tintuc->comment->sortByDesc('created_at')->all();
    	$tinnoibat = TinTuc::where('NoiBat',1)->take(4)->get();
    	$tinlienquan = TinTuc::where('idLoaiTin',$id)->take(4)->get();
    	return view('pages.tintuc',compact('tintuc','tinnoibat','tinlienquan','comment'));
    }
    // Thong Tin Nguoi Dung
    public function getThongTin(){
        if (Auth::check()) {
            return view('pages.nguoidung');
        }else{
            return redirect('/');
        }        
    }

    public function postThongTin(EditUserRequest $request,$id){
        $user = User::find($id);
        $user->name = $request->txtName;
        $user->email=$request->txtEmail;
        if ($request->ChangePassword == 'on') {
            $this->validate($request,[
                'txtPassword'=>'required|min:6|max:20',
                'txtRePassword'=>'required|same:txtPassword',

            ],[
                'txtPassword.required'=>'Chưa Nhập Mật Khẩu',
                'txtPassword.min'=>'Mật Khẩu Phải Chứa Ít Nhất 6 Ký Tự',
                'txtPassword.max'=>'Mật Khẩu Chỉ Chứa Nhiều Nhất 20 Ký Tự',

                'txtRePassword.required'=>'Chưa Lại Mật Khẩu',
                'txtRePassword.same'=>'Mật Khẩu Nhập Lại Không Khớp Với Mật Khẩu Ban Đầu'
            ]);
            $user ->password= bcrypt($request ->txtRePassword);
        }
        $user ->update();
        return redirect('thongtin/'.$id)->withSuccess('Thay Đổi Thông Tin Người Dùng Thành Công');
    }

    //dang ky nguoi dung
    public function getDangKy(){
        return view('pages.dangky');
    }
    public function postDangKy(DangKyRequest $request){
        $user = new User();
        $user->name = $request->txtName;
        $user->email = $request->txtEmail;
        $user ->password = bcrypt($request->txtRePassword);
        $user ->quyen = 0;
        $user ->save();
        return redirect('dangky')->withSuccess('Đăng Ký Thành Công');
    }
    // comment
    public function postComment(CommentRequest $request){
        $comment = new Comment();
        $tintuc = TinTuc::find($request->idTinTuc);
        $comment ->idUser = $request ->idUser;
        $comment ->idTinTuc = $request ->idTinTuc;
        $comment ->NoiDung = $request ->txtNoiDung;
        $comment ->save();
        return redirect('tintuc/'.$tintuc->id.'/'.$tintuc->TieuDeKhongDau.'.html');
    }
    //tim kiem
    public function TimKiem(Request $request){
        $tukhoa = $request ->Search;

        $tintuc = TinTuc::where('TieuDe','like',"%$tukhoa%")->orWhere('TomTat','like',"%$tukhoa%")->paginate(8);
        return view('pages.timkiem',compact('tukhoa','tintuc'));
    }
}
