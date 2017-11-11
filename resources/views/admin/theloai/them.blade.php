@extends('admin.layouts.index')

@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thể Loại
                            <small>Thêm</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="{{ action('TheLoaiController@store') }}" method="POST">
                            @include('notis.success')
                            @include('notis.errors')
                            {{csrf_field()}}
                            <div class="form-group">
                                <label>Tên Thể Loại</label>
                                <input class="form-control"  name="txtName" placeholder="Nhập Tên Thể Loại" />
                            </div>                            
                            
                            <button type="submit" class="btn btn-default">Thêm Thể Loại</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
</div>
@endsection