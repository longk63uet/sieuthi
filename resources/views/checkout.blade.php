@include('header')

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Thanh toán</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Trang chủ</a>
                        <span>Tiến hành thanh toán</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h6><span class="icon_tag_alt"></span> Bạn có mã giảm giá? <a href="#">Click </a> để nhập mã
                </h6>
            </div>
        </div>
        <div class="checkout__form">
            <h4>Hóa đơn</h4>
            <form action="{{url('save-checkout-user')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="row">
                            <div class="col-lg-6">
                    <div class="checkout__input">
                        <p>Họ<span>*</span></p>
                        <input type="text" name="shipping_surname">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="checkout__input">
                        <p>Tên<span>*</span></p>
                        <input type="text" name="shipping_name">
                    </div>
                </div>
                </div>
                <div class="checkout__input">
                    <p>Địa chỉ chi tiết<span>*</span></p>
                    <input type="text" name="shipping_address" placeholder="Địa chỉ chi tiết">
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="checkout__input">
                            <p>Số điện thoại<span>*</span></p>
                            <input type="text" name="shipping_phone">
                            
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="checkout__input">
                            <p>Email<span>*</span></p>
                            <input type="text" name="shipping_email">
                        </div>
                    </div>
                </div>
            <div class="row">
                <div class="checkout__input col-lg-4">
                    <p>Thành phố/ Tỉnh<span>*</span></p>
                    <input  type="text" name="shipping_city" value="Hà Nội">
                </div>
                <div class="checkout__input col-lg-4">
                    <p>Thành quận, huyện<span>*</span></p>
                    <input type="text"  name="shipping_town" >
                </div>
                <div class="checkout__input col-lg-4">
                    <p>Đường<span>*</span></p>
                    <input type="text" name="shipping_village" >
                </div>
            </div>
            <div class="checkout__input">
                <p>Ghi chú<span>*</span></p>
                <input row="7" type="text" name="shipping_note"
                    placeholder="Bạn muốn nhắn nhủ gì tới người bán?">
            </div>
            
            
        </div>

                    {{-- @endif --}}
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4>Đơn hàng của bạn</h4>
                            <div class="checkout__order__subtotal">Tổng số lượng <span>{{number_format(Session::get('cart')->totalQuantity)}} sản phẩm</span></div>
                            <div class="checkout__order__subtotal">Tổng tiền <span>{{number_format(Session::get('cart')->totalPrice)}} VNĐ</span></div>
                            @php
                                if (Session::get('cart')->totalPrice < 300000) {
                                    $shipping = 15000;
                                }
                                else {
                                    $shipping = 0;
                                }
                                $totalPrice = Session::get('cart')->totalPrice;
                            @endphp
                            <div class="checkout__order__subtotal">Phí vận chuyển<span> {{number_format($shipping)}} VNĐ</span></div>



                            @if(Session::get('coupon'))
								@foreach(Session::get('coupon') as $key => $cou)
									@if($cou['coupon_condition']==1)
                                    <div class="checkout__order__subtotal">Mã giảm giá<span> {{$cou['coupon_discount']}} % </span></div>
												@php 
												$discount = ($totalPrice*$cou['coupon_discount'])/100;
												echo ' <div class="checkout__order__subtotal">Tổng giảm<span>'.number_format($discount,0,',','.').' VNĐ</span></div>';
                                                // $cart->totalPrice=  $cart->totalPrice-$total_coupon
												@endphp

										{{-- <li>Tổng thanh toán<span>{{number_format($cart->totalPrice,0,',','.')}} VNĐ</span></li> --}}

									@elseif($cou['coupon_condition']==2)
                                                @php 
												$discount = $cou['coupon_discount'];
												@endphp
                                    <div class="checkout__order__subtotal">Mã giảm giá<span> {{number_format($discount,0,',','.')}} VNĐ</span></li>
												
										{{-- <li>Tổng thanh toán<span>{{number_format($total_coupon,0,',','.')}} VNĐ</span></li> --}}
										@endif
									@endforeach
								
							</li>
                            @else
                            @php 
								$discount = 0;
							@endphp
                            @endif
                        



                            {{-- <div class="checkout__order__subtotal">Mã giảm giá<span> {{number_format()}} VNĐ</span></div> --}}
                            @php
                            $price = $totalPrice + $shipping - $discount;
                            @endphp
                            <div class="checkout__order__total">Tổng thanh toán <span>{{number_format($totalPrice + $shipping - $discount)}} VNĐ</span></div>
                            <input type="hidden" name="feeship" value="{{$shipping}}">
                            <input type="hidden" name="feeship" value="{{$price}}">
                            <div class="checkout__input__checkbox">
                                <label for="payment">
                                    Thanh toán chuyển khoản
                                    <input type="checkbox" id="payment" name="payment_option" value="1">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="cash">
                                    Thanh toán khi nhận hàng
                                    <input type="checkbox" id="cash" name="payment_option" value="2">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="paypal">
                                    Paypal
                                    <input type="checkbox" id="paypal" name="payment_option" value="3">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <button type="submit" name="send_order" class="site-btn">Đặt hàng</button>
                        </div>
                    </div>
                </div>
            
            </form>
        </div>
    </div>
    <div class="row">
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Mã giảm giá</h5>
                            <form action="{{url('check-coupon')}}" method="POST">
                                @csrf
                                <input type="text" name="coupon" placeholder="Nhập mã giảm giá">
                                <button type="submit" class="site-btn">Áp dụng</button>
                                
                            </form>
                                @if(Session::get('coupon'))
                                <a href="{{url('/unset-coupon')}}" class = "mt-2 btn btn-primary">Xóa mã giảm giá</a>
                                @endif
                        </div>
                    </div>
                    @if(session()->has('message'))
                    <div class="alert alert-success mt-2">
                        {!! session()->get('message') !!}
                    </div>
                    @elseif(session()->has('error'))
                     <div class="alert alert-danger mt-2">
                        {!! session()->get('error') !!}
                    </div>
                    @endif
                </div>
            </div>
</section>
<!-- Checkout Section End -->

@include('footer')
<script type="text/javascript">
    $(document).ready(function(){
        $('.city').on('change',function(){
        var action = $(this).attr('id');
        var ma_id = $(this).val();
        var _token = $('input[name="_token"]').val();
        var result = '';
       
        if(action=='city'){
            result = 'district';
        }else{
            result = 'village';
        }
        $.ajax({
            url : '{{url('/select-delivery')}}',
            method: 'POST',
            data:{action:action,ma_id:ma_id,_token:_token},
            success:function(response){
                // console.log();
                $("."+result).empty; 
                $("."+result).html(response); 
            }
        });
    });
    });

   
      
</script>
