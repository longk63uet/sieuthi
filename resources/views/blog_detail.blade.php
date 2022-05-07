@include('header')

 <!-- Blog Details Hero Begin -->
 <section class="breadcrumb-section set-bg" data-setbg="{{asset('img/blog/details/breadcrumb.jpg')}}">
    <div class="container">
        @foreach ($blog as $item)
        <div class="row">
            <div class="col-lg-12">
                <div class="blog__details__hero__text">
                    <h2>{{$item->title}}</h2>
                    <ul>
                        <li>Tác giả: {{$item->name}}</li>
                        <li>{{$item->created_at}}</li>
                        <li>8 Bình luận</li>
                    </ul>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Blog Details Hero End -->

<!-- Blog Details Section Begin -->
<section class="blog-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-5 order-md-1 order-2">
                <div class="blog__sidebar">
                    <div class="blog__sidebar__search">
                        <form action="#">
                            <input type="text" placeholder="Tìm kiếm...">
                            <button type="submit"><span class="icon_search"></span></button>
                        </form>
                    </div>
                    <div class="blog__sidebar__item">
                        <h4>Danh mục</h4>
                        <ul>
                            @foreach ($blogcate as $item)
                                
                            <li><a href="#">{{$item->blogcategory_name}}</a></li>
                            
                            @endforeach
                        </ul>
                    </div>
                    <div class="blog__sidebar__item">
                        <h4>Sản phẩm liên quan</h4>
                        <div class="blog__sidebar__recent">
                            @foreach ($pro as $item)
                                
                           
                            <a href="{{url('/chi-tiet/'.$item->product_id)}}" class="blog__sidebar__recent__item">
                                <div class="blog__sidebar__recent__item__pic">
                                    <img width="100" height="100" src="{{URL('/public/uploads/product/'.$item->product_image)}}" alt="">
                                </div>
                                <div class="blog__sidebar__recent__item__text">
                                    <h6>{{$item->product_name}}</h6>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                    <!-- <div class="blog__sidebar__item">
                        <h4>Search By</h4>
                        <div class="blog__sidebar__item__tags">
                            <a href="#">Apple</a>
                            <a href="#">Beauty</a>
                            <a href="#">Vegetables</a>
                            <a href="#">Fruit</a>
                            <a href="#">Healthy Food</a>
                            <a href="#">Lifestyle</a>
                        </div>
                    </div> -->
                </div>
            </div>
            @foreach ($blog as $item)
                
            
            <div class="col-lg-8 col-md-7 order-md-1 order-1">
                <div class="blog__details__text">
                    <img src="{{URL('/public/uploads/blog/'.$item->images)}}" alt="">
                    {!! $item->content !!}
                </div>

                <div class="blog__details__content">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="blog__details__author">
                                <div class="blog__details__author__pic">
                                    <img src="{{asset('img/blog/details/details-author.png')}}" alt="">
                                </div>
                                <div class="blog__details__author__text">
                                    <h6>{{$item->name}}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="blog__details__widget">
                                <ul>
                                    <li><span>Danh mục:</span> {{$item->blogcategory_name}}</li>
                                    <li><span>Tags:</span> Tất cả, Nấu ăn, Món ngon</li>
                                </ul>
                                <div class="blog__details__social">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                    <a href="#"><i class="fa fa-linkedin"></i></a>
                                    <a href="#"><i class="fa fa-envelope"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Blog Details Section End -->


<!-- Related Blog Section Begin -->
<section class="related-blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related-blog-title">
                    <h2>Có thể bạn quan tâm</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($relatedBlog as $item)
                
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic">
                        <img src="{{URL('/public/uploads/blog/'.$item->images)}}" alt="">
                    </div>
                    <div class="blog__item__text">
                        <ul>
                            <li><i class="fa fa-calendar-o"></i> {{$item->created_at}}</li>
                            <li><i class="fa fa-comment-o"></i> 5</li>
                        </ul>
                        <h5><a href="{{url('/blog/'.$item->id)}}">{{$item->title}}</a></h5>
                        <p>{!!$item->summary!!}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Related Blog Section End -->

@include('footer')