<!DOCTYPE html>
<html lang="vn">

<head>
  <title>Thêm Tài Khoản Người Dùng</title>
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
        <h2 class="mt-4 text-center text-uppercase">Thêm Tài Khoản Người Dùng</h2>
        <form action="<?php echo base_url(); ?>admin/account/add" class="p-md-5 p-3" method="post">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="username">Tên đăng nhập</label>
              <input type="text" class="form-control" name="username">
            </div>
            <div class="form-group col-md-6">
              <label for="password">Mật khẩu</label>
              <input type="text" class="form-control" name="password" placeholder="Nhập mật khẩu..">
            </div>
          </div>
          <div class="form-group">
            <label for="name">Họ tên</label>
            <input type="text" class="form-control" name="name">
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="date">Ngày sinh</label>
              <input type="date" class="form-control" name="date">
            </div>
            <div class="form-group col-md-6">
              <label for="gender">Giới tính</label>
              <select name="gender" class="form-control">
                <option value="Nam">Nam</option>
                <option value="Nữ">Nữ</option>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="phone">Điện thoại</label>
              <input type="phone" class="form-control" name="phone">
            </div>
            <div class="form-group col-md-4">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email">
            </div>  
            <div class="form-group col-md-4">
              <label for="email">Quyền</label>
              <select name="role" class="form-control">
                <option value="0">Người dùng</option>
                <option value="1">Quản trị</option>
              </select>
            </div>  
          </div>
          <div class="form-group">
            <label for="address">Địa chỉ</label>
            <textarea class="form-control" name="address" rows="4"></textarea>
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