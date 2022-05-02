@include('header')
<!--  Chi tiet don hang-->
<div class="container-fluid">

    <div class="container">

      <!-- Thong tin van chuyen -->
      <div class="padding-bottom-3x mb-1">
        <div class="card mb-3">
          <div class="p-4 text-center text-white bg-dark text-lg rounded-top">
            <a href="{{url('/')}}" class="text-uppercase" > Trang chủ </a>
            <span class="text-uppercase">- Mã đơn hàng - </span><span class="text-medium">23VTK567D91</span></div>
          <div class="d-flex flex-wrap flex-sm-nowrap justify-content-between py-3 px-2 bg-secondary">
            <div class="w-100 text-center py-1 px-2"><span class="text-medium">Đơn vị vận chuyển:</span> Eco Express</div>
            <div class="w-100 text-center py-1 px-2"><span class="text-medium">Trạng thái:</span> Đang giao</div>
            <div class="w-100 text-center py-1 px-2"><span class="text-medium">Ngày nhận dự kiến:</span> 09/05/2022
            </div>
          </div>
          <div class="card-body">
            <div class="steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x">
              <div class="step completed">
                <div class="step-icon-wrap">
                  <div class="step-icon"><i class="fa fa-user"></i></div>
                </div>
                <h4 class="step-title">Chờ xác nhận</h4>
              </div>
              <div class="step completed">
                <div class="step-icon-wrap">
                  <div class="step-icon"><i class="fa fa-cog"></i></div>
                </div>
                <h4 class="step-title">Chờ lấy hàng</h4>
              </div>
              <div class="step completed">
                <div class="step-icon-wrap">
                  <div class="step-icon"><i class="fa fa-truck"></i></div>
                </div>
                <h4 class="step-title">Đang giao</h4>
              </div>
              <div class="step">
                <div class="step-icon-wrap">
                  <div class="step-icon"><i class="fa fa-home"></i></div>
                </div>
                <h4 class="step-title">Đã giao</h4>
              </div>
              <div class="step">
                <div class="step-icon-wrap">
                  <div class="step-icon"><i class="fa fa-times"></i></div>
                </div>
                <h4 class="step-title">Hủy đơn</h4>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Main -->
      <div class="row">
        <div class="col-lg-8">
          <!-- Chi tiết -->
          <div class="card mb-3">
            <div class="card-body">

              <table class="table table-borderless">
                <tbody>
                  <tr>
                    <td>
                      <div class="d-flex">
                        <div class="flex-shrink-0">
                          <img src="image/product-1.jpg" alt="" class="img-fluid" >
                        </div>
                        <div class="flex-lg-grow-1 ms-3">
                          <h4 class="mb-0" style="font-size: 17px;"><a href="#" class="text-reset">Ớt chuông Đà Lạt</a></h4>
                          <span class="small">124 122 VND / kg</span>
                        </div>
                      </div>
                    </td>
                    <td>x1</td>
                    <td class="text-end">124 122 VND</td>
                  </tr>
                  <tr>
                    <td>
                      <div class="d-flex">
                        <div class="flex-shrink-0">
                          <img src="image/product-4.jpg" alt="" class="img-fluid" >
                        </div>
                        <div class="flex-lg-grow-1 ms-3">
                          <h4 class="mb-0" style="font-size: 17px;"><a href="#" class="text-reset">Bắp cải tím Mỹ loại 1</a></h4>
                          <span class="small">120 062 / 500 gram</span>
                        </div>
                      </div>
                    </td>
                    <td>x2</td>
                    <td class="text-end">240 124 VND</td>
                  </tr>
                </tbody>

                <tfoot>
                  <tr>
                    <td colspan="2">Tạm tính</td>
                    <td class="text-end">364 246 VND</td>
                  </tr>
                  <tr>
                    <td colspan="2">Phí ship</td>
                    <td class="text-end">20 000 VND</td>
                  </tr>
                  <tr>
                    <td colspan="2">Mã giảm giá (Code: CP10K)</td>
                    <td class="text-danger text-end">-10 000 VND</td>
                  </tr>
                  <tr class="fw-bold">
                    <td colspan="2">Tổng tiền</td>
                    <td class="text-end">374 246 VND</td>
                  </tr>
                </tfoot>
              
              </table>
              <!-- Tong tien -->
            </div>
          </div>
          <!-- Thanh toán -->
          <div class="card mb-3">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <h3 class="h6">Phương thức thanh toán</h3>
                  <p>Thẻ tín dụng <br>
                    Tổng: 374 246 VND <span class="badge bg-success rounded-pill">PAID</span></p>
                </div>
                <div class="col-lg-6">
                  <h3 class="h6">Địa chỉ nhận hàng</h3>
                  <address>
                    <strong>Phạm Linh</strong><br>
                    23 Hoàn Kiếm, Hai Bà Trưng<br>
                    Tòa nhà 1-2 Hồ Gươm<br>
                    Số điện thoại: 0321 999 999
                  </address>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <!-- Ghi chú -->
          <div class="card mb-3">
            <div class="card-body">
              <h3 class="h6">Ghi chú</h3>
              <p>Giao hàng trong khoảng từ 13h - 17h hàng ngày. Sản phẩm tươi mới, không bị héo úa hoặc hỏng.</p>
            </div>
          </div>
          <div class="card mb-3">
            <!-- Thông tin vận chuyển -->
            <div class="card-body">
              <h3 class="h6">Thông tin vận chuyển</h3>
              <strong>Eco Express</strong> <br>
              <span>Mã vận đơn: <a href="#" class="text-decoration-underline" target="_blank">FF1234567890</a> <i
                  class="bi bi-box-arrow-up-right"></i> </span>
              <hr>
              <h3 class="h6">Thông tin người giao hàng</h3>
              <address>
                <strong>Nguyễn Tiến Bình</strong><br>
                149 Văn Quán, Hà Đông<br>
                Tòa nhà A3, khu H<br>
                Liên hệ: 0841 126 899
              </address>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('footer');