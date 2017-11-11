<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
use App\Http\Requests\TheLoaiRequest;



class TheLoaiController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $theloais = TheLoai::all();
        return view('admin.theloai.danhsach',compact('theloais'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.theloai.them');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TheLoaiRequest $request)
    {
        $Table_The_Loai = new TheLoai;

        $Table_The_Loai ->Ten = $request->txtName;
        $Table_The_Loai ->TenKhongDau = changeTitle($request->txtName);
        $Table_The_Loai -> save();        
        

        return redirect('admin/theloai/create')->withSuccess('Thêm Thành Công ');
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
        $theloai = TheLoai::find($id);
        return view('admin.theloai.sua')->with('id',$id)->with('theloai',$theloai);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TheLoaiRequest $request, $id)
    {
        
        $theloai = TheLoai::find($id);
        $theloai ->Ten = $request ->txtName;
        $theloai ->TenKhongDau=changeTitle($request->txtName);
        $theloai->save(); 
        return redirect('admin/theloai/'.$id.'/edit')->withSuccess('Sửa Thể Loại Thành Công');    
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $theloai = TheLoai::find($id);
        $theloai -> delete();
        return redirect('admin/theloai')->withSuccess('Đã Xóa Thể Loại');
    }
}
