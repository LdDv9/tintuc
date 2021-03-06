 @extends('layouts.index')
@section('title')
Tìm Kiếm
@endsection
@section('content')
 <!-- Page Content -->
<div class="container">
    <div class="row">
        @include('layouts.menu')
        <div class="col-md-9 ">
            <div class="panel panel-default">
                  <?php
                    function doimau($str,$tukhoa){
                        return str_replace($tukhoa, "<span style='color:red;'>$tukhoa</span>", $str);
                    }
                ?>
                <div class="panel-heading" style="background-color:#337AB7; color:white;">
                    <h4><b>Tìm Kiếm :{!! $tukhoa !!}</b></h4>
                </div>
              
                @foreach($tintuc as $list)
                    <div class="row-item row">
                        <div class="col-md-3">
                            <a href="detail.html">
                                <br>
                                <img width="200px" height="200px" class="img-responsive" src="{!! asset('upload/tintuc/'.$list->Hinh) !!}" alt="">
                            </a>
                        </div>
                        <div class="col-md-9">
                            <h3>{!! doimau($list->TieuDe,$tukhoa)  !!}</h3>
                            <p>{!!  doimau($list->TomTat,$tukhoa) !!}</p>
                            <a class="btn btn-primary" href="{!! url('tintuc/'.$list->id.'/'.$list->TieuDeKhongDau.'.html') !!}">Chi Tiết <span class="glyphicon glyphicon-chevron-right"></span></a>
                        </div>
                        <div class="break"></div>
                    </div>
                @endforeach            
                <!-- Pagination -->
                <div class="row text-center">
                    <div class="col-lg-12">
                       {!! $tintuc->links() !!}
                    </div>
                </div>
                <!-- /.row -->
            </div>
        </div> 

    </div>
</div>
<!-- end Page Content -->
@endsection