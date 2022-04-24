@extends('welcome')
@section('content')
<!-- Featured Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Sản phẩm nổi bật</h2>
                </div>
            </div>
        </div>
        <div class="row featured__filter">
            @foreach ($product as $pro)
            <a href="{{url('/chi-tiet/'.$pro->product_id)}}">
            <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="{{URL('public/uploads/product/'.$pro->product_image)}}">
                        <ul class="featured__item__pic__hover">
                            <li><a href="javascript:" onclick="addToWishlist({{$pro->product_id}})"><i class="fa fa-heart"></i></a></li>
                            <li><a style="cursor: pointer" onclick="compare({{$pro->product_id}})"><i class="fa fa-retweet"></i></a></li>
                            <li><a onclick="addToCart({{$pro->product_id}})" href="javascript:" ><i class="fa fa-shopping-cart "></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="{{url('/chi-tiet/'.$pro->product_id)}}">{{$pro->product_name}}</a></h6>
                        <h5>{{number_format($pro->product_price)}} VNĐ</h5>
                    </div>
                </div>
            
            </div>
        
            @endforeach
        </a>
        </div>
    
    </div>
</section>
<!-- Featured Section End -->
<!-- Banner Begin -->
<div class="banner">
    <div class="container">
        <div class="row">
            @foreach ($banner as $banner)
                
           
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="{{URL('public/uploads/banner/'.$banner->banner_image)}}" alt="">
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Banner End -->
<!-- Latest Product Section Begin -->
<section class="latest-product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Xếp hạng cao nhất</h4>
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-prdouct__slider__item">
                            @foreach ($ratingProduct as $item)
                            
                            <a href="{{url('/chi-tiet/'.$item->product_id)}}" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{URL('public/uploads/product/'.$item->product_image)}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>{{$item->product_name}}</h6>
                                    <span>{{number_format($item->product_price)}} VNĐ</span>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Được xem nhiều nhất</h4>
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-prdouct__slider__item">
                            @foreach ($viewProduct as $item)
                                
                            
                            <a href="{{url('/chi-tiet/'.$item->product_id)}}" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{URL('public/uploads/product/'.$item->product_image)}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>{{$item->product_name}}</h6>
                                    <span>{{number_format($item->product_price)}} VNĐ</span>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Bán chạy nhất</h4>
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-prdouct__slider__item">
                            @foreach ($soldProduct as $item)
                            
                            <a href="{{url('/chi-tiet/'.$item->product_id)}}" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{URL('public/uploads/product/'.$item->product_image)}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>{{$item->product_name}}</h6>
                                    <span>{{number_format($item->product_price)}} VNĐ</span>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Latest Product Section End -->

<!-- Blog Section Begin -->
<section class="from-blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title from-blog__title">
                    <h2>Blog nấu ăn</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($blogs as $item)
                
            
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic">
                        <img src="{{URL('public/uploads/blog/'.$item->images)}}" alt="Blog Images">
                    </div>
                    <div class="blog__item__text">
                        <ul>
                            <li><i class="fa fa-calendar-o"></i> {{$item->created_at}}</li>
                            <li><i class="fa fa-comment-o"></i> 5</li>
                        </ul>
                        <h5><a href="{{url('/blog/'.$item->id)}}">{{$item->title}}</a></h5>
                        <p>{{$item->summary}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Blog Section End -->
@endsection

