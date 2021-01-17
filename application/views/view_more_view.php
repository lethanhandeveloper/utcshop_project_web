<!DOCTYPE html>
<html>
<head>
	<title>Chi tiết tin tức</title>

</head>
<body>
	<div class="wrap-content container border shadow">
		<?php include("header.php") ?>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>css/user.css">
		<h4 class="text-uppercase">Tin tức công nghệ</h4>
		<?php foreach ($one_news as $key => $value): ?>
			<h5 class="text-center"><?= $value['title'] ?></h5>
			<p class="text-justify text-muted">
				<?= $value['content']  ?>
			</p>
			<p class="text-right"><b>Tác giả:</b><?=  $value['author'] ?></p>
		<?php endforeach ?>
		</div>
	</div>
	<?php include("footer.php") ?>	
</body>
</html>