@extends('admin.layouts.index')

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tin Tức
                        <small>Thêm</small>
                    </h1>
                </div>
                
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="{{ action('TinTucController@store') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @include('notis.success')
                        @include('notis.errors')
                        <div class="form-group">
                            <label>Tiêu Đề</label>
                            <input class="form-control" name="txtTieuDe" placeholder="Nhập Tiêu Đề"/>
                        </div>
                        <div class="form-group">
                            <label>Thể Loại</label>
                            <select id="theloai" name="theloai" class="form-control">
                                @foreach($theloai as $list)
                                    <option value="{{ $list->id }}">{{ $list->Ten }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Loại Tin</label>
                            <select id="loaitin" name="loaitin" class="form-control">
                                @foreach($loaitin as $list)
                                    <option value="{{ $list->id }}">{{ $list->Ten }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tóm Tắt</label>
                            <textarea name="txtTomTat" id="demo" class="form-control "></textarea>
                        </div>
                        <div class="form-group">
                            <label>Nội Dung</label>
                            <textarea name="txtNoiDung" id="demo" class="form-control ckeditor"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Hình Ảnh</label>
                            <input class="form-control" type="file" name="fileHinh">
                        </div>
                        <div class="form-group">
                            <label>Nổi Bật</label>
                            <label class="radio-inline">
                                <input name="rdoNoiBat" value="1" checked="" type="radio">Có
                            </label>
                            <label class="radio-inline">
                                <input name="rdoNoiBat" value="0" type="radio">Không
                            </label>
                        </div>
                        <button type="submit" class="btn btn-default">Thêm Tin Tức</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection

@section('script')
    <script type="text/javascript">

        $(document).ready(function () {
            $('#theloai').change(function () {
                var idTheloai = $(this).val();
                //alert(idTheLoai);
                $.get("ajax/loaitin/" + idTheloai, function (data) {
                    //alert(data);
                    $('#loaitin').html(data);
                });
            });
        });
    
    </script>
@endsection



