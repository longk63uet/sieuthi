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
</div>
<div class="table-responsive">
  <table class="table table-striped b-t b-light" id="myTable">
    <thead>
      <tr>
        <th style="width:20px;">
          <label class="i-checks m-b-none">
            <input type="checkbox"><i></i>
          </label>
        </th>
        <th>Tên sản phẩm</th>
        <th>Số lượng</th>
        <th>Giá</th>
        <th>Hình sản phẩm</th>
        <th>Danh mục</th>
        <th>Hiển thị</th>
        <th style="width:30px;"></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($all_product as $product)
        
      <tr>
        <td><label class="i-checks m-b-none"><input type="checkbox" name="post"><i></i></label></td>
        <td>{{$product->product_name}}</td>
        <td>{{ $product->product_quantity }}</td>
        
         
            <td>{{ number_format($product->product_price,0,',','.') }}đ</td>
            <td><img src="public/uploads/product/{{ $product->product_image }}" height="100" width="100"></td>
            <td>{{ $product->category_name }}</td>
        <td><span class="text-ellipsis">
        @php
            
        if ($product->product_status == 1) 
         {echo "Hiển thị" ;}
        else echo "Ẩn";
         
        @endphp
        </span></td>
        <td>
          <a href="{{url('edit-product/'.$product->product_id)}}" class="active" ui-toggle-class="">
            <i class="fa fa-pencil text-success text-active"></i>
          </a> 
          <a onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')" href="{{url('delete-product/'.$product->product_id)}}" class="active" ui-toggle-class="">
            <i class="fa fa-times text-danger text"></i>
          </a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <form action="{{url('import-product-csv')}}" method="POST" enctype="multipart/form-data">
    @csrf
    
  <input type="file" name="file" accept=".xlsx"><br>

 <input type="submit" value="Import file Excel" name="import_csv" class="btn btn-warning">
</form>

<!-----export data---->
 <form action="{{url('export-product-csv')}}" method="POST">
    @csrf
 <input type="submit" value="Export file Excel" name="export_csv" class="btn btn-success">
</form>
</div>
</div>
@endsection