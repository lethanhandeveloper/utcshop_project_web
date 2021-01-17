  <!DOCTYPE html>
  <html lang="en">

  <head>
    <title>Danh Sách Tài Khoản Người Dùng</title>
  </head>

  <body>
    <div class="d-flex" id="wrapper">

      <!-- Sidebar -->
      <?php include("sidebar.php"); ?>

      <!-- /#sidebar-wrapper -->

      <!-- Page Content -->
      <div id="page-content-wrapper">
        <?php include("navigation.php"); ?>
        <div class="container-fluid">
          <h2 class="mt-4 text-center text-uppercase">Thống kê doanh thu</h2>
          <?php
              if($selected==1){
          ?>
            <i class="text-danger">Các đơn hàng thành công hôm nay</i>
          <?php }else{ ?>
            <i class="text-danger">Các đơn hàng thành công trong 30 ngày qua</i>
          <?php } ?>
          <form class="form-inline" action="<?php echo base_url(); ?>admin/statistic/statistic_by_criteria" method="GET" >
            <div class="input-group">
              <select class="custom-select" name="criteria">
                <option selected>Chọn tiêu chí thống kê</option>
                <option value="1">Ngày hôm nay</option>
                <option value="2">Trong 30 ngày qua</option>
              </select>
              <button type="submit" class="btn btn-default mb-2 ml-2">OK</button>
            </div>
          </form>
          <div class="row">
            <div class="col-md-3 col-xs-4 col-6">
              <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title"><i class="far fa-chart-bar"></i></h5>
                  <b class="card-text">Tổng doanh thu: <?= number_format($profit) ?><sup>Đ</sup></b>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-xs-4 col-6">
              <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title"><i class="fas fa-shopping-cart"></i></h5>
                  <b class="card-text">Đơn hàng thành công: <?php  echo count($bills);   ?></b>
                </div>
              </div>
            </div>
          </div>
          <div class="card border-dark mb-3">
            <div class="card-header">Danh sách các đơn hàng thành công</div>
            <div class="card-body text-dark">
              <table class="table table-bordered table-sm">
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
                    <td><?= $value['status'] ?></td>
                    <td><a href="<?php echo base_url(); ?>admin/bill/bill_detail/<?= $value['id'] ?>">Xem chi tiết</a></td>
                  </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
  </div>
</body>
</html>