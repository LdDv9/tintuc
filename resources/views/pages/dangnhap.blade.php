@extends('layouts.index')

@section('title')
Đăng Nhập
@endsection

@section('content')
<!-- Page Content -->
<div class="container">

	<!-- slider -->
	<div class="row carousel-holder">
		<div class="col-md-4"></div>
        <div class="col-md-4">

            <div class="panel panel-default">
			  	<div class="panel-heading">Đăng nhập</div>
			  	@include('notis.errors')

			  	<div class="panel-body">
			    	<div class="panel-body">
                        @if(!Auth::check())
                        <form role="form" action="{{ route('dangnhap') }}" method="POST">
                            {{ csrf_field() }}
                            <fieldset>
                                <div class="form-group">
                                    <input id="txtEmail" class="form-control" placeholder="Nhập E-mail" name="txtEmail" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Nhập Mật Khẩu" name="txtPassword" type="password" value="">
                                </div>
                                <button id="txtPassword" type="submit" class="btn btn-lg btn-success btn-block">Đăng Nhập</button>
                            </fieldset>
                        </form>
                        @else
                        <h3>Bạn Đã Đăng Nhập Nhấn Vào <a href="{{ url('/') }}">Đây</a> Để Về Trang Chủ</h3>
                        @endif
                    </div>
			  	</div>
			</div>
        </div>
        <div class="col-md-4"></div>
    </div>
    <!-- end slide -->
</div>
<!-- end Page Content -->
@endsection