<h1>Edit student</h1>
<form action="<?php echo base_url(); ?>index.php/students/edit/<?php echo $info['id']; ?>" method="post" id="categories">
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

		<label>Student name : </label><input type="text" name="student_name" size="28" class="input" value="<? echo $info['student_name']; ?>" />
		<label>Student sex : </label><input type="text" name="student_sex" size="28" class="input" value="<? echo $info['student_sex']; ?>" />
		<!-- <label>Password :</label><input type="password" name="password" size="28" class="input"/>
		<label>Re-Pass:</label><input type="password" name="password2" size="28" class="input"/><br /> -->
		<label>Student address : </label><input type="text" name="student_address" size="28" class="input" value="<? echo $info['student_address']; ?>" />

	</select></br />
	<label>&nbsp;</label><input type="submit" name="ok" value="Edit Student" class="btn" />
</fieldset>

</form>