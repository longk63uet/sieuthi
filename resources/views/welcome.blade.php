@include('header')

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Danh mục </span>
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
                                <h5>+84 999 999</h5>
                                <span>Hỗ trợ 24/7</span>
                            </div>
                        </div>
                    </div>
                    <div class="hero__item set-bg" data-setbg="img/hero/banner.jpg">
                        <div class="hero__text">
                            <span>Thực phẩm sạch</span>
                            <h2>Rau củ <br />100% thiên nhiên</h2>
                            <p>Miễn phí giao hàng tận nơi</p>
                            <a href="#" class="primary-btn">Mua ngay</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    

    @yield('content')
    @include('footer')
    <script>
        $(#keyword).keyup(function () { 
            var query =  $(this).val();
            alert(query);
        });
    </script>

   
    