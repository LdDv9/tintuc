@extends('admin.layouts.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>Danh Sách</small>
                        </h1>
                    </div>
                    <div class="col-md-12">
                        @include('notis.success')
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Email</th>
                                <th>Quyền</th>
                                
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user as $list)
                            <tr class="odd gradeX" align="center">
                                <td>{{ $list->id }}</td>
                                <td>{{ $list->name }}</td>
                                <td>{{ $list->email }}</td>
                                <td>
                                    @if($list->quyen==1)
                                    Admin
                                    @else
                                    Người Dùng
                                    @endif
                                </td>
                                
                                <td class="center">
                                    <form action="{{ action('UserController@destroy',$list->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                         <button type="submit" class="btn">
                                            <i class="fa fa-trash-o  fa-fw"></i>
                                         </button>
                                    </form>
                                </td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ url('admin/user/'.$list->id.'/edit') }}">Sửa</a></td>
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
