@extends('admin.layouts.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tin Tức
                            <small>Danh Sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-md-12">
                        @include('notis.success')
                    </div>
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tiêu Đề</th>                                
                                <th>Tóm Tắt</th>
                                <th>Nội Dung</th>
                                <th>Thể Loại</th>
                                <th>Loại Tin</th>
                                <th>Xem</th>
                                <th>Nổi Bật</th>
                                <th>Xóa</th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tintuc as $list)
                            <tr class="odd gradeX" align="center">
                                <td>{{ $list->id }}</td>
                                <td>
                                    <p>{{ $list->TieuDe }}</p>
                                    <img height="100px" width="100px" src="{{ asset('upload/tintuc/'.$list->Hinh) }}" alt="anh cua tieu de">
                                </td>                                
                                <td>{{ $list->TomTat }}</td>
                                <td>{{ $list->NoiDung }}</td>
                                <td>{{ $list->loaitin->theloai->Ten}}</td>
                                <td>{{ $list->loaitin->Ten }}</td>
                                <td>{{ $list->SoLuotXem }}</td>
                                <td>
                                    @if($list->NoiBat == 0)
                                    Không
                                    @else
                                    Có
                                    @endif

                                </td>
                                <td class="center">
                                    <form action="{{ action('TinTucController@destroy',$list->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                         <button type="submit" class="btn">
                                            <i class="fa fa-trash-o  fa-fw"></i>
                                         </button>
                                    </form>                                        
                                </td>
                                <td class="center">
                                    <i class="fa fa-pencil fa-fw"></i> 
                                    <a href="{!! url('admin/tintuc/'.$list->id.'/edit') !!}">Sửa</a>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
</div>
@endsection
