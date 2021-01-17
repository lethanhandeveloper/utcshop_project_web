<!DOCTYPE html>
<html lang="vn">

<head>
  <title>Sửa Danh Mục</title>
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
        <h2 class="mt-4 text-center text-uppercase">Sửa Danh Mục</h2>
        <form action="<?php echo base_url(); ?>admin/category/edit" class="p-md-5 p-3" enctype="multipart/form-data" method="post">
          <?php foreach ($category as $value): ?>
          <input type="hidden" name="id" value="<?= $value['id'] ?>">
          <input type="hidden" name="old-image" value="<?= $value['image'] ?>">
          <div class="form-group">
            <label>Tên Danh Mục</label>
            <input type="text" class="form-control" name="name" value="<?= $value['name'] ?>">
          </div>
          <div class="form-group">
            <label>Hình Ảnh</label>
            <img src="<?php echo base_url(); ?>img/category/<?= $value['image'] ?> " class="img-fluid d-block" style="width: 100px;height: auto;">
            <input type="file" class="form-control" name="image">
          </div>
          <div class="form-group">
            <label>Loại Danh Mục</label>
            <select class="form-control" name="level">
              <option value="1" <?php if($value['level']){echo "selected";} ?> >Điện Thoại</option>
              <option value="2">Phụ Kiện</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Lưu lại</button>
          <?php endforeach ?>
        </form>
    </div>
    <!-- /#page-content-wrapper -->
  </div>
  <!-- /#wrapper -->
</div>
</body>
</html>