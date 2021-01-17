<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="wrap-content container border shadow">
		<?php foreach ($product as $key => $value): ?>
			<?php 
			$id = $value['id']; 
			$name = $value['name'];
			$image = $value['image'];
			$description = $value['description'];
			$quantity = $value['quantity'];
			$sold = $value['sold'];
			$price = $value['price'];
			$discount = $value['discount'];
			$promotion = $value['promotion'];
			?>
		<?php endforeach ?>
		<?php 
		include("header.php") 
		?>
		
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Trang chủ</a></li>
				<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>phone">Điện thoại</a></li>
				<li class="breadcrumb-item active" aria-current="page"><a href="<?php echo base_url(); ?>phone/detail/<?= $id ?>"><?= $name  ?></a></li>
			</ol>
		</nav>
		<div class="row border-bottom mx-2 font-weight-bold text-uppercase" style="font-size:25px;font-family: cursive">
			<?=  $value['name'] ?>
		</div>
		<div class="total-info row mt-3 mx-2">
			<div class="thumb col-md-4 border rounded p-3">
				<img src="<?php echo base_url(); ?>img/product/<?=  $value['image'] ?>" alt="" class="img-fluid">
			</div>
			<div class="col-md-8 px-3">
				<?php if($discount==0){ ?>
					<div class="price text-danger font-weight-bold bg-light my-md-0 my-3 p-2"><?=  number_format($price) ?><sup>Đ</sup></div>
				<?php }else{ ?>
					<div class="price text-danger font-weight-bold bg-light my-md-0 my-3 p-2"><?=  number_format($price-(100-$discount/100)) ?><sup>Đ</sup></div>
					<strike class="text-muted mx-1"><?=  number_format($price) ?><sup>Đ</sup></strike>
				<?php } ?>
				<div class="font-weight-bold">Số sản phẩm còn trong kho:
					<?php 
						if(($quantity-$sold>0) and $quantity>0) echo $quantity-$sold;
						else echo 'Hết hàng';
					?>
				</div>
				<div class="font-weight-bold">Kèm theo:</div>
				<?=  $promotion  ?>
				<input type="hidden" id="product_id" value="<?= $id ?>">
				<div class="mb-0">
					<div class="font-weight-bold mx-1">Số lượng mua: </div>
					<form class="form-inline" action="<?php echo base_url(); ?>cart/insert/<?= $id ?>" method="post">
						<div class="form-group mx-md-1 mx-sm-3 mb-2">
							<input type="number" name="quantity" value="1" min="1">
						</div>
						<button type="submit" class="btn btn-danger mb-2 d-block"><i class="fas fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
					</form>
				</div>
			</div>
		</div>
		<ul class="nav nav-pills m-3" id="pills-tab" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Mô tả & Thông số</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Bình luận</a>
			</li>
		</ul>
		<div class="tab-content border p-3" id="pills-tabContent">
			<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
				<div class="row overflow-auto">
					<div class="col-md-8 text-justify m-md-0 m-3">
						<?=  $value['description'] ?>
					</div>
				</div>
			</div>
			<div class="wrap-comment tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
				<?php foreach ($comments as $key => $value): ?>
					<div class="row">
						<div class="col-sm-3">
							<div class="review-block-name font-weight-bold"><?=  $value['name']  ?></div>
							<div class="review-block-date"><?=  $value['time']  ?></div>
						</div>
						<div class="col-sm-9">
							<div class="review-block-title"><?=  $value['title']  ?></div>
							<div class="review-block-description"><?=  $value['content']  ?></div>
						</div>
					</div>
				<?php endforeach ?>
				<?php  if(count($comments)==0) echo '<span id="none-comment-label"><b>Sản phẩm này chưa có bình luận</b></span>';     ?>
				<?php  if(empty($_SESSION['userid'])){    ?>
				<div class="text-danger my-2">Bạn phải <a href="<?php echo base_url(); ?>account">đăng nhập</a> để bình luận</div>
				<?php }else{ ?>
				<div class="form-group mt-3">
					<label for="title-comment">Tiêu đề bình luận</label>
					<input type="input" class="form-control" id="title-comment" required>
				</div>
				<div class="form-group">
					<label for="content-comment">Nội dung</label>
					<textarea class="form-control" id="content-comment" rows="3" required></textarea>
				</div>
				<?php } ?>
				<input type="submit" id="btn-comment" class="btn btn-primary" value="Gửi bình luận" <?php if(empty($_SESSION['userid'])) echo 'disabled';  ?>>

			</div>
			<script type="text/javascript">
				$(document).ready(function() {
					$("#btn-comment").click(function(event) {
						$.ajax({
							url: window.location.origin+'/utcshop/product/comment_handler',
							type: 'post',
							dataType: 'text',
							data: {
								product_id :$("#product_id").val(),
								title: $("#title-comment").val(),
								content: $("#content-comment").val()
							},
							success:function(res) {
								$(".wrap-comment").prepend(res);
								$("#title-comment").val("");
								$("#content-comment").val("");
								if($('#none-comment-label').length){
									$('#none-comment-label').remove();
								}
							}
						})
						.done(function() {
							console.log("success");
						})
						.fail(function() {
							console.log("error");
						})
						.always(function() {
							console.log("complete");
						});
						
					});
				});
			</script>
		</div>
		<?php include("footer.php") ?>	
	</div>

</body>
</html>