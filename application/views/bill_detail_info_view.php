<?php
	$stt = 1;
	$total_money = 0;
?>
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
				<li class="breadcrumb-item active" aria-current="page"><a href="<?php echo base_url(); ?>account/bill_info">Thông tin đơn hàng</a></li>
				<li class="breadcrumb-item active" aria-current="page"><a href="<?php echo base_url(); ?>account/detail_bill/<?= $id ?>">Chi tiết đơn hàng #<?= $id ?></a></li>
			</ol>
		</nav>
		<h4 class="ml-1 font-weight-bold border-bottom">THÔNG TIN CHI TIẾT ĐƠN HÀNG #<?= $id ?></h4>
		<table class="table table-bordered table-sm">
			<thead class="thead-dark">
				<tr>
					<th scope="col">STT</th>
					<th scope="col">Tên sản phẩm</th>
					<th scope="col">Số lượng</th>
					<th scope="col">Giá</th>
					<th scope="col">Thành tiền</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($detail_bills as $value): ?>
				<tr>

					<?php  $total_money+=($value['price']-($value['price']*$value['discount'])/100)*$value['quantity'];  ?>
					<th scope="row"><?= $stt++; ?></th>
					<th scope="row"><?= $value['name'] ?></th>
					<td><?= $value['quantity'] ?></td>
					<td><?= number_format($value['price']-($value['price']*$value['discount'])/100) ?> Đ</td>
					<td><?= number_format(($value['price']-($value['price']*$value['discount'])/100)*$value['quantity']) ?> Đ</td>
					<!-- <td><a href="<?php echo base_url(); ?>admin/bill_detail/<?= $value['id'] ?>">Xem chi tiết</a></td> -->
					<!-- dua vao bien get chuyen qua giao dien in -->
					<?php
					$custom_name=$value['custom_name'];
					$address=$value['address'];
					$phone=$value['phone'];
					$email=$value['email'];
					$time=$value['time'];
					$method=$value['method'];
					?>
				</tr>
				<?php endforeach ?>
				<tr>
					<td colspan="6">
						<span class="font-weight-bold float-right">Tổng tiền:<span class="text-danger"><?php  echo number_format($total_money);  ?><sup>Đ</sup></span></span>
					</td>
				</tr>
			</tbody>
		</table>
		
	</div>
	<?php include("footer.php") ?>	
</body>
</html>