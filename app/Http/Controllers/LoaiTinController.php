<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoaiTinRequest;
use App\LoaiTin;
use App\TheLoai;

class LoaiTinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loaitin = LoaiTin::all();
        return view('admin.loaitin.danhsach',compact('loaitin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $theloai = TheLoai::all();
        return view('admin.loaitin.them',compact('theloai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LoaiTinRequest $request)
    {
        $loaitin = new LoaiTin;
        $loaitin->Ten = $request->txtName;
        $loaitin->TenKhongDau = changeTitle($request->txtName);
        $loaitin->idTheLoai=$request->theloai;
        $loaitin->save();
        return redirect('admin/loaitin/create')->withSuccess('Thêm Thành Công');
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
    public function edit($id)
    {
        $loaitin = LoaiTin::find($id);
        $theloai = TheLoai::all();
        return view('admin.loaitin.sua',compact('id','loaitin','theloai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LoaiTinRequest $request, $id)
    {
        $loaitin =  LoaiTin::find($id);
        $loaitin ->Ten = $request ->txtName;
        $loaitin ->TenKhongDau=changeTitle($request->txtName);
        $loaitin ->idTheLoai = $request ->theloai;
        $loaitin->update();
        return redirect('admin/loaitin/'.$id.'/edit')->withSuccess('Sửa Thành Công ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $loaitin = LoaiTin::find($id);
        $loaitin->delete();
        return redirect('admin/loaitin')->withSuccess('Xóa Thành Công');
    }
}
