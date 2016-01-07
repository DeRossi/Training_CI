<h2><b>Thêm mới sản phẩm</b></h2>
<form action="<?php echo $base_url."product/add"; ?>" method="post" id="categories">
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
		<legend align="center">Thông tin sản phẩm</legend>

		<label>Tên sản phẩm : </label>
		<input type="text" name="student_name" id="input" class="form-control" value="" required="required" pattern="" title=""> <br>
		<label>Giá : </label>
		<input type="text" name="student_sex" id="input" class="form-control" value="" required="required" pattern="" title=""> <br>
		<label>Hình ảnh : </label>
		<input type="text" name="student_address" id="input" class="form-control" value="" required="required" pattern="" title="">

	</select></br />
	<label>&nbsp;</label><input type="submit" name="ok" value="Add Student" class="btn" />
</fieldset>

</form>