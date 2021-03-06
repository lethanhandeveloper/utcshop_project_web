<!DOCTYPE html>
<html lang="en">

<head>
  <title>Danh Mục Sản Phẩm</title>
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
        <h2 class="mt-4 text-center text-uppercase">Danh Sách Danh Mục</h2>
        <a href="<?= base_url() ?>admin/category/add_category" class="btn btn-primary m-3 float-right">Thêm Danh Mục</a>
        <table class="table table-bordered table-sm">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Số TT</th>
              <th scope="col">Tên Danh Mục</th>
              <th scope="col">Hình Ảnh</th>
              <th scope="col">Loại Danh Mục</th>
              <th scope="col" style="width: 10%">Thao Tác</th>
            </tr>
          </thead>
          <tbody>
            <?php $stt=1; ?>
            <?php foreach ($categories as $value): ?>
            <tr>
              <th scope="row"><?= $stt++ ?></th>
              <td><?= $value['name'] ?></td>
              <td><img src="<?php echo base_url() ?>img/category/<?= $value['image'] ?>" style="width: 100px"></td>
              <td><?php if($value['level']=="1") echo "Điện thoại"; else echo "Phụ kiện"; ?></td>
              <td>
                <a href="<?php echo base_url() ?>admin/category/delete?id=<?= $value['id'] ?>" class="btn btn-danger mb-md-0 mb-2">Xóa</a>
                <a href="<?php echo base_url() ?>admin/category/edit_view?id=<?= $value['id'] ?>" class="btn btn-success">Sửa</a>
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