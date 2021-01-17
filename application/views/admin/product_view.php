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
        <h2 class="mt-4 text-center text-uppercase">Danh Sách Sản Phẩm</h2>
        <a href="<?= base_url() ?>admin/product/add_product" class="btn btn-primary m-3 float-right">Thêm Sản Phẩm</a>
        <div class="table-responsive">
        <table class="table table-bordered table-sm w-auto small">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Số TT</th>
              <th scope="col">Tên Sản Phẩm</th>
              <th scope="col">Hình Ảnh</th>
              <th scope="col">Số lượng</th>
              <th scope="col">Đã bán</th>
              <th scope="col">Giá</th>
              <th scope="col">Thuộc danh mục</th>
              <th scope="col" style="width: 10%" class="text-center">Thao Tác</th>
            </tr>
          </thead>
          <tbody>
            <?php $stt=1; ?>
            <?php foreach ($products as $value): ?>
            <tr>
              <th scope="row"><?= $stt++ ?></th>
              <td>
                <?= $value['name'] ?>
              </td>
              <td><img src="<?php echo base_url() ?>img/product/<?= $value['image'] ?>"  class="d-block img-fluid" style="width: 30%"></td>
              <td><?= $value['quantity'] ?></td>
              <td><?= $value['sold'] ?></td>
              <td><?= number_format($value['price']) ?> VNĐ</td>
              <td><?= $value['category_name'] ?></td>
              <td>
                <a href="<?php echo base_url() ?>admin/product/delete?id=<?= $value['id'] ?>" class="btn btn-danger mb-md-0 mb-2">Xóa</a>
                <a href="<?php echo base_url() ?>admin/product/edit_product?id=<?= $value['id'] ?>" class="btn btn-success">Sửa</a>
              </td>
            </tr>
            <?php endforeach ?>
          </tbody>
        </table>
        </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->
</div>
</body>
</html>