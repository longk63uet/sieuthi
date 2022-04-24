@extends('admin_layout')
@section('content')
<section class="wrapper">
    <div class="table-agile-info">
<div class="panel panel-default">
<div class="panel-heading">
  Quản lý blog
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
        
        <th>Tiêu đề Blog</th>
        <th>Hình ảnh minh hoạ</th>
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
        <td><span class="text-ellipsis">
        @php
            
        if ($blog->status == 1) 
         {echo "Hiển thị" ;}
        else echo "Ẩn";
         
        @endphp
        </span></td>
        <td>
          <a href="{{url('edit-blog/'.$blog->id)}}" class="active" ui-toggle-class="">
            <i class="fa fa-pencil text-success text-active"></i>
          </a> 
          <a onclick="return confirm('Bạn có chắc chắn muốn xóa blog này không?')" href="{{url('delete-blog/'.$blog->id)}}" class="active" ui-toggle-class="">
            <i class="fa fa-times text-danger text"></i>
          </a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
</div>
@endsection