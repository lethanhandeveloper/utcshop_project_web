<!DOCTYPE html>
<html lang="en">

<head>
  <title>Hóa Đơn Hóa Đơn</title>
</head>

<body>
  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <?php include("sidebar.php"); ?>

    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
      <?php foreach ($detail_bills as $value): ?>
        <?php 
          $status=$value['status']; 
          $bill_id=$value['bill_id'];
        ?>
      <?php endforeach ?>
      <?php include("navigation.php"); 
      $stt=1;
      $total_money=0;
      ?>
      <div class="container-fluid">
        <h2 class="mt-4 text-center text-uppercase">Chi tiết đơn hàng</h2>
        
        <div class="alert alert-success text-uppercase font-weight-bold">Đơn hàng ở trạng thái <?=  $status ?></div>
        <div class="badge badge-info float-right">Mã đơn hàng:<?= $bill_id ?></div>
        <div class="my-2 p-2">

          <a type="button" class=" btn btn-light" href="<?php echo base_url(); ?>admin/bill/changestatus/<?= $bill_id ?>/1">Đang xử lý</a>
          <a type="button" class="text-light btn btn-primary " href="<?php echo base_url(); ?>admin/bill/changestatus/<?= $bill_id ?>/2">Đã đóng gói</a>
          <a type="button" class="text-light btn btn-warning" href="<?php echo base_url(); ?>admin/bill/changestatus/<?= $bill_id ?>/3">Đang vận chuyển</a>
          <a type="button" class="text-light btn btn-success" href="<?php echo base_url(); ?>admin/bill/changestatus/<?= $bill_id ?>/4">Đã giao hàng</a>
          <a type="button" class="text-light btn btn-dark" href="<?php echo base_url(); ?>admin/bill/changestatus/<?= $bill_id ?>/0">Hủy đơn hàng</a>
        </div>
        <table class="table table-bordered table-sm">
          <thead class="thead-dark">
            <tr>
              <th scope="col">STT</th>
              <th scope="col">Tên sản phẩm</th>
              <th scope="col">Số lượng</th>
              <th scope="col">Giá</th>
              <th scope="col">Thành tiền</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($detail_bills as $value): ?>
              <tr>

                <?php  $total_money+=($value['price']-($value['price']*$value['discount'])/100)*$value['quantity'];  ?>
                <th scope="row"><?= $stt++; ?></th>
                <th scope="row"><?= $value['name'] ?></th>
                <td><?= $value['quantity'] ?></td>
                <td><?= number_format($value['price']-($value['price']*$value['discount'])/100) ?> Đ</td>
                <td><?= number_format(($value['price']-($value['price']*$value['discount'])/100)*$value['quantity']) ?> Đ</td>
                <!-- <td><a href="<?php echo base_url(); ?>admin/bill_detail/<?= $value['id'] ?>">Xem chi tiết</a></td> -->
                <!-- dua vao bien get chuyen qua giao dien in -->
                <?php
                      $custom_name=$value['custom_name'];
                      $address=$value['address'];
                      $phone=$value['phone'];
                      $email=$value['email'];
                      $time=$value['time'];
                      $method=$value['method'];
                ?>
              </tr>
            <?php endforeach ?>
            <tr>
              <td colspan="6">
                <span class="font-weight-bold float-right">Tổng tiền:<span class="text-danger"><?php  echo number_format($total_money);  ?><sup>Đ</sup></span></span>
              </td>
            </tr>
          </tbody>
        </table>
        
        <a href="<?php echo base_url(); ?>admin/bill/print?id=<?= $bill_id ?>&custom_name=<?= $custom_name ?>&address=<?= $address ?>
        &phone=<?= $phone ?>&email=<?= $email ?>&time=<?= $time ?>&method=<?= $method ?>" class="float-right btn btn-secondary">In hóa đơn</a>
      </div>
      <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
  </div>
</body>
</html>