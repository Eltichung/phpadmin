<!doctype html>
<html lang="en">
  <head>
  	<title>Đăng kí</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body class="img js-fullheight" style="background-image: url(images/bg.jpg);">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<h3 class="mb-4 text-center">Đăng kí tài khoản</h3>
		      	<form action="process_register_user.php" method="POST" id="form-login" class="signin-form">
		      		<div class="form-group">
		      			<input  name="name" type="text" class="form-control" placeholder="Họ tên" required>
		      		</div>
	            <div class="form-group">
	              <input  name="pass" id="password-field" type="password" class="form-control" placeholder="Mật khẩu" required>
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            </div>
	            <div class="form-group">
	              <input  name="phone" id="password-field" type="text" class="form-control" placeholder="Số điện thoại" required>
	            </div>
	            <div class="form-group">
	              <input  name="adress" id="password-field" type="text" class="form-control" placeholder="Địa chỉ" required>     
	            </div>
	            <div id="a1" style="display:flex; justify-content: space-between;">
					<div class="form-group" style="width: 45%;">
					<button onclick="validate()" id="btn_register" class="form-control btn btn-primary submit px-3">Đăng kí</button>
					</div>
					<div class="form-group"  style="width: 45%;">
					<button class="form-control btn btn-primary submit px-3" onclick="location.href='../account/log_in.php'">Đăng Nhập</button>
					</div>
				</div>
	          </form>
	          <p class="w-100 text-center">&mdash; Đăng nhập với &mdash;</p>
	          <div class="social d-flex text-center">
	          	<a href="#" class="px-2 py-2 mr-md-1 rounded"><span class="ion-logo-facebook mr-2"></span> Facebook</a>
	          	<a href="#" class="px-2 py-2 ml-md-1 rounded"><span class="ion-logo-twitter mr-2"></span> Twitter</a>
	          </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
  <script src="js/dangnhap.js"></script>
  <script src="./js/dangky.js"></script>

	</body>
</html>

