@extends('admin.layouts.index')

@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Hình Ảnh Slide
                            <small>Thêm</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="{{ action('SlideController@store') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @include('notis.success')
                            @include('notis.errors')
                            <div class="form-group">
                                <label>Tên</label>
                                <input class="form-control" name="txtName" placeholder="Nhập Tên Ảnh" />
                            </div>
                            <div class="form-group">
                                <label>Nội Dung</label>
                                <textarea style="height: 100px;" name="txtNoiDung" class="form-control" placeholder="Nhập Nội Dung Ảnh"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Hình Ảnh</label>
                                <input  type="file" class="form-control" name="fileHinh">
                            </div>
                            <div class="form-group">
                                <label>Link</label>
                                <input class="form-control" name="txtLink" placeholder="Nhập Link" />
                            </div>
                            
                            <button type="submit" class="btn btn-default">Thêm Hình Ảnh Slide</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
</div>
@endsection