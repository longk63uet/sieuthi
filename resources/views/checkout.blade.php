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
                            <p>Địa chỉ<span>*</span></p>
                            <input type="text" name="shipping_address" placeholder="Địa chỉ chi tiết">
                        </div>
                        <div class="checkout__input">
                            <p>Thành phố/ Tỉnh<span>*</span></p>
                            <input type="text" name="shipping_city">
                        </div>
                        <div class="checkout__input">
                            <p>Huyện<span>*</span></p>
                            <input type="text" name="shipping_town">
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