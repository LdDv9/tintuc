
<style type="text/css">
   a{
        color: black;
   }
</style>
 <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="{{ url('admin/theloai') }}"><i class="fa fa-bar-chart-o fa-fw"></i> Thể Loại<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ url('admin/theloai') }}">Danh Sách Thể Loại</a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/theloai/create') }}">Thêm Thể Loại</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="{{ url('admin/loaitin') }}"><i class="fa fa-cube fa-fw"></i> Loại Tin<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ url('admin/loaitin') }}">Danh Sách Loại Tin</a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/loaitin/create') }}">Thêm Loại Tin</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="{{ url('admin/tintuc') }}"><i class="fa fa-cube fa-fw"></i> Tin Tức<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ url('admin/tintuc') }}">Danh Sách Tin Tức</a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/tintuc/create') }}">Thêm Tin Tức</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="{{ url('admin/slide') }}"><i class="fa fa-cube fa-fw"></i> Hình Ảnh Slide<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ url('admin/slide') }}">Danh Sách Hình Ảnh</a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/slide/create') }}">Thêm Hình Ảnh</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="{{ url('admin/user') }}"><i class="fa fa-users fa-fw"></i> User<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ url('admin/user') }}">Danh Sách User</a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/user/create') }}">Thêm User</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>

            