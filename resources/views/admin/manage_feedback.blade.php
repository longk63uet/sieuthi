@extends('admin_layout')
@section('content')
<section class="wrapper">
    <div class="table-agile-info">
<div class="panel panel-default">
<div class="panel-heading">
  Quản lý Khiếu nại
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
        <th>Mã khiếu nại</th>
        <th>Tên</th>
        <th>Email</th>
        <th>Số điện thoại</th>
        <th>Đơn hàng</th>
        <th>Trạng thái</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($feedbacks as $feedback)
        
      <tr>
        <td>{{$feedback->id}}</td>
        <td>{{$feedback->name}}</td>
        <td>{{$feedback->email}}</td>
        <td>{{$feedback->phone}}</td>
        <td><a href="{{URL::to('/view-order/'.$feedback->order_id)}}"  target="_blank" rel="noopener noreferrer">{{$feedback->order_id}}</a></td>
        <td><span class="text-ellipsis">
        @php
            
        if ($feedback->status == 0) 
         {echo "Chưa xử lý" ;}
        else echo "Đã xử lý";
         
        @endphp

        </span></td>
        <td>
          <a onclick="return confirm('Bạn đã xử lý đơn hàng này?')" href="{{url('handle-feedback/'.$feedback->id)}}" class="active" ui-toggle-class="">
            <i class="fa-check-square-o"></i>
          </a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
</div>
@endsection