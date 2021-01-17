<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="wrap-content container border shadow">
		<?php include("header.php") ?>
		<div class="row mx-1">
			<?php include("category_list.php") ?>
		</div>
		<div class="filter-bar row border-bottom mt-3 mx-2 font-weight-bold">
			<!-- <?php
				echo '<pre>';
				var_dump($products);
				echo '</pre>';
				
			?> -->
		</div>
		<?php foreach ($current_category as $value): ?>
			<div class="topsell-title alert alert-danger w-100 text-center font-weight-bold text-uppercase" role="alert">
				<?= $value['name'] ?>
			</div>
		<?php endforeach ?>
		<div class="topsell-content">
			<div class="row row-e">
				<?php foreach ($products as $value): ?>
					<div class="col-md-3 col-6">
						<div class="product-item border m-2 p-2">
							<div class="product-thumb">
								<img src="<?php echo base_url(); ?>img/product/<?= $value['image'] ?>" alt="" class="img-fluid">
							</div>
							<div class="product-info text-center mt-2">
								<a href="<?php echo base_url(); ?>product/detail/<?= $value['id'] ?>"><?= $value['name'] ?></a>
								<div class="price-box">
									<?php if($value['discount']==0){ ?>
										<span class="text-danger"><?= number_format($value['price']) ?> <sup>Đ</sup></span>
									<?php }else{ ?>
										<span class="text-danger"><?= number_format($value['price']-($value['price']*$value['discount'])/100) ?> <sup>Đ</sup></span>
										<span class="text-muted"><strike><?= number_format($value['price']) ?> <sup>Đ</sup></strike></span>
									<?php } ?>
								</div>
								<a href="<?php echo base_url(); ?>cart/insert/<?= $value['id'] ?>" class="btn btn-outline-danger"><i class="fas fa-shopping-cart"></i> Thêm vào giỏ hàng</a>
							</div>
						</div>
					</div>
				<?php endforeach ?>
				<?php  if(count($products)==0){   ?>
					<h4 class="text-center text-uppercase m-auto">Chưa có sản phẩm nào thuộc danh mục này</h4>
				<?php  }   ?>
			</div>
		</div>
		<?php if($page_total>0){  ?>
		<nav class="pagination justify-content-center mt-2">
			<ul class="pagination">
				<li class="page-item <?php  if($current_page==1) echo "disabled";    ?>">
					<a class="page-link" href="<?php echo base_url(); ?>product/viewbycategory/<?= $category_type  ?>/<?= $category_id ?>/<?php echo $current_page-1; ?>" tabindex="-1">Trước</a>
				</li>

				<?php for($i=1;$i<=$page_total;$i++){       ?>
				<li class="page-item <?php  if($i==$current_page) echo "active";    ?>">
					<a class="page-link" href="<?php echo base_url(); ?>product/viewbycategory/<?= $category_type  ?>/<?= $category_id ?>/<?php echo $i; ?>"><?= $i ?></a>
				</li>
				<?php } ?>
				<li class="page-item <?php  if($page_total==$current_page) echo "disabled";    ?>">
					<a class="page-link" href="<?php echo base_url(); ?>product/viewbycategory/<?= $category_type  ?>/<?= $category_id ?>/<?php echo $current_page+1; ?>">Sau</a>
				</li>
			</ul>
		</nav>
		<?php  } ?>
		<?php include("footer.php") ?>	
	</div>
</body>
</html>