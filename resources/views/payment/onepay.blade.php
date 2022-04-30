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
                        <span>Thanh toán</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h3 class="text-center">Bạn đang chọn hình thức thanh toán ONEPAY</h3>
        </div>
        <form action="{{url('onepay')}}" method="post">
            @csrf
            <button class="btn btn-primary" type="submit" name="redirect">Tiếp tục thanh toán</button>
        </form>
        <a href="{{url('manage-order-user')}}"><button class="btn btn-primary">Xem lại đơn hàng </button></a>
        <a href="{{url('/')}}"><button class="btn btn-primary">Quay lại trang chủ </button></a>
    </div>
</div>
@include('footer')