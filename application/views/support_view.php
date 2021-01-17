<!DOCTYPE html>
<html>
<head>
	<title>Hỗ trợ</title>

</head>
<body>
	<div class="wrap-content container border shadow">
		<?php include("header.php") ?>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/user.css">
		<h4 class="text-uppercase">Tin tức công nghệ</h4>
		<div class="container my-2">
			<form action="<?php echo base_url() ?>support/add" method="post">
			  <div class="form-group">
			    <label>Chủ đề</label>
			    <input type="text" class="form-control" name="title">
			  </div>
			  <div class="form-group">
			    <label>Nội dung</label>
			    <textarea rows="5" class="form-control" name="content"></textarea>
			  </div>
			  <div class="form-group">
			    <label>Tên người gửi</label>
			    <input type="text" class="form-control" name="name">
			  </div>
			  <div class="form-group">
			    <label>Điện thoại</label>	
			    <input type="text" class="form-control" name="phone">
			  </div>
			  <div class="form-group">
			    <label>Email</label>
			    <input type="text" class="form-control" name="email">
			  </div>
			  <button type="submit" class="btn btn-primary">Gửi</button>
			</form>
		</div>
	</div>
	<?php include("footer.php") ?>	
</body>
</html>