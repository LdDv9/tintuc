<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Comment;
use App\Http\Requests\UserRequest;
use App\Http\Requests\DangNhapRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $user = User::all();
        return view('admin.user.danhsach',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('admin.user.them');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request){
        $user = new User;
        $user ->name = $request->txtName;
        $user ->email = $request->txtEmail;
        $user ->password= bcrypt($request->txtPassword);
        $user ->quyen = $request->rdoQuyen;   
        $user->save();
        return redirect('admin/user/create')->withSuccess('Thêm Người Dùng Thành Công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        // if (Auth::check()) {
        //     return view('pages.nguoidung');    
        // }else{
        //     return redirect('/');
        // }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){

        $user = User::find($id);
        return view('admin.user.sua',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id){


        $user = User::find($id);
        $user ->name = $request->txtName;
        $user ->email = $request->txtEmail;
        $user ->password= bcrypt($request->txtPassword);
        $user ->quyen = $request->rdoQuyen;
        $user->update();
        return redirect('admin/user/'.$id.'/edit')->withSuccess('Sửa Thành Công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
       
        $comment_user =Comment::where('idUser',$id)->get();
        foreach ($comment_user as $key => $value) {
            $value->delete();
        }
        $user = User::find($id);
        $user->delete();
        return redirect('admin/user')->withSuccess('Xóa Thành Công');
    }

    //login logout admin
    public function getAdminDangNhap(Request $request){
        //return dd($request->path());
        return view('admin.login');
    }
    public function postAdminDangNhap(DangNhapRequest $request){
        //return $request->path();
        if (Auth::attempt(['email'=>$request->txtEmail,'password'=>$request->txtPassword])) {
            return redirect('admin/theloai')->withSuccess('Đăng Nhập Thành Công');
        }else{
            return redirect('admin/dangnhap')->with('error','Đăng Nhập Thất Bại Sai Địa Chỉ Email Hoặc Mật Khẩu');
        }
    }

    public function getAdminDangXuat(){
        Auth::logout();
        return redirect('admin/dangnhap')->withSuccess('Đăng Xuất Thành Công');   
    }
    // login logout nguowif dung
     public function getDangNhap(Request $request){
        return view('pages.dangnhap');
    }
    
    public function postDangNhap(DangNhapRequest $request){
        
        if (Auth::attempt(['email' => $request->txtEmail, 'password' => $request->txtPassword])) {
            return redirect('/');   
            
        }else{
            return redirect('dangnhap')->with('error','Đăng Nhập Thất Bại Sai Email Hoặc Mật Khẩu');   
        }
    }
    public function getDangXuat(){
        Auth::logout();
        return redirect('/');
    }
}
