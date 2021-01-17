<!DOCTYPE html>
<html lang="vn">

<head>
  <title>Sửa sản phẩm</title>
</head>

<body>
  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <?php include("sidebar.php"); ?>

    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
      <?php include("navigation.php"); ?>
      <?php foreach ($products as $key => $product): ?>
        <div class="container-fluid">
          <h2 class="mt-4 text-center text-uppercase">Sửa Sản Phẩm</h2>

          <form action="<?php echo base_url(); ?>admin/product/update" class="p-md-5 p-3" enctype="multipart/form-data" method="post">
            <input type="hidden" name="id" value="<?= $product['id']  ?>">
            <div class="form-group">
              <label>Tên Sản Phẩm</label>
              <input type="text" class="form-control" name="name" value="<?= $product['name']  ?>">
            </div>
            <div class="form-group">
              <label>Hình Ảnh</label>
              <img src="<?php echo base_url(); ?>img/product/<?= $product['image'] ?>" class="img-fluid d-block m-2" style="width: 10%">
              <input type="hidden" name="old-image" value="<?= $product['image']  ?>">
              <input type="file" class="form-control" name="image">
            </div>
            <div class="form-group">
              <label>Mô tả</label>
              <textarea class="form-control" name="description" value="<?= $product['description']  ?>"></textarea>
            </div>
            <div class="form-group">
              <label>Số lượng</label>
              <input type="number" name="quantity" class="form-control" value="<?= $product['quantity']  ?>">
            </div>
            <div class="form-group">
              <label>Đã bán</label>
              <input type="number" name="sold" class="form-control" value="<?= $product['sold']  ?>">
            </div>
            <div class="form-group">
              <label>Giá</label>
              <input type="number" name="price" class="form-control" value="<?= $product['price']  ?>">
            </div>
            <div class="form-group">
              <label>Giảm giá (%)</label>
              <input type="number" name="discount" class="form-control" value="<?= $product['discount']  ?>">
            </div>
            <div class="form-group">
              <label>Khuyến mãi</label>
              <input type="text" name="promotion" class="form-control" value="<?= $product['promotion']  ?>">
            </div>
            <div class="form-group">
              <label>Thuộc danh mục</label>
              <select class="form-control" name="category_id">
                <?php foreach ($categories as $key=> $category): ?>
                  <option value="<?= $category['id'] ?>" <?php if($category['id']==$product['category_id']) echo "selected";   ?>> <?= $category['name'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
          <?php endforeach ?>
          <button type="submit" class="btn btn-primary">Lưu lại</button>
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