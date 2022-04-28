@include('header')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Contact Us</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>Contact Us</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Contact Section Begin -->
<section class="contact spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_phone"></span>
                    <h4>Phone</h4>
                    <p>+01-3-8888-6868</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_pin_alt"></span>
                    <h4>Address</h4>
                    <p>60-49 Road 11378 New York</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_clock_alt"></span>
                    <h4>Open time</h4>
                    <p>10:00 am to 23:00 pm</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_mail_alt"></span>
                    <h4>Email</h4>
                    <p>hello@colorlib.com</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->
{{-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d59602.19157607468!2d105.79381835!3d20.9871458!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1649767186611!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
<!-- Map Begin -->
<div class="map">
    <iframe
    
        src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d59602.19157607468!2d105.79381835!3d20.9871458!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1649767186611!5m2!1svi!2s"
        height="500" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    <div class="map-inside">
        <i class="icon_pin"></i>
        <div class="inside-widget">
            <h4>Hà Nội</h4>
            <ul>
                <li>Điện thoại: 0999 999 999</li>
                <li>Đại học công nghệ - Đại học quốc gia Hà Nội</li>
            </ul>
        </div>
    </div>
</div>
<!-- Map End -->

<!-- Contact Form Begin -->
<div class="contact-form spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact__form__title">
                    <h2>Gửi khiếu nại</h2>
                </div>
            </div>
        </div>
        <form action="{{url('/send-feedback')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <input type="text" name="name" placeholder="Nhập tên của bạn">
                </div>
                <div class="col-lg-6 col-md-6">
                    <input type="text" name="email" placeholder="Nhập địa chỉ email">
                </div>
                <div class="col-lg-6 col-md-6">
                    <input type="text" name="phone" placeholder="Nhập số điện thoại">
                </div>
                <div class="col-lg-6 col-md-6">
                    <input type="text" name="order_id" placeholder="Nhập mã đơn hàng cần hỗ trợ">
                </div>
                <div class="col-lg-12 text-center">
                    <textarea rows="7" name="feedback" placeholder="Nhập ý kiến của bạn"></textarea>
                    <button type="submit" class="site-btn">Gửi yêu cầu</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Contact Form End -->
@include('footer')