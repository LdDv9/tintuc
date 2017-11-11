@extends('admin.layouts.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Slide
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
                                <th>Tên</th>
                                <th>Hình</th>
                                <th>Nội Dung</th>
                                <th>Link</th>
                                <th>Xóa</th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($slide as $list)                            
                            <tr class="even gradeC" align="center">
                                <td>{{ $list->id }}</td>
                                <td>{{ $list->Ten }}</td>
                                <td><img height="100px" width="200px" src="{{ asset('upload/slide/'.$list->Hinh) }}" alt=""></td>
                                <td>{{ $list->NoiDung }}</td>
                                <td>{{ $list->link }}</td>                                
                                <td class="center">
                                     <form action="{{ action('SlideController@destroy',$list->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                         <button type="submit" class="btn">
                                            <i class="fa fa-trash-o  fa-fw"></i>
                                         </button>
                                    </form>
                                </td>
                                <td class="center">
                                    <a href="{{ url('admin/slide/'.$list->id.'/edit') }}">
                                        <i class="fa fa-pencil fa-fw"></i> 
                                    </a>
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
