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
        <h2 class="mt-4 text-center text-uppercase">Thêm Sản Phẩm</h2>
        <form action="<?php echo base_url(); ?>admin/product/add" class="p-md-5 p-3" enctype="multipart/form-data" method="post">
          <div class="form-group">
            <label>Tên Sản Phẩm</label>
            <input type="text" class="form-control" name="name">
          </div>
          <div class="form-group">
            <label>Hình Ảnh</label>
            <input type="file" class="form-control" name="image">
          </div>
          <div class="form-group">
            <label>Mô tả</label>
            <textarea class="form-control" name="description"></textarea>
          </div>
           <div class="form-group">
            <label>Số lượng</label>
            <input type="number" name="quantity" class="form-control" value="1">
          </div>
          <div class="form-group">
            <label>Đã bán</label>
            <input type="number" name="sold" class="form-control" value="1">
          </div>
          <div class="form-group">
            <label>Giá</label>
            <input type="number" name="price" class="form-control" value="1">
          </div>
          <div class="form-group">
            <label>Giảm giá (%)</label>
            <input type="number" name="discount" class="form-control" value="1">
          </div>
          <div class="form-group">
            <label>Khuyến mãi</label>
            <input type="text" name="promotion" class="form-control" value="1">
          </div>
          <div class="form-group">
            <label>Thuộc danh mục</label>
            <select class="form-control" name="category_id">
              <?php foreach ($categories as $value): ?>
                <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Thêm</button>
        </form>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->
</div>
<script>
  CKEDITOR.replace('description', {
      filebrowserBrowseUrl: 'ckeditor/ckfinder/ckfinder.html',
      filebrowserImageBrowseUrl: 'ckfinder/ckfinder.html?Type=Images'
    });
</script>    
</body>
</html>