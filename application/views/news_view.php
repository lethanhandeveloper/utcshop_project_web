<!DOCTYPE html>
<html>
<head>
	<title>Tin tức</title>

</head>
<body>
	<div class="wrap-content container border shadow">
		<?php include("header.php") ?>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/user.css">
		<h4 class="text-uppercase">Tin tức công nghệ</h4>
		<div class="container my-2">
			<div class="row row-eq-height">
				<?php foreach ($news as $key => $value): ?>
				<div class="col-md-3 col-sm-3 col-6 my-2">
					<div class="border p-3">
						<b><a href="<?php echo base_url() ?>news/view_more/<?= $value['id']  ?>" id="title-news" class=""><?= $value['title']  ?></a></b>
						<p><span class="badge badge-secondary">Ngày đăng tin:<?= $value['time']  ?></span></p>
						<img src="<?php echo base_url() ?>img/news/<?= $value['image']  ?>" class="img-fluid">
						<p class="text-justify"><b>
							<?= $value['short_content']  ?>
						</b></p>
						<p>
							<a href="<?php echo base_url() ?>news/view_more/<?= $value['id']  ?>" class="btn btn-primary"><i  class="fas fa-eye"></i> Xem thêm</a>
						</p>
					</div>
				</div>
				<?php endforeach ?>
			</div>
		</div>
	</div>
	<?php include("footer.php") ?>	
</body>
</html>