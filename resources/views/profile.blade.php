@include('header')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-3 pb-5" style="margin-right: 50px">
            <div class="author-card pb-3">
                <!-- <div class="author-card-cover"
                    style="background-image: url(images/bg-food.jpg);">
                </div> -->
                <div class="author-card-profile">
                    <div class="author-card-avatar"><img src="images/avt3.jpg" alt="">
                    </div>
                    <div class="author-card-details">
                        <h5 class="author-card-name text-lg" style="margin-top: 10px; font-size: 15px">Ngày tham gia: {{$user->created_at}}</h5>
                    </div>
                </div>
            </div>
            <div class="wizard" style="float: left">
                <nav class="list-group list-group-flush">
                    <a class="list-group-item" href="{{url('profile')}}">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <i class="fa fa-user mr-1 text-muted" aria-hidden="true"></i>
                                <div class="light d-inline-block font-weight-medium text-uppercase">Thông tin cá nhân</div>
                            </div>
                        </div>
                    </a>
                    <a class="list-group-item" href="{{url('show-wishlist')}}">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <i class="fa fa-heart mr-1 text-muted"></i>
                                <div class="light d-inline-block font-weight-medium text-uppercase">Mục yêu thích</div>
                            </div>
                        </div>
                    </a>
                    <a class="list-group-item" href="{{url('manage-order-user')}}" >
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <i class="fa fa-tag mr-1 text-muted"></i>
                                <div class="light d-inline-block font-weight-medium text-uppercase">Quản lý đơn hàng</div>
                            </div>
                        </div>
                    </a>
                    <a class="list-group-item" href="{{url('change-password')}}" >
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <i class="fa fa-tag mr-1 text-muted"></i>
                                <div class="light d-inline-block font-weight-medium text-uppercase">Đổi mật khẩu</div>
                            </div>
                            {{-- <span class="badge badge-secondary">7</span> --}}
                        </div>
                    </a>
                    <a class="list-group-item" href="{{url('logout-user')}}">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <i class="fa fa-sign-out text-muted"></i>
                                <div class="light d-inline-block font-weight-medium text-uppercase">Đăng xuất</div>
                            </div>
                        </div>
                    </a>
                </nav>
            </div>
        </div>
        <!-- Profile Settings-->
        <div class="col-lg-8 pb-5">
            <h3 style="text-align: center; margin-bottom: 15px;">Thông tin cá nhân</h3>
            <form class="row" action="{{url('change-profile')}}" method="POST">
            @csrf
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-fn">Tên</label>
                        <input class="form-control" type="text" name="name" id="account-fn" value="{{$user->name}}" required="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-ln">Email</label>
                        <input class="form-control" type="email" name="email" id="account-ln" value="{{$user->email}}" required="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-email">Số điện thoại</label>
                        <input class="form-control" type="text" name="user_phone" id="account-email" value="{{$user->user_phone}}"
                        >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-email">Địa chỉ</label>
                        <input class="form-control" type="text" name="user_address" id="account-email" value="{{$user->user_address}}"
                            >
                    </div>
                </div>
                <div class="col-md-12">
                    <button class="btn btn-primary" type="submit" style="float: right">Cập nhật thông tin cá nhân</button>
                </div>
                </form>

            <h3 class="col-md-12" style="text-align: center; margin-top: 30px; margin-bottom:15px">Thông tin vận chuyển</h3>
            <form class="row" action="{{url('change-shipping')}}" method="POST">
            @csrf
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-fn">Họ</label>
                        <input class="form-control" type="text" name="shipping_surname" id="account-fn" value="{{$shipping->shipping_surname ? $shipping->shipping_surname : ""}}" required="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-ln">Tên</label>
                        <input class="form-control" name="shipping_name" type="text" id="account-ln" value="{{$shipping->shipping_name}}" required="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-email">Email</label>
                        <input class="form-control" name="shipping_email" type="email" id="account-email" value="{{$shipping->shipping_email}}"
                            >
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-phone">Số điện thoại</label>
                        <input class="form-control" name="shipping_phone" type="text" id="account-phone" value="{{$shipping->shipping_phone}}"
                            required="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-city">Tỉnh/Thành phố</label>
                        <input class="form-control" name="shipping_city" type="text" id="account-city" value="{{$shipping->shipping_city}}"
                            required="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-district">Quận/Huyện</label>
                        <input class="form-control" name="shipping_town" type="text" id="account-district" value="{{$shipping->shipping_town}}"
                            required="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-vlg">Xã/Phường</label>
                        <input class="form-control" name="shipping_village" type="text" id="account-vlg" value="{{$shipping->shipping_village}}"
                            required="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-address">Địa chỉ</label>
                        <input class="form-control" name="shipping_address" type="text" id="account-address" value="{{$shipping->shipping_address}}"
                            required="">
                    </div>
                </div>
                <div class="col-md-12">
                    <button class="btn btn-primary" type="submit" style="float: right">Cập nhật thông tin vận chuyển</button>
                </div>

                <div class="col-12">
                    <hr class="mt-2 mb-3">
                    <div class="d-flex flex-wrap justify-content-between align-items-center">
                        {{-- <div class="custom-control custom-checkbox d-block">
                            <input class="custom-control-input" type="checkbox" id="subscribe_me" checked="">
                            <label class="custom-control-label" for="subscribe_me">Thông báo qua Email</label>
                        </div> --}}
                        <!-- <button class="btn btn-style-1 btn-primary" type="submit" data-toast=""
                            data-toast-position="topRight" data-toast-type="success"
                            data-toast-icon="fe-icon-check-circle" data-toast-title="Success!"
                            data-toast-message="Your profile updated successfuly."
                            style="float: right">Cập nhật thông tin vận chuyển</button> -->
                    </div>
                </div>
                <input type="hidden" name="shipping_id" value="{{$shipping->shipping_id}}">
                {{-- @endforeach --}}
            </form>
        </div>
    </div>
</div>
@include('footer')