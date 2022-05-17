@include('header')
<section class="breadcrumb-section set-bg container" data-setbg="img/bread.jpg">
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
                 @if (!empty($shipping))
                 <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Họ<span>*</span></p>
                                    <input type="text" name="shipping_surname" value="{{$shipping->shipping_surname}}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Tên<span>*</span></p>
                                    <input type="text" name="shipping_name" value="{{$shipping->shipping_name}}">
                                </div>
                            </div>
                        </div>
                    <div class="checkout__input">
                        <p>Địa chỉ chi tiết<span>*</span></p>
                        <input type="text" name="shipping_address" placeholder="Địa chỉ chi tiết" value="{{$shipping->shipping_address}}">
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="checkout__input">
                                <p>Số điện thoại<span>*</span></p>
                                <input type="text" name="shipping_phone" value="{{$shipping->shipping_phone}}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="checkout__input">
                                <p>Email<span>*</span></p>
                                <input type="text" name="shipping_email" value="{{$shipping->shipping_email}}">
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
                            <input type="text"  name="shipping_town" value="{{$shipping->shipping_town}}">
                        </div>
                        <div class="checkout__input col-lg-4">
                            <p>Đường<span>*</span></p>
                            <input type="text" name="shipping_village" value="{{$shipping->shipping_village}}">
                        </div>
                    </div>
                 @else
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
                 @endif   
                    
                    <div class="checkout__input">
                        <p>Ghi chú<span>*</span></p>
                        <textarea type="text" name="shipping_note" cols="73" rows="7" >
                        </textarea>
                    </div>
                </div>
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
												@endphp
									@elseif($cou['coupon_condition']==2)
                                                @php 
												$discount = $cou['coupon_discount'];
												@endphp
                                    <div class="checkout__order__subtotal">Mã giảm giá<span> {{number_format($discount,0,',','.')}} VNĐ</span></li>
										@endif
									@endforeach
							</li>
                            @else
                            @php 
								$discount = 0;
							@endphp
                            @endif
                            @php
                            $price = $totalPrice + $shipping - $discount;
                            @endphp
                            <div class="checkout__order__total">Tổng thanh toán <span>{{number_format($totalPrice + $shipping - $discount)}} VNĐ</span></div>
                            <input type="hidden" name="feeship" value="{{$shipping}}">
                            <input type="hidden" name="price" value="{{$price}}">
                            <input type="hidden" name="discount" value="{{$discount}}">
                            <div class="checkout__input__checkbox">
                                <label for="cash">
                                    Thanh toán khi nhận hàng
                                    <input type="radio" id="cash" name="payment_option" value="1">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="momo">
                                    Ví MOMO
                                    <input type="radio" id="momo" name="payment_option" value="2" >
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="paypal">
                                    Paypal(Đang bảo trì)
                                    <input type="radio" id="paypal" name="payment_option" value="3">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="onepay">
                                    Onepay
                                    <input type="radio" id="onepay" name="payment_option" value="4">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="vnpay">
                                    VNPAY
                                    <input type="radio" id="vnpay" name="payment_option" value="5">
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
    <div class="container">
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount ml-8">
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
@include('footer')