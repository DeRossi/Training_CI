<? if($info['pro_id']) { ?>
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

<form action="<?php echo base_url(); ?>students/edit/<?php echo $info['pro_id']; ?>" method="post" id="categories">
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
		<legend align="center"><? echo $info['pro_name']; ?></legend>

		<label>Student name : </label>
		<input type="text" name="student_name" class="input form-control" value="<? echo $info['pro_name']; ?>" /> <br>

		<label>Student sex : </label>
		<input type="text" name="student_sex" class="input form-control" value="<? echo $info['pro_price']; ?>" /> <br>

		<label>Student address : </label>
		<input type="text" name="student_address" class="input form-control" value="<? echo $info['pro_desc']; ?>" />

	</select></br />
	<label>&nbsp;</label><input type="submit" name="ok" value="Sửa thông tin" class="btn" />
</fieldset>

</form>
<? } ?>