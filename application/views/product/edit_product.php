<?php if($info['pro_id']) { ?>
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Chỉnh sửa thông tin sản phẩm</h2>
		<ol class="breadcrumb">
			<li>
				<a href="#">Trang chủ</a>
			</li>
			<li>
				<a href="<?php echo base_url()."product" ?>">Sản phẩm</a>
			</li>
			<li class="active">
				<strong><?php echo $info['pro_name']; ?></strong>
			</li>
		</ol>
	</div>
</div>

<form action="<?php echo base_url(); ?>product/edit/<?php echo $info['pro_id']; ?>" method="post" id="categories">
	<?php
		echo "<div class=''>";
		echo "<ul>";
		if(validation_errors() != ''){
			echo "<li>".validation_errors()."</li>";
		}
		echo "</ul>";
		echo "</div>";
	?>
	<fieldset class="show">
		<legend align="center"><?php echo $info['pro_name']; ?></legend>

		<label>Tên sản phẩm : </label>
		<input type="text" name="pro_name" class="input form-control" value="<?php echo $info['pro_name']; ?>" /> <br>

		<label>Giá sản phẩm : </label>
		<input type="text" name="pro_price" class="input form-control" value="<?php echo $info['pro_price']; ?>" /> <br>

		<label>Thông tin sản phẩm : </label>
		<!-- <input type="text" name="student_address" class="input form-control" value="<?php echo $info['pro_desc']; ?>" /> -->
		<textarea name="pro_desc" id="input" class="form-control" rows="3" required="required"><?php echo $info['pro_desc']; ?></textarea>


	<label>&nbsp;</label><input type="submit" name="ok" value="Sửa thông tin" class="btn" />
</fieldset>

</form>

<?php } ?>