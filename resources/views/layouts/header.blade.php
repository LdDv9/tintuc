
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>

                </button>
                <a class=" navbar-brand" href="{{ url("/") }}">Trang Chủ</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{ url('/lienhe') }}">Liên hệ</a>
                    </li>
                </ul>

                <form action="{{ route('timkiem') }}" method="get" class="navbar-form navbar-left" role="search">
			        <div class="form-group">
			          <input type="text" class="form-control" placeholder="Search" name="Search">
			        </div>
			        <button type="submit" class="btn btn-default">Tìm Kiếm </button>
			    </form>
			    <ul class="nav navbar-nav pull-right">
                    @if(!Auth::check())
                    <li>
                        <a href="{{ url('dangky') }}">Đăng ký</a>
                    </li>
                    <li>
                        <a href="{{ url('dangnhap') }}">Đăng nhập</a>
                    </li>
                    @else                    
                    <li>
                    	<a href="{{ url('thongtin/'.Auth::user()->id) }}">
                    		<span class ="glyphicon glyphicon-user"></span>
                    		{{ Auth::user()->name }}
                    	</a>
                    </li>
                    <li>
                    	<a href="{{ route('dangxuat') }}">Đăng xuất</a>
                    </li>
                    @endif
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
