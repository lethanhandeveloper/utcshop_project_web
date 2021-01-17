<!DOCTYPE html>
<html>
<head>
	<title>Đăng ký</title>
</head>
<body>
	<div class="wrap-content container border shadow">
		<?php include("header.php") ?>
		<h4 class="text-uppercase">Đăng ký</h4>
		<div class="row border-top">
			<div class="col-md-3 p-3 d-md-block d-none">
				<img src="<?php echo base_url(); ?>img/logo.png" class="img-fluid">
			</div>
			<div class="col-md-9">

				<div class="wrap-login-form mx-auto my-3  p-5">
					<form action="<?php echo base_url(); ?>account/new_register" method="post">
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="username">Tên đăng nhập</label>
								<input type="text" class="form-control" name="username" placeholder="lethanhan1234...">
							</div>
							<div class="form-group col-md-6">
								<label for="password">Mật khẩu</label>
								<input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu..">
							</div>
						</div>
						<div class="form-group">
							<label for="name">Họ tên</label>
							<input type="text" class="form-control" name="name" placeholder="Lê Thành An...">
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="date">Ngày sinh</label>
								<input type="date" class="form-control" name="date">
							</div>
							<div class="form-group col-md-6">
								<label for="gender">Giới tính</label>
								<select name="gender" class="form-control">
									<option value="Nam">Nam</option>
									<option value="Nữ">Nữ</option>
								</select>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="phone">Điện thoại</label>
								<input type="phone" class="form-control" name="phone">
							</div>
							<div class="form-group col-md-6">
								<label for="email">Email</label>
								<input type="email" class="form-control" name="email">
							</div>	
						</div>
						<div class="form-group">
							<label for="address">Địa chỉ</label>
							<textarea class="form-control" name="address" rows="4"></textarea>
						</div>
						<p class="font-weight-bold">Bạn đã có tài khoản? <a href="<?php echo base_url(); ?>account">Đăng nhập ngay</a></p>
						<button type="submit" class="btn btn-primary">Đăng ký</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php include("footer.php") ?>	
</body>
</html>