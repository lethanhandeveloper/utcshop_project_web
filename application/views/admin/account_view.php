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
        <h2 class="mt-4 text-center text-uppercase">Danh Sách Tài Khoản Người Dùng</h2>
        <a href="<?= base_url() ?>admin/account/add_account" class="btn btn-primary m-3 float-right">Thêm Tài Khoản</a>
        <table class="table table-bordered table-sm">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Số TT</th>
              <th scope="col">Tên Người Dùng</th>
              <th scope="col">Tên Tài Khoản</th>
              <th scope="col">Ngày Sinh</th>
              <th scope="col">Giới Tính</th>
              <th>Quyền</th>
              <th scope="col" style="width: 10%">Thao Tác</th>
            </tr>
          </thead>
          <tbody>
            <?php $stt=1; ?>
            <?php foreach ($accounts as $value): ?>
            <tr>
              <th scope="row"><?= $stt++ ?></th>
              <td><?= $value['name'] ?></td>
              <td><?= $value['username'] ?></td>
              <td><?= $value['date_of_birth'] ?></td>
              <td><?= $value['gender'] ?></td>
              <td><?php if($value['gender']) echo "Quản trị"; else echo "Khách Hàng"; ?></td>
              <td>
                 <a href="<?php echo base_url() ?>admin/account/delete/<?= $value['id'] ?>" class="btn btn-danger mb-md-0 mb-2">Xóa</a>
                 <a href="<?php echo base_url() ?>admin/account/edit_account/<?= $value['id'] ?>" class="btn btn-success">Sửa</a>
              </td>
              </td>
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