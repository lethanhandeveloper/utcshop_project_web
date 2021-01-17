<!DOCTYPE html>
<html lang="en">

<head>
  <title>Hóa Đơn Hóa Đơn</title>
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
        <h2 class="mt-4 text-center text-uppercase">Danh Sách Hóa Đơn</h2>
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
              <td><span class="badge badge-pill badge-secondary"><?= $value['status'] ?></span></td>
              <td><a href="<?php echo base_url(); ?>admin/bill/bill_detail/<?= $value['id'] ?>">Xem chi tiết</a></td>
            </tr>
            <?php endforeach ?>
          </tbody>
        </table>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->
</div>
</body>
</html>