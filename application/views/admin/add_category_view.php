<!DOCTYPE html>
<html lang="vn">

<head>
  <title>Thêm Danh Mục</title>
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
        <h2 class="mt-4 text-center text-uppercase">Thêm Danh Mục</h2>
        <?php echo form_open_multipart('admin/category/add'); ?>
        <form action="<?php echo base_url(); ?>admin/category/add" class="p-md-5 p-3" enctype="multipart/form-data" method="post">
          <div class="form-group">
            <label>Tên Danh Mục</label>
            <input type="text" class="form-control" name="name">
          </div>
          <div class="form-group">
            <label>Hình Ảnh</label>
            <input type="file" class="form-control" name="image">
          </div>
          <div class="form-group">
            <label for="inputAddress">Loại Danh Mục</label>
            <select class="form-control" name="category">
            	<option value="1">Điện Thoại</option>
            	<option value="2">Phụ Kiện</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Thêm</button>
        </form>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->
</div>
</body>
</html>