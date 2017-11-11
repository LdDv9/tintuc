@extends('admin.layouts.index')

@section('content')
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thể Loại
                            <small>{{ $theloai->Ten }}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="{{ action('TheLoaiController@update',$id) }}" method="POST">
                            {{ csrf_field() }}
                            {{  method_field('PUT') }}
                            @include('notis.success')
                            @include('notis.errors')
                            <div class="form-group">
                                <label>Tên Mới</label>
                                <input class="form-control" name="txtName" placeholder="Nhập Tên Muốn Thay Thế" />
                            </div>
                            
                            <button type="submit" class="btn btn-default">Sửa Thể Loại</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
 </div>
@endsection