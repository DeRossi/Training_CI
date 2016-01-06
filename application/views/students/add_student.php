<h2><b>Add student</b></h2>
<form action="<?php echo $base_url."students/add"; ?>" method="post" id="categories">
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
		<legend align="center">Student Infomations</legend>

		<label>Student name : </label>
		<input type="text" name="student_name" id="input" class="form-control" value="" required="required" pattern="" title=""> <br>
		<label>Student sex : </label>
		<input type="text" name="student_sex" id="input" class="form-control" value="" required="required" pattern="" title=""> <br>
		<label>Student address : </label>
		<input type="text" name="student_address" id="input" class="form-control" value="" required="required" pattern="" title="">

	</select></br />
	<label>&nbsp;</label><input type="submit" name="ok" value="Add Student" class="btn" />
</fieldset>

</form>