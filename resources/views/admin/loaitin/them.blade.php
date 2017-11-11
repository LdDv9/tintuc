@extends('admin.layouts.index')

@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Loại Tin
                            <small>Thêm</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="{{ action('LoaiTinController@store') }}" method="POST">
                            {{ csrf_field() }}
                            @include('notis.success')
                            @include('notis.errors')
                            <div class="form-group">
                                <label>Tên Loại Tin</label>
                                <input class="form-control" name="txtName" placeholder="Nhập Tên Loại Tin" />
                            </div>
                            <div class="form-group">
                                <label>Chọn Thể Loại</label>
                                <select class="form-control" name="theloai">
                                    @foreach($theloai as $list)
                                    <option value="{{ $list->id }}">{{ $list->Ten }}</option>
                                    @endforeach
                                </select>
                            </div>                            
                           
                            <button type="submit" class="btn btn-default">Thêm Loại Tin</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
</div>
@endsection