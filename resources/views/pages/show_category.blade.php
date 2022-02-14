@extends('welcome')
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
@endsection