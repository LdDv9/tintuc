<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Http\Requests\SlideRequest;


class SlideController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $slide = Slide::all();
        return view('admin.slide.danhsach',compact('slide'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('admin.slide.them');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SlideRequest $request){
        $slide = new Slide;
        $slide->Ten = $request->txtName;
        $slide->NoiDung = $request->txtNoiDung;
        $slide->link=$request->txtLink;
        if($request ->hasFile('fileHinh')) {
            $fileHinh = $request ->fileHinh;
            $duoi = $fileHinh->getClientOriginalExtension();
            if ($duoi == 'jpg' || $duoi == 'png' || $duoi =='jpeg') {
                $name = $fileHinh -> getClientOriginalName();
                $Hinh = str_random(4).'_'.$name;
                while (file_exists(asset('upload/slide'.'_'.$Hinh))) {
                    $Hinh = str_random(4).'_'.$name;
                }
                $fileHinh->move('upload/slide',$Hinh);
                $slide->Hinh = $Hinh;
            }else{
                $error = 'File Hình Ảnh Chỉ Được ở Dạng : jpg,png,jpeg';

                //array_unshift($errors,)
                return redirect('admin/slide/create')->with('error',$error);
            }
            $slide -> save();
            return redirect('admin/slide/create')->withSuccess('Thêm Hình Ảnh Slide Thành Công');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $slide = Slide::find($id);        
        return view('admin.slide.sua',compact('slide'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SlideRequest $request, $id){
        $slide = Slide::find($id);
        $slide->Ten = $request->txtName;
        $slide->NoiDung = $request->txtNoiDung;
        $slide->link=$request->txtLink;
        if($request ->hasFile('fileHinh')) {
            $fileHinh = $request ->fileHinh;
            $duoi = $fileHinh->getClientOriginalExtension();
            if ($duoi == 'jpg' || $duoi == 'png' || $duoi =='jpeg') {
                $name = $fileHinh -> getClientOriginalName();
                $Hinh = str_random(4).'_'.$name;
                while (file_exists(asset('upload/slide'.'_'.$Hinh))) {
                    $Hinh = str_random(4).'_'.$name;
                }
                $fileHinh->move('upload/slide',$Hinh);
                $slide->Hinh = $Hinh;
            }else{
                $error = 'File Hình Ảnh Chỉ Được ở Dạng : jpg,png,jpeg';
                //array_unshift($errors,)
                return redirect('admin/slide/'.$id.'/edit')->with('error',$error);
            }
            $slide -> update();
                return redirect('admin/slide/'.$id.'/edit')->withSuccess('Sửa Thành Công');
        }      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $slide = Slide::find($id);
        $slide ->delete();
        return redirect('admin/slide')->withSuccess('Xóa Thành Công');
    }
}