<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TinTucRequest;
use App\TinTuc;
use App\LoaiTin;
use App\TheLoai;
use App\Comment;

class TinTucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tintuc = TinTuc::all();
        return view('admin.tintuc.danhsach',compact('tintuc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $theloai = TheLoai::all();
        $loaitin = LoaiTin::all(); 
        return view('admin.tintuc.them',compact('loaitin','theloai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TinTucRequest $request){
        $tintuc = new TinTuc;
        $tintuc ->TieuDe = $request->txtTieuDe;
        $tintuc ->TieuDeKhongDau = changeTitle($request->txtTieuDe);
        $tintuc ->TomTat= $request->txtTomTat;
        $tintuc ->NoiDung= $request->txtNoiDung;        
        $tintuc ->NoiBat = $request ->rdoNoiBat;
        $tintuc ->idLoaiTin = $request->loaitin;
        if ($request ->hasFile('fileHinh')) {
            $fileHinh = $request ->fileHinh;
            $duoi = $fileHinh->getClientOriginalExtension();
            if ($duoi == 'jpg' || $duoi == 'png' || $duoi =='jpeg') {
                $name = $fileHinh -> getClientOriginalName();
                $Hinh = str_random(4).'_'.$name;
                while (file_exists(asset('upload/tintuc'.'_'.$Hinh))) {
                    $Hinh = str_random(4).'_'.$name;
                }
                $fileHinh->move('upload/tintuc',$Hinh);
                $tintuc->Hinh = $Hinh;
            }else{
                $error = 'File Hình Ảnh Chỉ Được ở Dạng : jpg,png,jpeg';
                //array_unshift($errors,)
                return redirect('admin/tintuc/create')->with('error',$error);
            }
            $tintuc -> save();
            return redirect('admin/tintuc/create')->withSuccess('Thêm Thành Công');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $tintuc = TinTuc::find($id);
        $theloai = TheLoai::all();
        $loaitin = LoaiTin::all();
        return view('admin.tintuc.sua',compact('theloai','loaitin','tintuc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TinTucRequest $request, $id){
        $tintuc = TinTuc::find($id);
        $tintuc ->TieuDe = $request->txtTieuDe;
        $tintuc ->TieuDeKhongDau = changeTitle($request->txtTieuDe);
        $tintuc ->TomTat= $request->txtTomTat;
        $tintuc ->NoiDung= $request->txtNoiDung;        
        $tintuc ->NoiBat = $request ->rdoNoiBat;
        $tintuc ->idLoaiTin = $request->loaitin;
        if ($request ->hasFile('fileHinh')) {
            $fileHinh = $request ->fileHinh;
            $duoi = $fileHinh->getClientOriginalExtension();
            if ($duoi == 'jpg' || $duoi == 'png' || $duoi =='jpeg') {
                $name = $fileHinh -> getClientOriginalName();
                $Hinh = str_random(4).'_'.$name;
                while (file_exists(asset('upload/tintuc'.'_'.$Hinh))) {
                    $Hinh = str_random(4).'_'.$name;
                }
                $fileHinh->move('upload/tintuc',$Hinh);
                $tintuc->Hinh = $Hinh;
            }else{
                $error = 'File Hình Ảnh Chỉ Được ở Dạng : jpg,png,jpeg';
                //array_unshift($errors,)
                return redirect('admin/tintuc/'.$id.'/edit')->with('error',$error);
            }
            $tintuc -> update();
            return redirect('admin/tintuc/'.$id.'/edit')->withSuccess('Sửa Thành Công');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tintuc_comment = Comment::where('idTinTuc',$id)->get();
        foreach ($tintuc_comment as $key => $value) {
            $value -> delete();
        }
        $tintuc = TinTuc::find($id); 
        $tintuc ->delete();

        return redirect('admin/tintuc')->withSuccess('Xóa Thành Công');
    }
}
