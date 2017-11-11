@extends('admin.layouts.index')

@section('content')
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sửa User
                            <small>{{ $user->name }}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="{{ action('UserController@update',$user->id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            @include('notis.success')
                            @include('notis.errors')
                            <div class="form-group">
                                <label>Họ Tên</label>
                                <input class="form-control" name="txtName" placeholder="Nhập Họ Tên Người Dùng Mới" />
                            </div>
                            <div class="form-group">
                                <label>Địa Chỉ Email</label>
                                <input class="form-control" name="txtEmail" placeholder="Nhập Địa Chỉ Email Mới" />
                            </div>
                            <div class="form-group">
                                <label>Mật Khẩu</label>
                                <input class="form-control" type="password"  name="txtPassword" placeholder="Nhập Mật Khẩu Mới" />
                            </div>
                             <div class="form-group">
                                <label>Nhập Lại Mật Khẩu</label>
                                <input class="form-control"  type="password" name="txtRePassword" placeholder="Nhập Lại Mật Khẩu Mới" />
                            </div>
                          
                            <div class="form-group">
                                <label>Quyền Người Dùng Mới :</label>
                                <label class="radio-inline">
                                    <input name="rdoQuyen" value="0" checked="" type="radio">Người Dùng Thường
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoQuyen" value="1" type="radio">Admin
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Thêm Người Dùng</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
 </div>
@endsection