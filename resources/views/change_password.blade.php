@include('header')
@include('nav_user')
        @php
		$message = Session::get('message');
		if($message){
			echo $message;
			Session::put('message','');
		}
	    @endphp
        <form action="{{url('change-pass')}}" method="POST">
                    @csrf
                    <div>
                        <div class="form-group">
                            <label for="account-pass">Mật khẩu cũ</label>
                            <input class="form-control" name="password" type="password" >
                        </div>
                    </div>
                    <div >
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
@include('footer')