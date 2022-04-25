@include('header')
    <form action="{{url('change-pass')}}" method="POST">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="account-pass">Mật khẩu cũ</label>
                            <input class="form-control" type="password" id="account-pass">
                        </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-pass">Mật khẩu mới</label>
                        <input class="form-control" type="password" id="account-pass">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mb-7">Cập nhật mật khẩu</button>
        </form>
@include('footer')