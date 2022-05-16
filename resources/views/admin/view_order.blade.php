@extends('admin_layout')
@section('content')
<div class="table-agile-info">
  
  <div class="panel panel-default">
    <div class="panel-heading">
     Thông tin đăng nhập
    </div>
    
    <div class="table-responsive">
                      <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Tên người dùng</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            <th>Địa chỉ</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->user_phone}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->user_address}}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<br>
<div class="table-agile-info">
  
  <div class="panel panel-default">
    <div class="panel-heading">
     Thông tin vận chuyển
    </div>
    <div class="table-responsive">
                      <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Tên người nhận</th>
            <th>Địa chỉ</th>
            <th>Quận, huyện</th>
            <th>Đường</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            <th>Ghi chú</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{$shipping->shipping_name}} {{$shipping->shipping_surname}}</td>
            <td>{{$shipping->shipping_address}}</td>
            <td>{{$shipping->shipping_town}}</td>
            <td>{{$shipping->shipping_village}}</td>
             <td>{{$shipping->shipping_phone}}</td>
             <td>{{$shipping->shipping_email}}</td>
             <td>{{$shipping->shipping_note}}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<br><br>
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Chi tiết đơn hàng
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Số thứ tự</th>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá tiền</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @php 
          $i = 1;
          $total = 0;
          @endphp
        @foreach($order_details as $key => $details)
          <tr>
            <td><i>{{$i}}</i></td>
            @php
             $i++ ;
             $total+= $details->product_price;
            @endphp
            <td>{{$details->product_name}}</td>
            <td>{{$details->product_quantiry}}</td>
            <td>{{number_format($details->product_price ,0,',','.')}} VNĐ</td>
          </tr>
        @endforeach
          </tr>
          @foreach($order as $key => $or)
          <tr>
            <td colspan="2"></td>
            <td>Tổng tiền:</td>
            <td>{{number_format($total)}} VNĐ</td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td>Phí ship:</td>
            <td>+ {{number_format($or->feeship)}} VNĐ</td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td>Mã giảm giá:</td>
            <td>- {{number_format($or->coupon)}} VNĐ</td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td>Tổng thanh toán:</td>
            <td>{{number_format($or->order_total)}} VNĐ</td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td>Hình thức thanh toán:</td>
            @if ($payment->payment_method == 1)
                <td>Thanh toán khi nhận hàng </td>
            @elseif($payment->payment_method == 2)
            <td>Ví MOMO </td>
            @elseif($payment->payment_method == 3)
            <td>Paypal </td>
            @elseif($payment->payment_method == 4)
            <td>Onepay </td>
            @elseif($payment->payment_method == 5)
            <td> VNPAY</td>
            @endif
          </tr>
        </tbody>
      </table>
        <button class="btn btn-warning"><a target="_blank" href="{{url('/print-order/'.$or->order_id)}}">In đơn hàng</a></button>
        <button class="btn btn-success"><a href="{{url('/shipping-order/'.$or->order_id)}}">Giao đơn hàng</a></button>
        <button class="btn btn-danger"><a href="{{url('/cancel-order-admin/'.$or->order_id)}}">Hủy đơn hàng</a></button>
    </div>
    @endforeach
  </div>
</div>
@endsection