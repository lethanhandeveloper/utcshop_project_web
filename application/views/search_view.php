<!DOCTYPE html>
<html>
<head>
	<title>Đăng nhập</title>
</head>
<body>
	<div class="wrap-content container border shadow">
		<?php include_once "header.php"; ?>
		
		<div class="content">
			<div class="newproduct-title alert alert-danger w-100 text-center font-weight-bold" role="alert">
				<span class="font-weight-bold">Có <?php echo count($products)  ?>  kết quả tìm kiếm cho từ khóa:</span><?=  $content   ?>
			</div>
			<div class="mx-3 my-3">
				<span class="font-weight-bold">Chọn mức giá:</span>
				<form>
					<a href="<?php echo base_url(); ?>product/search?content=<?= $_GET['content'] ?>&price=1" class="badge badge-secondary text-light">Dưới 1 Triệu</a>
					<a href="<?php echo base_url(); ?>product/search?content=<?= $_GET['content'] ?>&price=2" class="badge badge-secondary text-light">1 Triệu-3 Triệu</a>
					<a href="<?php echo base_url(); ?>product/search?content=<?= $_GET['content'] ?>&price=3" class="badge badge-secondary text-light">3 Triệu-5 Triệu</a>
					<a href="<?php echo base_url(); ?>product/search?content=<?= $_GET['content'] ?>&price=4" class="badge badge-secondary text-light">5 Triệu-8 Triệu</a>
					<a href="<?php echo base_url(); ?>product/search?content=<?= $_GET['content'] ?>&price=5" class="badge badge-secondary text-light">8 Triệu-10 Triệu</a>
					<a href="<?php echo base_url(); ?>product/search?content=<?= $_GET['content'] ?>&price=6" class="badge badge-secondary text-light">Trên 10 Triệu</a>
				</form>
			</div>
			<div class="content mb-3">
				<div class="row">

					<?php foreach ($products as $key => $value): ?>
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
				<?php if(count($products)==0) echo "<h4><center>Sản phẩm bạn tìm kiếm không tồn tại</center></h4>";   ?>
			</div>
			
			</div>
		</div>

	</div>	
	<?php include_once "footer.php"; ?>
</body>
</html>