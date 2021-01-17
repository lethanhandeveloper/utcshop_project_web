<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- css -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/user.css">
<!-- jquery -->
<script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
<!-- font awesome -->
<link href="<?php echo base_url(); ?>css/fontawesome/css/all.css" rel="stylesheet">
<!-- bootstrap -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/bootstrap.min.css">

<script src="<?php echo base_url(); ?>bootstrap/popper.min.js"></script>
<script src="<?php echo base_url(); ?>bootstrap/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>js/user.js"></script>
<div id="top" class="border-bottom mt-2">
	<span class="d-md-inline d-none"><i class="fa fa-phone"> Hotline:033.756.5921</i></span>
	<div id="top-right">
		<input type="hidden" id="username" value="<?php if(!empty($_SESSION['name'])) echo $_SESSION['name'];  ?>">
		<input type="hidden" id="userid" value="<?php if(!empty($_SESSION['name'])) echo  $_SESSION['userid'];  ?>">
		<?php if(isset($_SESSION['name'])){ ?>
			<span>
				<span class="dropdown">
					<a href="" class="dropdown-toggle font-weight-bold" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fas fa-user"></i> <?= $_SESSION['name'] ?> 
					</a>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						<a class="dropdown-item" href="<?php echo base_url(); ?>account/bill_info"><i class="fas fa-receipt"></i> </i> Thông tin đơn hàng</a>
						<!-- <a class="dropdown-item" href="<?php echo base_url(); ?>account/logout"><i class="fas fa-user-circle"></i> Thông tin tài khoản</a> -->
						<div class="dropdown-divider"></div>	
						<a class="dropdown-item" href="<?php echo base_url(); ?>account/logout"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
					</div>
				</span>
			</span>
		<?php } else{ ?>
			<span><a href="<?php echo base_url(); ?>account"><i class="fas fa-user"> Đăng nhập </i></a></span>
			<span class="border-left"><a href="<?php echo base_url(); ?>account/register"><i class="fa fa-plus"> Đăng ký </i></a></span>
		<?php } ?>
		<span class="border-left"><a href="<?php echo base_url(); ?>cart"><i class="fas fa-shopping-cart"> Giỏ hàng</i></a></span>
	</div>
</div>
<div class="top-header row pt-3 mb-3">
	<div class="logo col-md-3 col-12">
		<a href="<?php echo base_url(); ?>">
			<img src="<?php echo base_url(); ?>img/logo.png" alt="" class="img-fluid" >
		</a>
	</div>
	<div class="col-md-4">

	</div>
	<div class="col-md-5 mt-md-0 mt-sm-3 mt-3">
		<form action="<?php echo base_url(); ?>product/search" method="get">
			<input id="search-box" type="text" name="content" placeholder="Nhập sản phẩm để tìm kiếm..." value="<?php if(isset($content)) echo $content;   ?>">
			<button id="btn-search" type="submit"><i class="fa fa-search"></i></button>
		</form>
	</div>
</div>
<div class="topnav mb-3" id="myTopnav">
	<a href="<?php echo base_url(); ?>" class="active m-md-0"><i class="home-icon fa fa-home d-md-none d-block"></i><span class="search-icon d-md-block d-none">TRANG CHỦ</span></a>
	<a href="<?php echo base_url(); ?>product/1">ĐIỆN THOẠI</a>
	<a href="<?php echo base_url(); ?>product/2">PHỤ KIỆN</a>
	<a href="#about">KHUYẾN MÃI</a>
	<a href="<?php echo base_url(); ?>news">TIN TỨC</a>
	<a href="<?php echo base_url(); ?>support">HỖ TRỢ</a>
	<a href="<?php echo base_url(); ?>about">GIỚI THIỆU</a>
	<a href="javascript:void(0);" class="icon" onclick="myFunction()">
		<i class="fa fa-bars"></i>
	</a>
</div>
<div id="carouselExampleIndicators" class="carousel slide mb-3" data-ride="carousel">
	<ol class="carousel-indicators">
		<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
		<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
		<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
		<li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
		<li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
	</ol>
	<div class="carousel-inner">
		<div class="carousel-item active">
			<img  src="<?php echo base_url(); ?>img/slide/slide1.png"  style="width: 100%">
		</div>
		<div class="carousel-item">
			<img class="d-block w-100" src="<?php echo base_url(); ?>img/slide/slide2.png" style="width: 100%">
		</div>
		<div class="carousel-item">
			<img class="d-block w-100" src="<?php echo base_url(); ?>img/slide/slide3.png" style="width: 100%">
		</div>
		<div class="carousel-item">
			<img class="d-block w-100" src="<?php echo base_url(); ?>img/slide/slide5.png" style="width: 100%">
		</div>
		<div class="carousel-item">
			<img class="d-block w-100" src="<?php echo base_url(); ?>img/slide/slide6.png" style="width: 100%">
		</div>
	</div>
	<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>