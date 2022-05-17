@include('header')
<section class="breadcrumb-section set-bg container" data-setbg="img/bread.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Thanh toán</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Trang chủ</a>
                        <span>Thanh toán</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container">
    @php
        $total = Session::get('cart')->totalPrice;
    @endphp
    <div class="row text-center">
        <div class="col-lg-12 text-center" style="margin-top: 20px; margin-bottom: 20px">
            <h3 class="text-center" style="font-size: 30px">Bạn đang chọn hình thức thanh toán VNPAY</h3>
        </div>
    </div>
    <div class="row center-form" style="margin-bottom: 30px;">
        <form action="{{url('vnpay')}}" method="post" class="pynt-form">
            @csrf
            <input type="hidden" name="total" value="{{$total}}">
            <button class="btn btn-color" type="submit" name="redirect">Tiếp tục thanh toán</button>
        </form>
        <a href="{{url('manage-order-user')}}"><button class="btn btn-color pynt-form">Xem lại đơn hàng </button></a>
        <a href="{{url('/')}}"><button class="btn btn-color">Quay lại trang chủ </button></a>
    </div>
</div>
@include('footer')