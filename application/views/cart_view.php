<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="wrap-content container border shadow">
		<?php include("header.php") ?>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Trang chủ</a></li>
				<li class="breadcrumb-item active" aria-current="page"><a href="<?php echo base_url(); ?>cart">Giỏ hàng</a></li>
			</ol>
		</nav>
		<h4 class="ml-1 font-weight-bold">THÔNG TIN GIỎ HÀNG</h4>
		<div class="table-responsive mb-5">
			<?php
				if(!empty($cart) or !empty($this->cart->contents())){     
			?>
			<table class="table table-bordered">
				<thead class="thead-dark">
					<tr>
						<th scope="col">Tên sản phẩm</th>
						<th scope="col">Hình ảnh</th>
						<th scope="col">Giá</th>
						<th scope="col">Số lượng</th>
						<th scope="col">Thành tiền</th>
						<th scope="col">Tùy chọn</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$count=0;
						$total_money=0;
						if(empty($_SESSION['userid'])){
						foreach ($this->cart->contents() as $key => $value) {
							$total_money+=$value['price']*$value['qty'];
					 ?>
					 <form action="<?php echo base_url() ?>cart/edit"  method="post">
						<tr>
							<input type="hidden" name="id" value="<?= $value['id']  ?>">
							<th><a href="<?php echo base_url() ?>/product/detail/<?= $value['id'] ?>"><?= $value['name'] ?></a></th>
							<td><img src="<?php echo base_url() ?>img/product/<?= $value['image'] ?>" alt="" height="50px" width="auto"></td>
							<td><?= number_format($value['price']) ?><sup>Đ</sup></td>
							<td><input type="number" name="quantity" value="<?= $value['qty'] ?>" min="1"></td>
							<td><?= number_format($value['price']*$value['qty']) ?><sup>Đ</sup></td>
							<td>
								<a href="<?php echo base_url() ?>cart/delete/<?= $value['id'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
								<button type="submit" class="btn btn-success"><i class="fa fa-edit"></i></button>
							</td>
						</tr>
					</form>
					<?php }}else{ ?>

					<?php 
						foreach ($cart as $key => $value) {
							$total_money+=$value['price']*((100-$value['discount'])/100)*$value['quantity'];
					 ?>
					 <form action="<?php echo base_url() ?>cart/edit"  method="post">
						<tr>
							<input type="hidden" name="id" value="<?= $value['product_id']  ?>">
							<th><a href="<?php echo base_url() ?>/product/detail/<?= $value['product_id'] ?>"><?= $value['name'] ?></a></th>
							<td><img src="<?php echo base_url() ?>img/product/<?= $value['image'] ?>" alt="" height="50px" width="auto"></td>
							<td><?= number_format($value['price']*((100-$value['discount'])/100)) ?><sup>Đ</sup></td>
							<td><input type="number" name="quantity" value="<?= $value['quantity'] ?>" min="1"></td>
							<td><?= number_format($value['price']*((100-$value['discount'])/100)*$value['quantity']) ?><sup>Đ</sup></td>
							<td>
								<a href="<?php echo base_url() ?>cart/delete/<?= $value['id'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
								<button type="submit" class="btn btn-success"><i class="fa fa-edit"></i></button>
							</td>
						</tr>
					</form>
					<?php }} ?>
					<tr>
						<td colspan="6">
							<span class="font-weight-bold float-right">Tổng tiền:<?php  echo number_format($total_money);  ?><sup>Đ</sup></span>
						</td>
					</tr>
				</tbody>
			</table>
			<div class="row">
				<div class="col my-2">
					<a href="<?php echo base_url() ?>cart/checkout" class="btn btn-success mx-3" style="float: right;"><i class="fas fa-money-bill-wave"></i> Thanh toán</a>
					<a href="<?php echo base_url() ?>cart/deleteAll" class="btn btn-danger mx-3" style="float: right;"><i class="fas fa-trash"></i> Xóa toàn bộ</a>
				</div>
			</div>
			<?php }else{ ?>
			<h4><center>Chưa có sản phẩm nào trong giỏ</center></h4>
			<?php } ?>
		</div>
	</div>
	<?php include("footer.php") ?>	
</body>
</html>