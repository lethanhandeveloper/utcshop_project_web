<!DOCTYPE html>
<html lang="vn">

<head>
  <title>Thêm Tin Tức</title>
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
        <h2 class="mt-4 text-center text-uppercase">Thêm Tin Tức</h2>
        <form action="<?php echo base_url(); ?>admin/news/add" class="p-md-5 p-3" enctype="multipart/form-data" method="post">
          <div class="form-group">
            <label>Tiêu đề</label>
            <input type="text" class="form-control" name="title">
          </div>
          <div class="form-group">
            <label>Nội dung ngắn</label>
            <textarea cols="3" class="form-control" name="short_content"></textarea>
          </div>
           <div class="form-group">
            <label>Nội dung chi tiết</label>
            <textarea cols="5" class="form-control" name="content"></textarea>
          </div>
           <div class="form-group">
            <label>Hình ảnh</label>
            <input type="file" name="image" class="form-control">
          </div>
           <div class="form-group">
            <label>Tác giả</label>
            <input type="text" name="author" class="form-control">
          </div>
          <button type="submit" class="btn btn-primary">Thêm</button>
        </form>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->
</div>
<script>
  CKEDITOR.replace('content', {
      filebrowserBrowseUrl: 'ckeditor/ckfinder/ckfinder.html',
      filebrowserImageBrowseUrl: 'ckfinder/ckfinder.html?Type=Images'
    });
</script> 
</body>
</html>