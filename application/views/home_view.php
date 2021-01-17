<!DOCTYPE html>
<html>
<head>
	<title>Trang chủ</title>
</head>
<body>
	<div class="wrap-content container border shadow">
		<?php include_once "header.php"; ?>
		
		<div class="content">
			<div class="row mx-1 my-2 border p-2">
				<img src="<?php echo base_url(); ?>img/banner/blackfriday.gif" alt="" class="img-fluid">
			</div>
			<div class="newproduct-title alert alert-danger w-100 text-center font-weight-bold" role="alert">
				<img src="img/new.gif">
				SẢN PHẨM MỚI NHẤT
				<img src="img/new.gif">
			</div>

			<div class="topsell-content mb-3">
				<div class="row">

					<?php foreach ($new_products as $key => $value): ?>
						<div class="col-md-3 col-6">
							<div class="product-item border m-2 p-2">
								<div class="product-thumb">
									<img src="<?php echo base_url(); ?>img/product/<?= $value['image'] ?>" alt="" class="img-fluid">
								</div>
								<div class="product-info text-center mt-2">
									<a href="<?php echo base_url(); ?>product/detail/<?= $value['id'] ?>"><?= $value['name'] ?></a>
									<div class="price-box">
										<?php if($value['discount']==0){ ?>
											<span class="text-danger"><?= number_format($value['price']) ?> Đ</span>
										<?php }else{ ?>
											<span class="text-danger"><?= number_format($value['price']-($value['price']*$value['discount'])/100) ?></span>
											<span class="text-muted"><strike><?= number_format($value['price']) ?> Đ</strike></span>
										<?php } ?>
									</div>
									<a href="<?php echo base_url(); ?>cart/insert/<?= $value['id'] ?>" class="btn btn-outline-danger"><i class="fas fa-shopping-cart"></i> Thêm vào giỏ hàng</a>
								</div>
							</div>
						</div>

					<?php endforeach ?>
				</div>
			</div>
			
			</div>
			<div class="row">
				<div class="newproduct-title alert alert-danger w-100 text-center font-weight-bold" role="alert">
					<img src="img/hot.gif">
					SẢN PHẨM BÁN CHẠY
					<img src="img/hot.gif">
				</div>
					<?php foreach ($hot_products as $key => $value): ?>
						<div class="col-md-3 col-6">
							<div class="product-item border m-2 p-2">
								<div class="product-thumb">
									<img src="<?php echo base_url(); ?>img/product/<?= $value['image'] ?>" alt="" class="img-fluid">
								</div>
								<div class="product-info text-center mt-2">
									<a href="<?php echo base_url(); ?>product/detail/<?= $value['id'] ?>"><?= $value['name'] ?></a>
									<div class="price-box">
										<?php if($value['discount']==0){ ?>
											<span class="text-danger"><?= number_format($value['price']) ?> Đ</span>
										<?php }else{ ?>
											<span class="text-danger"><?= number_format($value['price']-($value['price']*$value['discount'])/100) ?></span>
											<span class="text-muted"><strike><?= number_format($value['price']) ?> Đ</strike></span>
										<?php } ?>
									</div>
									<a href="<?php echo base_url(); ?>cart/insert/<?= $value['id'] ?>" class="btn btn-outline-danger"><i class="fas fa-shopping-cart"></i> Thêm vào giỏ hàng</a>
								</div>
							</div>
						</div>

					<?php endforeach ?>
				</div>
			</div>
		</div>

	</div>	
	<?php include_once "footer.php"; ?>
</body>
</html>