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
                        <form action="#">
                            <input type="text" placeholder="Bạn cần tìm gì?">
                            <button type="submit" class="site-btn">Tìm kiếm</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>+84 999 999</h5>
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
                    <h2>Thực phẩm sạch</h2>
                    <div class="breadcrumb__option">
                        <a href="{{route('index')}}">Trang chủ</a>
                        <a href="./index.html">Cửa hàng</a>
                        <span>Stay Healthy</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Details Section Begin -->
<section class="product-details spad">
    <div class="container">
        <div class="row">
            @foreach($product as $pro)
            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__item">
                        <img class="product__details__pic__item--large"
                            src="{{URL('/public/uploads/product/'.$pro->product_image)}}" alt="">
                    </div>
                    <div class="product__details__pic__slider owl-carousel">
                        <img data-imgbigurl="{{URL('/public/uploads/product/'.$pro->product_image)}}"
                            src="{{URL('/public/uploads/product/'.$pro->product_image)}}" alt="">
                        <img data-imgbigurl="{{URL('/public/uploads/product/'.$pro->product_image)}}"
                            src="{{URL('/public/uploads/product/'.$pro->product_image)}}" alt="">
                        <img data-imgbigurl="{{URL('/public/uploads/product/'.$pro->product_image)}}"
                            src="{{URL('/public/uploads/product/'.$pro->product_image)}}" alt="">
                        <img data-imgbigurl="{{URL('/public/uploads/product/'.$pro->product_image)}}"
                            src="{{URL('/public/uploads/product/'.$pro->product_image)}}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                
                <div class="product__details__text">
                    <h3>{{$pro->product_name}}</h3>
                    <div class="product__details__rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                        <span>(18 reviews)</span>
                    </div>
                <form action="{{URL('/save-cart')}}" method="POST">
                        @csrf
                    <div class="product__details__price">{{number_format($pro->product_price)}} VNĐ</div>
                    <p>{{$pro->product_content}}</p>
                    <div class="product__details__quantity">
                        <div class="quantity">
                            <div class="pro-qty">
                                <input name="quantity" type="string" value="1">
                                <input name="productid_hidden" type="hidden"  value="{{$pro->product_id}}" />
                                <input name="product_name" type="hidden"  value="{{$pro->product_name}}" />
                                <input name="product_price" type="hidden"  value="{{$pro->product_price}}" />
                                <input name="product_image" type="hidden"  value="{{$pro->product_image}}" />
                            </div>
                        </div>
                    </div>
                    <input type="submit" value="Thêm vào giỏ hàng" class="btn btn-primary btn-sm add-to-cart" data-id_product="{{$pro->product_id}}" name="add-to-cart">
                </form>
                    <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                
                    <ul>
                        <li><b>Tình trạng</b> <span>Còn hàng</span></li>
                        <li><b>Giao hàng</b> <span>Trong vòng 1 tiếng. <samp></samp></span></li>
                        <li><b>Khối lượng</b> <span>0.5 kg</span></li>
                        <li><b>Chia sẻ</b>
                            <div class="share">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
                @endforeach
            </div>
            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                aria-selected="true">Mô tả</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                                aria-selected="false">Đánh giá <span>(1)</span></a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Thông tin chi tiết sản phẩm</h6>
                                <p>{{$pro->product_detail}}</p>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-2" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Đánh giá</h6>
                                <p></p>
                                <p></p>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Details Section End -->

<!-- Related Product Section Begin -->
<section class="related-product">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related__product__title">
                    <h2>Sản phẩm liên quan</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($relatedProduct as $relatedProduct)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="{{URL('/public/uploads/product/'.$relatedProduct->product_image)}}">
                        <ul class="product__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="#">{{$relatedProduct->product_name}}</a></h6>
                        <h5>{{number_format($relatedProduct->product_price) }} VNĐ</h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Related Product Section End -->
@include('footer')