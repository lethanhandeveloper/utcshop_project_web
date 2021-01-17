<!DOCTYPE html>
<html>
<head>
	<title>Đăng nhập</title>
</head>
<body>
	<div class="wrap-content container border shadow">
		<?php include("header.php") ?>
		<h4 class="text-uppercase">Đăng nhập</h4>
		<div class="row border-top">
		<div class="col-md-3 p-3 d-md-block d-none">
			<img src="<?php echo base_url(); ?>img/logo.png" class="img-fluid">
		</div>
		<div class="col-md-9">
			
			<div class="wrap-login-form mx-auto my-3  p-5">
				<form action="account/login" method="post">
					<div class="form-group">
						<label for="username">Tên tài khoản</label>
						<input name="username" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Tên tài khoản...">
					</div>
					<div class="form-group">
						<label for="password">Mật khẩu</label>
						<input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Nhập Mật khẩu...">
					</div>
					<div class="form-group">
						<input type="checkbox" name="remember">
						<label for="checkbox">Ghi nhớ</label>
					</div>
					<p class="font-weight-bold">Bạn chưa có tài khoản? <a href="<?php echo base_url(); ?>account/register">Đăng ký ngay</a></p>
					<button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i>  Đăng nhập</button>
				</form>
			</div>
		</div>
		</div>
	</div>
	<?php include("footer.php") ?>	
</body>
</html>