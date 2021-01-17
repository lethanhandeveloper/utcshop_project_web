<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- css -->
<link href="<?php echo base_url(); ?>css/admin.css" rel="stylesheet">
<!-- jquery -->
<script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
<!-- font awesome -->
<link href="<?php echo base_url(); ?>css/fontawesome/css/all.css" rel="stylesheet">
<!-- bootstrap -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/bootstrap.min.css">
<script src="<?php echo base_url(); ?>bootstrap/bootstrap.min.js"></script>
<!-- javascript -->
<script src="<?php echo base_url(); ?>js/admin.js"></script>
<!--  -->
<!-- ckeditor -->
<script src="<?php echo base_url(); ?>ckeditor/ckeditor.js"></script>
<!-- ckfinder -->
<script src="<?php echo base_url(); ?>ckeditor/ckfinder/ckfinder.js">"></script>
<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
  <button class="btn btn-primary" id="menu-toggle"><i class="fas fa-list"></i></button>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Admin <?=  $_SESSION['name']  ?>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <!--   <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div> -->
          <a class="dropdown-item" href="<?php echo base_url(); ?>account/logout"><i class="fas fa-sign-out-alt"></i> Đăng Xuất</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
