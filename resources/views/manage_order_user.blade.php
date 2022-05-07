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
        <!-- Profile Settings-->
        <!-- Orders Table-->
        <div class="col-lg-8 pb-5">
            <div class="d-flex justify-content-end pb-3">
                {{-- <div class="form-inline">
                    <label class="text-muted mr-3" for="order-sort">Sắp xếp theo</label>
                    <select class="form-control" id="order-sort">
                        <option>Tất cả</option>
                        <option>Đã giao hàng</option>
                        <option>Đang giao hàng</option>
                        <option>Trả hàng</option>
                        <option>Đã hủy</option>
                    </select>
                </div> --}}
            </div>
            <div class="table-responsive">
                <table class="table table-hover mb-0" id="myTable">
                    <thead>
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Ngày đặt hàng</th>
                            <th>Trạng thái</th>
                            <th>Tổng tiền</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $item)
                        <tr>
                            <td><a class="navi-link" href="{{url('view-order-user/'.$item->order_id)}}">{{$item->order_id}} </a></td>
                            <td>{{$item->created_at}}</td>
                            
                            @if ($item->order_status == 1)
                            <td><span class="badge badge-info m-0"> Đang xử lý </span></td>
                            @elseif ($item->order_status == 0)
                            <td><span class="badge badge-info m-0"> Đơn hàng đã hủy </span></td>
                            @elseif ($item->order_status == 2)
                            <td><span class="badge badge-info m-0"> Đang giao hàng </span></td>
                            @elseif  ($item->order_status == 3)
                            <td><span class="badge badge-info m-0"> Giao hàng thành công </span></td>
                            @endif
                            
                            <td>{{number_format($item->order_total)}} VNĐ</td>
                            @if ($item->order_status == 1)
                            <td><a onclick="return confirm('Bạn có muốn hủy đơn hàng này không?')"  href="{{url('cancel-order/'.$item->order_id)}}"><button class="btn btn-danger">Hủy đơn hàng</button></a></td>
                            @elseif ($item->order_status == 2)
                            <td><a onclick="return confirm('Bạn xác nhận đã nhận được hàng?')" href="{{url('confirm-order/'.$item->order_id)}}"><button class="btn btn-danger">Đã nhận được hàng</button></a></td>
                            @endif

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@include('footer')