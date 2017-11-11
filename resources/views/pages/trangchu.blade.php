@extends('layouts.index')
@section('title')
	Trang Chủ
@endsection
@section('content')
  <div class="container">

		@include('layouts.slide')

        <div class="space20"></div>


        <div class="row main-left">
          @include('layouts.menu')

            <div class="col-md-9">
	            <div class="panel panel-default">            
	            	<div class="panel-heading" style="background-color:#337AB7; color:white;" >
	            		<h2 style="margin-top:0px; margin-bottom:0px;">Laravel Tin Tức</h2>
	            	</div>

	            	<div class="panel-body">
	            		@foreach($theloai as $list)
	            			@if(count($list->loaitin)>0)
		            		<!-- item -->
						    <div class="row-item row">
			                	<h3>
			                		<a href="category.html">{{ $list->Ten }}</a> |
			                		@foreach($list->loaitin as $list_loaitin)                		 	
				                		<small><a href="{{ url('loaitin/'.$list_loaitin->id.'/'.$list_loaitin->TenKhongDau.'.html') }}"><i>{{ $list_loaitin->Ten }}</i> / </a></small>	
			                		@endforeach
			                	</h3>
			                	<?php
				                		$data = $list->tintuc->where('NoiBat',1)->sortByDesc('created_at')->take(5);
				                		$tinnoi=$data->shift();
			                	?>	
			                	<div class="col-md-8 border-right">
			                		<div class="col-md-5">
				                        <a href="detail.html">
				                            <img class="img-responsive" src="{{ asset('upload/tintuc/'.$tinnoi['Hinh']) }}" alt="">
				                        </a>
				                    </div>
				                    <div class="col-md-7">
				                        <h3>{{ $tinnoi['TieuDe'] }}</h3>
				                        <p>{{ $tinnoi['TomTat'] }}</p>
				                        <a class="btn btn-primary" href="{{ url('tintuc/'.$tinnoi['id'].'/'.$tinnoi['TieuDeKhongDau'].'.html') }}">Xem Tin<span class="glyphicon glyphicon-chevron-right"></span></a>
									</div>
			                	</div>
									<div class="col-md-4">
										@foreach($data as $list_tintuc)
										<a href="{{ url('tintuc/'.$list_tintuc->id.'/'.$list_tintuc->TieuDeKhongDau.'.html') }}">
											<h4>
												<span class="glyphicon glyphicon-list-alt"></span>
												{{ $list_tintuc->TieuDe }}
											</h4>
										</a>
										@endforeach
									</div>
								<div class="break"></div>
			                </div>
			                <!-- end item -->
			                @endif
		                @endforeach

					</div>
	            </div>
        	</div>
        </div>
        <!-- /.row -->
    </div>
 @endsection
