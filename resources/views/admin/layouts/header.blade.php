<nav class="navbar navbar-default navbar-static-top text-danger" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <p class="navbar-brand text-danger lead" >Admin - {{ Auth::user()->name }}</p>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    @if(Auth::check())
                    <ul class="dropdown-menu dropdown-user">
                        
                        <li><a href="{{ url('admin/user/'.Auth::user()->id.'/edit') }}"><i class="fa fa-gear fa-fw"></i> Thay Đổi Thông Tin Người Dùng</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{{ route('admin.dangxuat') }}"><i class="fa fa-sign-out fa-fw"></i> Đăng Xuất</a>
                        </li>
                    </ul>
                    @endif
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
            
           @include('admin.layouts.menu')
            <!-- /.navbar-static-side -->

</nav>