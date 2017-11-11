@extends('layouts.index')
@section('title')
Thông Tin Người Dùng
@endsection
@section('content')
    <!-- Page Content -->
    <div class="container">

    	<!-- slider -->
    	<div class="row carousel-holder">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
				  	<div class="panel-heading">Thông tin tài khoản</div>
				  	<div class="panel-body">
				    	<form action="{{ route('suanguoidung',Auth::user()->id)}}" method="POST">
				    		{{ csrf_field() }}
				    		@include('notis.errors')
				    		@include('notis.success')
				    		<div>	
				    			<label>Họ tên</label>
							  	<input type="text" class="form-control" placeholder="Username" name="txtName" aria-describedby="basic-addon1" value="{{ Auth::user()->name }}">
							</div>
							<br>
							<div>
				    			<label>Email</label>
							  	<input type="email" class="form-control" placeholder="Email" name="txtEmail" aria-describedby="basic-addon1"  value="{{ Auth::user()->email }}">
							</div>
							<br>	
							<div>
								<input id="ChangePassword" type="checkbox" class="" name="ChangePassword">
				    			<label>Đổi mật khẩu</label>
							  	<input type="password" class="form-control" name="txtPassword" aria-describedby="basic-addon1" disabled>
							</div>
							<br>
							<div>
				    			<label>Nhập lại mật khẩu</label>
							  	<input type="password" class="form-control" name="txtRePassword" aria-describedby="basic-addon1" disabled>
							</div>
							<br>
							<button type="submit" class="btn btn-default">Sửa</button>
				    	</form>
				  	</div>
				</div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
        <!-- end slide -->
    </div>
    <!-- end Page Content -->
@endsection

@section('script')
	<script type="text/javascript">
		$(document).ready(function() {
			$('#ChangePassword').change(function(){
				if ($(this).is(":checked")){
					$("input[type='password']").removeAttr('disabled');
				}else{
					$("input[type='password']").attr('disabled','');
				}
			});
		});
	</script>
@endsection

