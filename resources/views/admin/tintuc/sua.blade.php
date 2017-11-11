@extends('admin.layouts.index')

@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header" id="{{ $tintuc->id }}">Sửa Tin Tức
                            <small>{{ $tintuc->TieuDe }}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="{{ action('TinTucController@update',$tintuc->id) }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            @include('notis.success')
                            @include('notis.errors')
                            <div class="form-group">
                                <label>Tiêu Đề Mới</label>
                                <input class="form-control" name="txtTieuDe" placeholder="{{ 'Cũ :'.$tintuc->TieuDe }}"  />
                            </div>
                            <div class="form-group">
                                <label>Thể Loại Mới( Cũ : {{ $tintuc->loaitin->theloai->Ten }} )</label>
                                <select id="theloai" name="theloai" class="form-control">
                                    @foreach($theloai as $list)
                                    <option value="{{ $list->id }}">{{ $list->Ten }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Loại Tin Mới( Cũ : {{ $tintuc->loaitin->Ten }} )</label>
                                <select id="loaitin" name="loaitin" class="form-control">
                                    @foreach($loaitin as $list)
                                    <option value="{{ $list->id }}">{{ $list->Ten }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tóm Tắt Mới</label>
                                <textarea style="height: 100px;" name="txtTomTat"  class="form-control " >Cũ : {{ $tintuc->TomTat}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Nội Dung Mới</label>
                                <textarea name="txtNoiDung" id="demo" class="form-control ckeditor" >Cũ : {!! $tintuc->NoiDung !!}</textarea>
                            </div>
                             <div class="form-group">
                                <label>Hình Ảnh Cũ</label>
                                <img class="img-responsive" src="{{ asset('upload/tintuc/'.$tintuc->Hinh) }}" height="25%" width="25%" >                         
                            </div>  
                            <div class="form-group">
                                <label>Hình Ảnh Mới</label>
                                <input class="form-control" type="file" name="fileHinh">                         
                            </div>                            
                            <div class="form-group">
                                <label>Nổi Bật Mới:</label>
                                <label class="radio-inline">
                                    <input name="rdoNoiBat" value="1" checked="" type="radio">Có 
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoNoiBat" value="0" type="radio">Không
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Sửa Tin Tức Tin Tức</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        </form>
                    </div>
                    <div class="col-md-12">
                       
                        <h2>Danh Sách Comment</h2>
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Người Dùng</th>
                                    <th>Nội Dung</th>
                                    <th>Ngày Đăng</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tintuc->comment as $list)                                
                                <tr>
                                    <td>{{ $list->id }}</td>
                                    <td>{{ $list->user->name }}</td>
                                    <td>{{ $list->NoiDung }}</td>
                                    <td>{{ $list->created_at }}</td>
                                    <td>
                                        <form action="{{ action('CommentController@destroy',$list->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}                              
                                         <button type="submit" class="btn">
                                            <i class="fa fa-trash-o  fa-fw"></i>
                                         </button>
                                       
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
</div>
@endsection

@section('script')
<script type="text/javascript">
    
    $(document).ready(function() {
       $('#theloai').change(function(){
            var idTheloai = $(this).val();
            //var id = ('h1')
            //alert(idTheLoai);
            $.get("/ajax/loaitin/"+idTheloai,function(data){
                //alert(data);
                $('#loaitin').html(data);
            });
       });
    }); 
</script>
@endsection



