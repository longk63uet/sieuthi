@include('header')
<!-- Hero Section Begin -->
<section class="hero hero-normal">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>Danh mục</span>
                    </div>
                    <ul>
                        @foreach ($cate as $category)  
                        <li><a href="{{url('danh-muc/'.$category->category_id)}}">{{$category->category_name}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                            <form method="POST" action="{{url('/tim-kiem')}}" >
                                @csrf
                                <input type="text" name="keywords_submit" id="keyword" placeholder="Bạn cần tìm gì?">
                                <div id="search-ajax"></div>
                                <button type="submit"  class="site-btn">Tìm kiếm</button>
                            </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>+84 29 399 99</h5>
                            <span>Hỗ trợ 24/7</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{asset('img/breadcrumb.jpg')}}"> 
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Eko Market</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="sidebar__item">
                        <h4>Danh mục</h4>
                        <ul>
                            @foreach ($cate as $category)  
                            <li><a href="{{url('danh-muc/'.$category->category_id)}}">{{$category->category_name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="sidebar__item">
                        <h4>Lọc theo giá</h4>
                        <div class="price-range-wrap">
                            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                data-min="100" data-max="2000">
                                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                <!-- <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span> -->
                            </div>
                            <!-- Giá tiền ở dưới -->
                            <div class="range-slider">
                                <div class="price-input">
                                    <input type="text" id="minamount">
                                    <input type="text" id="maxamount">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-7">
                <div class="product__discount"> 
                    <div class="section-title product__discount__title">
                        @foreach($category_name as $cat_name)
                             <div class="section-title">
                    <h2>{{$cat_name->category_name}}</h2>
                </div>
                @endforeach
                    </div> 
                    <div class="row">
                        <div class="product__discount__slider owl-carousel">
                            <div class="col-lg-4">
                                {{-- @foreach ($product as $pro)
                                <div class="product__discount__item">
                                    <div class="product__discount__item__pic set-bg"
                                        data-setbg="img/product/discount/pd-1.jpg">
                                        <div class="product__discount__percent">-20%</div>
                                        <ul class="product__item__pic__hover">
                                            <li><a href="javascript:" onclick="addToWishlist({{$pro->product_id}})"><i class="fa fa-heart"></i></a></li>
                                            <li><a  href="{{url('generate-qrcode/'.$pro->product_id)}}" target="_blank"><i class="fa fa-qrcode"></i></a></li>
                                            <li><a onclick="addToCart({{$pro->product_id}})" href="javascript:" ><i class="fa fa-shopping-cart "></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__discount__item__text">
                                        <span>Dried Fruit</span>
                                        <h5><a href="{{url('/chi-tiet/'.$pro->product_id)}}">{{$pro->product_name}}</a></h5>
                                        <div class="product__item__price">{{number_format($pro->product_price)}} <span>{{number_format($pro->product_price)}}</span></div>
                                    </div>
                                </div>
                                @endforeach --}}
                            </div>
                        {{-- </div> --}}
                    </div>
                </div>
                <div class="filter__item">
                    <div class="row">
                        <div class="col-lg-4 col-md-5">
                            <div class="filter__sort">
                                <h5>Sắp xếp theo</h5>
                                <form>
                                    @csrf
                                <select name="sort" id="sort" class="form-control">
                                    <option value="{{Request::url()}}?sort=none">Mặc định</option>
                                    <option value="{{Request::url()}}?sort=up">Giá tăng dần</option>
                                    <option value="{{Request::url()}}?sort=down">Giá giảm dần</option>
                                    <option value="{{Request::url()}}?sort=az">Theo tên từ A->Z</option>
                                    <option value="{{Request::url()}}?sort=za">Theo tên từ Z->A</option>
                                </select>
                            </form>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="filter__found">
                                <h6><span>{{count($product)}}</span> Sản phẩm</h6>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-3">
                            <div class="filter__option">
                                <span class="icon_grid-2x2"></span>
                                <span class="icon_ul"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($product as $pro)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{URL('public/uploads/product/'.$pro->product_image)}}">
                                <ul class="product__item__pic__hover">
                                <li><a href="javascript:" onclick="addToWishlist({{$pro->product_id}})"><i class="fa fa-heart"></i></a></li>
                                            <li><a  href="{{url('generate-qrcode/'.$pro->product_id)}}" target="_blank"><i class="fa fa-qrcode"></i></a></li>
                                            <li><a onclick="addToCart({{$pro->product_id}})" href="javascript:" ><i class="fa fa-shopping-cart "></i></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="{{url('/chi-tiet/'.$pro->product_id)}}">{{$pro->product_name}}</a></h6>
                                <h5>{{number_format($pro->product_price)}} VNĐ</h5>
                            </div>
                        </div>
                        
                    </div>
                    @endforeach
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->

{{-- @extends('welcome')
@section('content')
<!-- Featured Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @foreach($category_name as $cat_name)
                <div class="section-title">
                    <h2>{{$cat_name->category_name}}</h2>
                </div>
                @endforeach
            </div>
        </div>
        <div class="row featured__filter">
            @foreach ($product as $pro)
            <a href="{{url('/chi-tiet/'.$pro->product_id)}}">
            <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="{{URL('public/uploads/product/'.$pro->product_image)}}">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="{{url('/chi-tiet/'.$pro->product_id)}}">{{$pro->product_name}}</a></h6>
                        <h5>{{$pro->product_price}}</h5>
                    </div>
                </div>
            
            </div>
        </a>
            @endforeach
        </div>
    </div>
</section>
<!-- Featured Section End -->
@endsection --}}
@include('footer')