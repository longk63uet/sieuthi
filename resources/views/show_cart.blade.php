@include('header')

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
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Giỏ hàng</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Trang chủ</a>
                            <span>Giỏ hàng của bạn</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
@php
$total = 0;
@endphp
    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div  id="change-item-cart" class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody >
                                
                                @if($cart)
                                @foreach($cart->products as $carts)
                                <tr >
                                    
                                    <td class="shoping__cart__item">
                                        <img style="width:150px; hight:150px" src="{{URL('/public/uploads/product/'.$carts['info']->product_image)}}" alt="">
                                       <a href="{{url('/chi-tiet/'.$carts['info']->product_id)}}"> <h5>{{$carts['info']->product_name}}</h5> </a>
                                    </td>
                                    <td class="shoping__cart__price">
                                        {{$carts['info']->product_price}}
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input data-id="{{$carts['info']->product_id}}" type="text" value="{{$carts['quantity']}}">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                      @php
                                          $total = $carts['quantity']*$carts['info']->product_price
                                      @endphp
                                      {{$total}}
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <a  href="javascript:">
                                        <span class="icon_close" data-id = "{{$carts['info']->product_id}}"></span>
                                    </a>
                                    </td>
                                </tr>
                                </tr>
                                
                                @endforeach 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="#" class="primary-btn cart-btn">Tiếp tục mua sắm</a>
                        <a href="javascipt:" class="primary-btn cart-btn cart-btn-right edit-all"><span class="icon_loading "></span>
                            Cập nhật giỏ hàng</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Mã giảm giá</h5>
                            <form action="{{url('check-coupon')}}" method="POST">
                                @csrf
                                <input type="text" name="coupon" placeholder="Nhập mã giảm giá">
                                <button type="submit" class="site-btn">Áp dụng</button>
                                
                            </form>
                                @if(Session::get('coupon'))
                                <a href="{{url('/unset-coupon')}}" class = "mt-2">Xóa mã giảm giá</a>
                                @endif
                        </div>
                    </div>
                    @if(session()->has('message'))
                    <div class="alert alert-success mt-2">
                        {!! session()->get('message') !!}
                    </div>
                @elseif(session()->has('error'))
                     <div class="alert alert-danger mt-2">
                        {!! session()->get('error') !!}
                    </div>
                @endif
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Tổng tiền</h5>
                        <ul>

                            <li>Giá tiền<span> VNĐ</span></li>
                            @if(Session::get('coupon'))
							<li>
								
									@foreach(Session::get('coupon') as $key => $cou)
										@if($cou['coupon_condition']==1)
											Mã giảm : {{$cou['coupon_discount']}} %
											<p>
												@php 
												$total_coupon = ($total*$cou['coupon_discount'])/100;
												echo '<p><li>Tổng giảm:'.number_format($total_coupon,0,',','.').'đ</li></p>';
												@endphp
											</p>
											<p><li>Tổng đã giảm :{{number_format($total-$total_coupon,0,',','.')}}đ</li></p>
										@elseif($cou['coupon_condition']==2)
											Mã giảm : {{number_format($cou['coupon_discount'],0,',','.')}} k
											<p>
												@php 
												$total_coupon = $total - $cou['coupon_discount'];
								
												@endphp
											</p>
											<p><li>Tổng đã giảm :{{number_format($total_coupon,0,',','.')}}đ</li></p>
										@endif
									@endforeach
								


							</li>
                            @endif
                            <li>Phí vận chuyển<span> VNĐ</span></li>
                            <li>Mã giảm giá<span> VNĐ</span></li>
                            <li>Tổng thanh toán <span>{{number_format($cart->totalPrice)}} VNĐ</span></li>
                        </ul>
                        <?php
                        $user_id = Session::get('user_id');
                        if($user_id!=NULL){ 
                      ?>
                      <div class="header__top__right__auth">
                        <a href="{{url('checkout')}}" class="primary-btn">Tiếp tục thanh toán</a>
                     </div>
                     <?php
                 }else{
                      ?>
                      <div class="header__top__right__auth">
                        <a href="{{url('login-checkout')}}" class="primary-btn">Tiếp tục thanh toán</a>
                     </div>
                      <?php 
                  }
                      ?>
                    @else
                    <h4>Giỏ hàng của bạn đang trống</h4>  
                    @endif
                    </div>
                </div>
            </div>
           
        </div>
    </section>
    <!-- Shoping Cart Section End -->
@include('footer')
<script>
    $('#change-item-cart').on("click", ".icon_close", function() {
        $.ajax({
            type: "GET",
            url: "delete-cart/"+$(this).data("id"),
            success: function (response) {
                $('#change-item-cart').empty;
                $('#change-item-cart').html(response);
               

                alertify.success('Đã xóa sản phẩm khỏi giỏ hàng');
                
        
        }
        });
    });

    $(".edit-all").on("click", function(){
        var lists = [];
        $("table tbody tr td").each(function(){
            $(this).find("input").each(function(){
                var element = {key: $(this).data("id"), value: $(this).val()};
                lists.push(element);
            })
        })
        // console.log(list);
        $.ajax({
            url: "save-cart-all",
            type: "post",
            data: {
                "_token": "{{ csrf_token() }}",
                "data": lists
                }
            }).done(function(){
                location.reload();
            });
        });
    
   
</script>