@extends('layouts.index')

@section('title')
	Chi Tiết Tin
@endsection
@section('content')
<!-- Page Content -->
<div class="container">
    <div class="row">

        <!-- Blog Post Content Column -->
        <div class="col-lg-9">

            <!-- Blog Post -->

            <!-- Title -->
            <h1>{{ $tintuc->TieuDe }}</h1>

            <!-- Author -->
           {{--  <p class="lead">
                by <a href="#">Start Bootstrap</a>
            </p> --}}

            <!-- Preview Image -->
            <img class="img-responsive" height="300px" width="700px" src="{{ asset('upload/tintuc/'.$tintuc->Hinh) }}" alt="">

            <!-- Date/Time -->
            <p><span class="glyphicon glyphicon-time"></span> Posted on {{ $tintuc->created_at }}</p>
            <hr>

            <!-- Post Content -->
            <p class="lead">{{ $tintuc->TomTat }}</p>
            
            <p>{!! $tintuc->NoiDung !!}</p>
            

            <hr>

            <!-- Blog Comments -->

            <!-- Comments Form -->
            <div class="well">
                <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
                @include('notis.errors')
                @if(Auth::check())
                <form method="post" action="{{ route('comment',['idTinTuc'=> $tintuc->id,'idUser'=>Auth::user()->id])}}" role="form">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <textarea name="txtNoiDung" class="form-control" rows="3"></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Gửi</button>
                    
                </form>
                @else
                <div class="form-group">
                        <textarea class="form-control" rows="3"></textarea>
                </div>
                <a href="{{ url('dangnhap') }}">Đăng Nhập Để Bình Luận Cho Bài Viết Này</a>
                @endif
            </div>

            <hr>

            <!-- Posted Comments -->

			@foreach($comment as $list)
            <!-- Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">{{ $list->user->name }}                    	
                        <small>{{ $list->created_at }}</small>
                    </h4>					
                    	{{ $list->NoiDung }}					
                </div>
            </div>
			@endforeach
            

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-3">

            <div class="panel panel-default">
                <div class="panel-heading"><b>Tin liên quan</b></div>
                <div class="panel-body">
					@foreach($tinlienquan as $list)
                    <!-- item -->
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-5">
                            <a href="{{ url('tintuc/'.$list->id.'/'.$list->TieuDeKhongDau.'.html') }}">
                                <img class="img-responsive" src="{{ asset('upload/tintuc/'.$list->Hinh) }}" alt="">
                            </a>
                        </div>
                        <div class="col-md-7">
                            <a href="{{ url('tintuc/'.$list->id.'/'.$list->TieuDeKhongDau.'.html') }}"><b>{{ $list->TieuDe }}</b></a>
                        </div>
                        <p>{{ $list->MieuTa }}</p>
                        <div class="break"></div>
                    </div>
                    <!-- end item -->
					@endforeach                 	
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading"><b>Tin nổi bật</b></div>
                <div class="panel-body">
					@foreach($tinnoibat as $list)
                    <!-- item -->
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-5">
                            <a href="{{ url('tintuc/'.$list->id.'/'.$list->TieuDeKhongDau.'.html') }}">
                                <img class="img-responsive" src="{{ asset('upload/tintuc/'.$list->Hinh) }}" alt="">
                            </a>
                        </div>
                        <div class="col-md-7">
                            <a href="{{ url('tintuc/'.$list->id.'/'.$list->TieuDeKhongDau.'.html') }}"><b>{{ $list->TieuDe }}</b></a>
                        </div>
                        <p style="padding: 4px;">{{ $list->TomTat }}</p>
                        <div class="break"></div>
                    </div>
                    <!-- end item -->
					@endforeach
                </div>
            </div>
            
        </div>

    </div>
    <!-- /.row -->
</div>
<!-- end Page Content -->
@endsection