@include('header')
<div class="container mb-4 main-container">
    <div class="row">
        <div class="col-lg-3 pb-5" style="margin-right: 50px">
            <div class="author-card pb-3">
                <div class="author-card-cover"
                    style="background-image: url(images/bg-food.jpg);">
                </div>
                <div class="author-card-profile">
                    <div class="author-card-avatar"><img src="images/avt3.jpg" alt="">
                    </div>
                    <div class="author-card-details">
            
                        <h5 class="author-card-name text-lg" style="margin-top: 10px; font-size: 15px">Ngày tham gia: {{$user->created_at}}</h5>
                    </div>
                </div>
            </div>
            <div class="wizard">
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

        <div class="col-lg-8 pb-5">
            <div class="d-flex justify-content-end pb-3">
                @php
		$message = Session::get('message');
		if($message){
			echo $message;
			Session::put('message','');
		}
	    @endphp
        <form action="{{url('change-pass')}}" method="POST">
                    @csrf
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label for="account-pass">Mật khẩu cũ</label>
                            <input class="form-control" name="password" type="password" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="account-pass">Mật khẩu mới</label>
                        <input class="form-control" name="newpassword" type="password" >
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mb-7 ">Cập nhật mật khẩu</button>
                </form>
            </div>
        </div>
</div>
{{-- <div class="row"> --}}
        <!-- @php
		$message = Session::get('message');
		if($message){
			echo $message;
			Session::put('message','');
		}
	    @endphp
        <form action="{{url('change-pass')}}" method="POST">
                    @csrf
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label for="account-pass">Mật khẩu cũ</label>
                            <input class="form-control" name="password" type="password" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="account-pass">Mật khẩu mới</label>
                        <input class="form-control" name="newpassword" type="password" >
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mb-7 ">Cập nhật mật khẩu</button>
                </form> -->
        
    {{-- </div> --}}
@include('footer')