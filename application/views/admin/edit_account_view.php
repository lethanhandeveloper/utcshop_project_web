<!DOCTYPE html>
<html lang="vn">

<head>
  <title>Sửa Tài Khoản Người Dùng</title>
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
        <h2 class="mt-4 text-center text-uppercase">Sửa Tài Khoản Người Dùng</h2>
        <?php foreach ($account as $key => $value): ?>
        <form action="<?php echo base_url(); ?>admin/account/edit" class="p-md-5 p-3" method="post">
          <input type="hidden" name="id" value="<?= $value['id'] ?>">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="username">Tên đăng nhập</label>
              <input type="text" class="form-control" name="username" value="<?= $value['username'] ?>">
            </div>
            <div class="form-group col-md-6">
              <label for="password">Mật khẩu</label>
              <input type="text" class="form-control" name="password" >
            </div>
          </div>
          <div class="form-group">
            <label for="name">Họ tên</label>
            <input type="text" class="form-control" name="name" value="<?= $value['name'] ?>">
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="date">Ngày sinh</label>
              <input type="date" class="form-control" name="date" value="<?= $value['date_of_birth'] ?>">
            </div>
            <div class="form-group col-md-6">
              <label for="gender">Giới tính</label>
              <select name="gender" class="form-control">
                <option value="Nam" <?php if($value['gender']=="Nam"){ echo 'selected';} ?> >Nam</option>
                <option value="Nữ" <?php if($value['gender']=="Nữ"){ echo 'selected';} ?>>Nữ</option>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="phone">Điện thoại</label>
              <input type="phone" class="form-control" name="phone" value="<?= $value['phone_number'] ?>">
            </div>
            <div class="form-group col-md-4">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email" value="<?= $value['email'] ?>">
            </div>  
            <div class="form-group col-md-4">
              <label for="role">Quyền</label>
              <select name="role" class="form-control">
                <option value="0" <?php if($value['role']==0){ echo 'selected';} ?> >Người dùng</option>
                <option value="1" <?php if($value['role']==1){ echo 'selected';} ?> >Quản trị</option>
              </select>
            </div>  
          </div>
          <div class="form-group">
            <label for="address">Địa chỉ</label>
            <textarea class="form-control" name="address" rows="4"><?= $value['address'] ?></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Lưu lại</button>
        </form>
        <?php endforeach ?>
      </div>
      <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
  </div>
</body>
</html>