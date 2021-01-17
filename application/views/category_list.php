<?php foreach ($categories as $key => $value): ?>
	<div class="col-md-2 col-sm-3 col-3 border">
		<a href="<?php echo base_url(); ?>product/viewbycategory/<?= $category_type  ?>/<?= $value['id'] ?>/1">
			<img src="<?php echo base_url(); ?>img/category/<?= $value['image'] ?>" alt="" class="img-fluid">
		</a>
		<div class="d-block font-weight-bold text-center">
			<?php if($category_type==2) echo $value['name'];  ?>
		</div>
	</div>
<?php endforeach ?>