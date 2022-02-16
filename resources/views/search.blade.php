@include('header')

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Kết quả tìm kiếm</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Trang chủ</a>
                        <span>Tìm kiếm</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->
<div class=" featured__filter mt-4">
    @foreach ($search_product as $pro)
    <a href="{{url('/chi-tiet/'.$pro->product_id)}}">
    <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
        
        <div class="featured__item">
            <div class="featured__item__pic set-bg" data-setbg="{{URL('public/uploads/product/'.$pro->product_image)}}">
                <ul class="featured__item__pic__hover">
                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                    <li><a href="{{url('/add-to-cart/'.$pro->product_id)}}" data-url="{{url('/add-to-cart/'.$pro->product_id)}}" class="add-to-cart"><i class="fa fa-shopping-cart "></i></a></li>
                </ul>
            </div>
            <div class="featured__item__text">
                <h6><a href="{{url('/chi-tiet/'.$pro->product_id)}}">{{$pro->product_name}}</a></h6>
                <h5>{{number_format($pro->product_price)}} VNĐ</h5>
            </div>
        </div>
    @endforeach
    </div>
    

@include('footer')