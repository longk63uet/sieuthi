@include('header')
@include('nav_user')
<!-- xem qua tang -->
        <div class="col-lg-8 pb-5">
            <div class="d-flex justify-content-end pb-3">
            </div>
            <div class="table-responsive">
                <table class="table table-hover mb-0" id="myTable">
                    <thead>
                        <tr>
                            <th>Mã</th>
                            <th>Khuyến mãi</th>
                            <th>Số lượng</th>
                            <th>Tình trạng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gift_coupon as $coupon)
                        <tr>
                            <td>{{$coupon->coupon_code}}</td>
                            <td>{{$coupon->coupon_name}}</td>
                            <td>{{$coupon->coupon_quantity}}</td>
                            <td>
                                @if ($coupon->coupon_end > $today && $coupon->coupon_quantity >= 1)
                                    Mã giảm giá có thể sử dụng    
                                @else
                                  Mã giảm giá không khả dụng                                 
                                @endif
                            </td>
                          </tr>
                          @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@include('footer')