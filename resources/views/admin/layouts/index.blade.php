<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Website tin tức demo">
    <meta name="author" content="">
    <title>Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href=" {{ asset('admin_asset/bower_components/bootstrap/dist/css/bootstrap.min.css') }} " rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href=" {{ asset('admin_asset/bower_components/metisMenu/dist/metisMenu.min.css')}}" rel="stylesheet">
    <base href="{{asset('')}}">
    <!-- Custom CSS -->
    <link href="{{ asset('admin_asset/dist/css/sb-admin-2.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('admin_asset/bower_components/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href=" {{ asset('admin_asset/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="{{ asset('admin_asset/bower_components/datatables-responsive/css/dataTables.responsive.css') }}" rel="stylesheet">
</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
@include('admin.layouts.header')

<!-- Page Content -->
    @yield('content');
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="{{ asset('admin_asset/bower_components/jquery/dist/jquery.min.js') }}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('admin_asset/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="{{ asset('admin_asset/bower_components/metisMenu/dist/metisMenu.min.js') }}"></script>

<!-- Custom Theme JavaScript -->
<script src="{{ asset('admin_asset/dist/js/sb-admin-2.js') }}"></script>

<!-- DataTables JavaScript -->
<script src="{{ asset('admin_asset/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin_asset/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') }}"></script>

<!--Ckeditor -->
<script type="text/javascript" language="javascript" src="{{ asset('/ckeditor/ckeditor.js') }}"></script>
{{--<script src="//cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>--}}
<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function () {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>
@yield('script')
</body>

</html>
