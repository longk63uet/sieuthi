@include('header')
<section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
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
        <div class="col-lg-12 text-center">
            <h3 class="text-center">Bạn đang chọn hình thức thanh toán MOMO</h3>
        </div>
        <form action="{{url('momo')}}" method="post">
            @csrf
            <input type="hidden" name="total" value="{{$total}}">
            <button class="btn btn-primary" type="submit" name="payUrl">Tiếp tục thanh toán</button>
        </form>
        <a href="{{url('manage-order-user')}}"><button class="btn btn-primary">Xem lại đơn hàng </button></a>
        <a href="{{url('/')}}"><button class="btn btn-primary">Quay lại trang chủ </button></a>
    </div>
</div>
@include('footer')