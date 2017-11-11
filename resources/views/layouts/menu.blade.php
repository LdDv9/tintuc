<div class="col-md-3 ">
<ul class="list-group" id="menu">
    <li href="#" class="list-group-item menu1 active">
    	Menu
    </li>
	@foreach($theloai as $list)
	@if(count($list->loaitin)>0)
    <li href="#" class="list-group-item menu1">
        <a href="#">{{ $list->Ten }}</a>
    </li>
    <ul>	
    	@foreach($list->loaitin as $list_loaitin)
		<li class="list-group-item">
			<a href="{{ url('loaitin/'.$list_loaitin->id.'/'.$list_loaitin->TenKhongDau.'.html') }}">{{ $list_loaitin->Ten }}</a>
		</li>
		@endforeach				
    </ul>
    @endif
	@endforeach
</ul>
</div>