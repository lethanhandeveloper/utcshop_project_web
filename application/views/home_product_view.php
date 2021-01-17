<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="wrap-content container border shadow">
		<?php include("header.php") ?>
		<div class="row mx-3">
			<?php foreach ($categories as $key =>$value): ?>
				<div class="col-md-2 col-sm-3 col-3 border">
					<a href="<?php echo base_url(); ?>product/viewbycategory/<?= $category_type  ?>/<?= $value['id'] ?>/1">
						<img src="<?php echo base_url(); ?>img/category/<?= $value['image'] ?>" alt="" class="img-fluid">

					</a>
					<div class="d-block font-weight-bold text-center">
						<?php if($category_type==2) echo $value['name'];  ?>
					</div>
				</div>
			<?php endforeach ?>
		</div>
		<div class="filter-bar row border-bottom mt-3 mx-2 font-weight-bold">
			
		</div>
		<div class="topsell-title alert alert-danger w-100 text-center font-weight-bold text-uppercase" role="alert">
			<sup><img src="<?php echo base_url() ?>img/new.gif"></sup>
			<?php 
				if($category_type==1) echo "điện thoại mới"; else echo "phụ kiện mới";
			 ?>
			 <sup><img src="<?php echo base_url() ?>img/new.gif"></sup>
		</div>
		<div class="topsell-content">
			<div class="row row-e">
				<?php foreach ($new_products as $value): ?>
					<div class="col-md-3 col-sm-4 col-6">
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
										<span class="text-danger"><?= number_format($value['price']-($value['price']*$value['discount']/100)) ?></span>
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

		<?php include("footer.php") ?>	
	</div>
</body>
</html>