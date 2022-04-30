@extends('admin_layout')
@section('content')
<section class="wrapper">
    <div class="table-agile-info">
<div class="panel panel-default">
<div class="panel-heading">
  Thống kê
</div>
</div>
<div class="row w3-res-tb">
  @php
		$message = Session::get('message');
		if($message){
			 echo $message;
			 Session::put('message','');
		}
	@endphp
</div>
<div class="table-responsive">
  <table class="table table-striped b-t b-light" id="myTable">
    <thead>
      <tr>
        
        <th>Tổng số người dùng</th>
        <th>Tổng số đơn hàng</th>
        <th>Nội dung</th>
        <th>Danh mục</th>
        <th>Hiển thị</th>
        <th style="width:30px;"></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($blogs as $blog)
        
      <tr>
        <td>{{$blog->title}}</td>
        <td><img src="public/uploads/blog/{{ $blog->images }}" height="100" width="100"></td>
        <td>{!! $blog->content !!}</td>
        <td>{{ $blog->blogcategory_name }}</td>
        
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
</div>
@endsection