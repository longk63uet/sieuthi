@extends('admin_layout')
@section('content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Quản lý mã giảm giá
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-4">
      </div>
    </div>
    <div class="table-responsive">
                      <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
      <table class="table table-striped b-t b-light" id="myTable2">
        <thead>
          <tr>
            <th>Tên mã giảm giá</th>
            <th>Mã giảm giá</th>
            <th>Số lượng</th>
            <th>Ngày bắt đầu</th>
            <th>Ngày kết thúc</th>
            <th>Loại mã</th>
            <th>Số giảm</th>
          </tr>
        </thead>
        <tbody>
          @foreach($coupon as $key => $cou)
          <tr>
            <td>{{ $cou->coupon_name }}</td>
            <td>{{ $cou->coupon_code }}</td>
            <td>{{ $cou->coupon_quantity }}</td>
            <td>{{ $cou->coupon_start }}</td>
            <td>{{ $cou->coupon_end }}</td>
            <td><span class="text-ellipsis">
              <?php
               if($cou->coupon_condition==1){
                ?>
                Giảm theo %
                <?php
                 }else{
                ?>  
                Giảm theo tiền
                <?php
               }
              ?>
            </span>
          </td>
             <td><span class="text-ellipsis">
              <?php
               if($cou->coupon_condition==1){
                ?>
                Giảm {{$cou->coupon_discount}} %
                <?php
                 }else{
                ?>  
                Giảm {{$cou->coupon_discount}} VNĐ
                <?php
               }
              ?>
            </span></td>
            <td>
              <a onclick="return confirm('Bạn có chắc chắn xóa mã giảm giá này không?')" href="{{URL::to('/delete-coupon/'.$cou->coupon_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection