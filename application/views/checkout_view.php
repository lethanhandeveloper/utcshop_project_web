<!DOCTYPE html>
<html>
<head>
	<title>Thanh toán</title>
</head>
<body>
	<div class="wrap-content container border shadow">
		<?php include("header.php") ?>
		<h4 class="text-uppercase">Thông tin thanh toán</h4>
		<div class="wrap-login-form mx-auto my-3  p-5 border-top">
			<form action="<?php echo base_url(); ?>cart/checkout_handler" method="post">
				<?php foreach ($account as $key => $value): ?>
					<div class="form-group">
						<div class="form-group">
							<label for="username">Họ tên khách hàng</label>
							<input type="text" class="form-control" name="name" value="<?= $value['name']  ?>">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-4">
							<label for="phone">Điện thoại</label>
							<input type="tel" class="form-control" name="phone" value="<?= $value['phone_number']  ?>">
						</div>
						<div class="form-group col-md-4">
							<label for="email">Email</label>
							<input type="email" class="form-control" name="email" value="<?= $value['email']  ?>">
						</div>	
						<div class="form-group col-md-4">
							<label for="method">Phương thức thanh toán</label>
							<select class="form-control" name="method">
								<option>Thanh toán trực tiếp</option>
								<option>Qua bưu điện</option>
								<option>Qua thẻ ngân hàng</option>
							</select>
						</div>	
					</div>
					<div class="form-group">
						<label for="address">Địa chỉ giao hàng</label>
						<textarea class="form-control" rows="4" name="address"><?= $value['address']  ?></textarea>
					</div>
				<?php endforeach ?>
				<button type="submit" class="btn btn-primary">Đặt hàng</button>
			</form>
		</div>
	</div>
	<?php include("footer.php") ?>	
</body>
</html>