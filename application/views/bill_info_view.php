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
			</ol>
		</nav>
		<h4 class="ml-1 font-weight-bold border-bottom">THÔNG TIN ĐƠN HÀNG</h4>
		<!-- <nav>
			<div class="nav nav-tabs" id="nav-tab" role="tablist">
				<a class="nav-item nav-link active" id="#tab1" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="true">Xl</a>
				<a class="nav-item nav-link" id="#tab2" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false">V</a>
				<a class="nav-item nav-link" id="#tab3" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab3" aria-selected="false">X</a>
			</div>
		</nav>
		<div class="tab-content" id="nav-tabContent">
			<div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1">1</div>
			<div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2">2</div>
			<div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab3">3</div>
		</div> -->
		<table class="table table-bordered table-sm table-responsive">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Mã Hóa Đơn</th>
              <th scope="col">Tên khách hàng</th>
              <th scope="col">Địa chỉ</th>
              <th scope="col">Điện thoại</th>
              <th scope="col">Email</th>
              <th scope="col">Trạng thái</th>
              <th scope="col" style="width: 10%">Thao Tác</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($bills as $value): ?>
            <tr>
              <th scope="row"><?= $value['id'] ?></th>
              <th scope="row"><?= $value['name'] ?></th>
              <td><?= $value['address'] ?></td>
              <td><?= $value['phone'] ?></td>
              <td><?= $value['email'] ?></td>
              <td><span class="badge badge-pill badge-secondary"><?= $value['status'] ?></span></td>
              <td><a href="<?php echo base_url(); ?>account/detail_bill/<?= $value['id'] ?>">Xem chi tiết</a></td>
            </tr>
            <?php endforeach ?>
          </tbody>
        </table>
		
	</div>
	<?php include("footer.php") ?>	
</body>
</html>