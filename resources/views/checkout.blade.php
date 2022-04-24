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
                               @if(isset($shipping))
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
                            <p>Địa chỉ<span>*</span></p>
                            <input type="text" name="shipping_address" placeholder="Địa chỉ chi tiết" value="{{$shipping->shipping_address}}">
                        </div>
                        <div class="row">
                            <div class="checkout__input col-lg-4">
                                <p>Thành phố/ Tỉnh<span>*</span></p>
                                <input type="text" name="shipping_city" >
                                
                            </div>
                            <div class="checkout__input col-lg-4">
                                <p>Huyện<span>*</span></p>
                                <input type="text" name="shipping_town">
                            </div>
                            <div class="checkout__input col-lg-4">
                                <p>Xã<span>*</span></p>
                                <input type="text" name="shipping_village">
                                
                            </div>
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
                        
                        <div class="checkout__input">
                            <p>Ghi chú<span>*</span></p>
                            <input type="text" name="shipping_note"
                                placeholder="Bạn muốn nhắn nhủ gì tới người bán?">
                        </div>
                    </div>
                    @else
                    <div class="checkout__input">
                        <p>Họ<span>*</span></p>
                        <input type="text" name="shipping_surname ">
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
                <p>Địa chỉ<span>*</span></p>
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
                    <form>
                        @csrf 
                        <div class="form-group col-lg-12">
                            <label for="exampleInputPassword1">Chọn tỉnh, thành phố</label>
                            <select name="city" id="city" class="form-control input-sm m-bot15 choose city">
                                <option value="">Chọn tỉnh, thành phố</option>
                            @foreach($city as $key => $ci)
                                <option value="{{$ci->matp}}">{{$ci->name}}</option>
                            @endforeach
                        </select>
                        </div>
                        {{-- <div class="form-group col-lg-4 choosedistrict">
                            <label for="exampleInputPassword1">Chọn quận, huyện</label>
                            <select name="district" id="district" class="form-control input-sm m-bot15 choose district">
                                <option value="">Chọn quận huyện</option>
                            </select>
                        </div>
                    
                        <div class="form-group col-lg-4">
                            <label for="exampleInputPassword1">Chọn xã, thị trấn</label>
                            <select name="village" id="village" class="form-control input-sm m-bot15 village">
                                <option value="">Chọn xã phường</option>   
                        </select>
                        </div> --}}
                
           
                <button type="button" name="calculate_order calculate_delivery" class="btn btn-info add_delivery mt-4 mb-4">Tính phí vận chuyển</button>
            </form>
        </div>


            <div class="checkout__input">
                <p>Ghi chú<span>*</span></p>
                <input type="text" name="shipping_note"
                    placeholder="Bạn muốn nhắn nhủ gì tới người bán?">
            </div>
        </div>

                    @endif
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4>Ghi chú</h4>
                            <div class="checkout__order__products">Sản phẩm <span>Tổng tiền</span></div>
                            <ul>
                                <li>Rau xanh <span>10 VND</span></li>
                                
                            </ul>
                            <div class="checkout__order__subtotal">Tổng tiền <span>$750.99</span></div>
                            <div class="checkout__order__total">Thanh toán <span>$750.99</span></div>
                            
                            
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
