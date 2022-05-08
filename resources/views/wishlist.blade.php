@include('header')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Yêu thích</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Trang chủ</a>
                        <span>Yêu thích</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->
<section class="wishlist-section">
    <div class="container">
        <div class="row">
            <div  id="change-item-cart" class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Sản phẩm</th>
                                <th>Giá tiền</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody >
                            
                            @foreach($productwishlist as $item)
                            <tr >
                                <td class="shoping__cart__item">
                                    <img style="width:120px; hight:120px" src="{{URL('/public/uploads/product/'.$item->product_image)}}" alt="">
                                    <h5>{{$item->product_name}}</h5>
                                </td>
                                <td class="shoping__cart__price">
                                    {{number_format($item->product_price)}}
                                </td>
                                <td class="shoping__cart__item__close">
                                    <a  href="{{url('/remove-wishlist/'.$item->product_id)}}">
                                        <span class="icon_close"></span>
                                    </a>
                                </td>
                            </tr>
                            
                            
                            @endforeach 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@include('footer')