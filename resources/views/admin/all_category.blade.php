@extends('admin_layout')
@section('content')
<section class="wrapper">
    <div class="table-agile-info">
<div class="panel panel-default">
<div class="panel-heading">
  Liệt kê danh mục sản phẩm
</div>
<div class="row w3-res-tb">
  @php
		$message = Session::get('message');
		if($message){
			 echo $message;
			 Session::put('message','');
		}
	@endphp
  
  <div class="col-sm-4">
  </div>
  <div class="col-sm-3">
    <div class="input-group">
      <input type="text" class="input-sm form-control" placeholder="Tìm kiếm">
      <span class="input-group-btn">
        <button class="btn btn-sm btn-default" type="button">Tìm kiếm</button>
      </span>
    </div>
  </div>
</div>
<div class="table-responsive">
  <table class="table table-striped b-t b-light">
    <thead>
      <tr>
        <th style="width:20px;">
          <label class="i-checks m-b-none">
            <input type="checkbox"><i></i>
          </label>
        </th>
        <th>Tên danh mục</th>
        {{-- <th>Mô tả</th> --}}
        <th>Trạng thái</th>
        <th style="width:30px;"></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($data as $category)
        
      <tr>
        <td><label class="i-checks m-b-none"><input type="checkbox" name="post"><i></i></label></td>
        <td>{{$category->category_name}}</td>

        {{-- <td><span class="text-ellipsis">{{$category->category_detail}}</span></td> --}}
        <td><span class="text-ellipsis">
        @php
            
        if ($category->category_status == 1) 
         {echo "Hiển thị" ;}
        else echo "Ẩn";
         
        @endphp
        </span></td>
        <td>
          <a href="{{url('edit-category/'.$category->category_id)}}" class="active" ui-toggle-class="">
            <i class="fa fa-pencil text-success text-active"></i>
          </a> 
          <a onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này không?')" href="{{url('delete-category/'.$category->category_id)}}" class="active" ui-toggle-class="">
            <i class="fa fa-times text-danger text"></i>
          </a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <form action="{{url('import-csv')}}" method="POST" enctype="multipart/form-data">
    @csrf
    
  <input type="file" name="file" accept=".xlsx"><br>

 <input type="submit" value="Import file Excel" name="import_csv" class="btn btn-warning">
</form>

<!-----export data---->
 <form action="{{url('export-csv')}}" method="POST">
    @csrf
 <input type="submit" value="Export file Excel" name="export_csv" class="btn btn-success">
</form>
</div>
</div>
@endsection