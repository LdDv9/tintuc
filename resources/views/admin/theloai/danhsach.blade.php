@extends('admin.layouts.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thể Loại
                            <small>Danh Sách Thể Loại</small>
                        </h1>
                    </div>
                    <div class="col-md-12">
                        @include('notis.success')
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover text-danger" id="dataTables-example">

                        <thead>
                             
                            <tr align="center">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Tên Không Dấu</th>                                
                                <th>Xóa</th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($theloais as $list)
                            <tr class="odd gradeX" align="center">
                                <td>{{ $list->id }}</td>
                                <td>{{ $list->Ten }}</td>
                                <td>{{ $list->TenKhongDau }}</td>                               
                                <td class="center">
                                    <form action="{{ action('TheLoaiController@destroy',$list->id) }}" method="POST">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                   
                                         <button type="submit" class="btn">
                                            <i class="fa fa-trash-o  fa-fw"></i>
                                         </button>
                                    </form>
                                    
                                </td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ url('admin/theloai/'.$list->id.'/edit') }}">Sửa</a></td>
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
