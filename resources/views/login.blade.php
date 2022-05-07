@include('header')


	{{-- <section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Đăng nhập tài khoản</h2>
						<form action="{{URL('/login-user')}}" method="POST">
							{{csrf_field()}}
							<input type="text" name="email" placeholder="Tài khoản" />
							<input type="password" name="password" placeholder="Mật khẩu" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Ghi nhớ đăng nhập
							</span>
							<button type="submit" class="btn btn-default">Đăng nhập</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">Hoặc</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Đăng ký</h2>
						<form action="{{URL('/add-user')}}" method="POST">
							{{ csrf_field() }}
							<input type="text" name="user_name" placeholder="Họ và tên"/>
							<input type="email" name="user_email" placeholder="Địa chỉ email"/>
							<input type="password" name="user_password" placeholder="Mật khẩu"/>
							<input type="text" name="user_phone" placeholder="Số điện thoại"/>
							<button type="submit" class="btn btn-default">Đăng ký</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form--> --}}
    
	<div class="wrapper" style="background-image: url('images/bg-registration-form-3.jpg');">  
        <div class="form-modal">

            <div class="form-toggle">
                <button id="login-toggle" onclick="toggleLogin()">đăng nhập</button>
                <button id="signup-toggle" onclick="toggleSignup()">đăng ký</button>
            </div>

            <div id="login-form">
                <form action="{{URL('/login')}}" method="post">
					{{csrf_field()}}
                    <input type="text" name="email" placeholder="Email" />
                    <input type="password" name="password" placeholder="Mật khẩu" />
                    <span class="remember" >
                        <input type="checkbox" class="checkbox" checked>
                        <label for="remember-me">Ghi nhớ đăng nhập</label>
                    </span>
                    <h6><a href="#">Quên mật khẩu</a></h6>
                    <button type="submit" class="btn login">Đăng nhập</button>
                </form>
            </div>

            <div id="signup-form">
                <form action="{{URL('/add-user')}}" method="POST">
					{{csrf_field()}}
                    <input type="email" name="user_email" placeholder="Email" />
					<input type="text" name="user_name" placeholder="Tên" />
                    <input type="text" name="user_phone" placeholder="Số điện thoại" />
                    <input type="text" name="user_address" placeholder="Địa chỉ" />
                    <input type="password" name="user_password" placeholder="Mật khẩu" />
                    <input type="password" placeholder="Xác nhận mật khẩu" />
                    <button type="submit" class="btn signup">Đăng ký</button>
                </form>
            </div>

        </div>
    </div>

    <script>
        function toggleSignup() {
            document.getElementById("login-toggle").style.backgroundColor = "#fff";
            document.getElementById("login-toggle").style.color = "#222";
            document.getElementById("signup-toggle").style.backgroundColor = "#57b846";
            document.getElementById("signup-toggle").style.color = "#fff";
            document.getElementById("login-form").style.display = "none";
            document.getElementById("signup-form").style.display = "block";
        }

        function toggleLogin() {
            document.getElementById("login-toggle").style.backgroundColor = "#57B846";
            document.getElementById("login-toggle").style.color = "#fff";
            document.getElementById("signup-toggle").style.backgroundColor = "#fff";
            document.getElementById("signup-toggle").style.color = "#222";
            document.getElementById("signup-form").style.display = "none";
            document.getElementById("login-form").style.display = "block";
        }

    </script>


@include('footer')