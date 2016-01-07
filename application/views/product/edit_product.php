<? if($info['id']) { ?>
<h2><b>Edit student</b></h2>
<form action="<?php echo base_url(); ?>students/edit/<?php echo $info['id']; ?>" method="post" id="categories">
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
		<legend align="center">Student Infomations of <? echo $info['student_name']; ?></legend>

		<label>Student name : </label>
		<input type="text" name="student_name" class="input form-control" value="<? echo $info['student_name']; ?>" /> <br>

		<label>Student sex : </label>
		<input type="text" name="student_sex" class="input form-control" value="<? echo $info['student_sex']; ?>" /> <br>

		<label>Student address : </label>
		<input type="text" name="student_address" class="input form-control" value="<? echo $info['student_address']; ?>" />

	</select></br />
	<label>&nbsp;</label><input type="submit" name="ok" value="Edit Student" class="btn" />
</fieldset>

</form>
<? } ?>