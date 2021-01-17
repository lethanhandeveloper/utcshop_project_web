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
        <h2 class="mt-4 text-center text-uppercase">Danh Sách Thông Tin Hỗ Trợ</h2>
        <table class="table table-bordered table-sm">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Số TT</th>
              <th scope="col">Tiêu đề</th>
              <th scope="col">Nội dung hỗ trợ</th>
              <th scope="col">Tên</th>
              <th>Điện thoại</th>
              <th scope="col">Email</th>
              <th scope="col">Ngày gửi</th>
            </tr>
          </thead>
          <tbody>
            <?php $stt=1; ?>
            <?php foreach ($supports as $value): ?>
            <tr>
              <th scope="row"><?= $stt++ ?></th>
              <td><?= $value['title'] ?></td>
              <td><?= $value['content'] ?></td>
              <td><?= $value['name'] ?></td>
              <td><?= $value['phone'] ?></td>
              <td><?= $value['email'] ?></td>
              <td><?= $value['date'] ?></td>
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