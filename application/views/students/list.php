	<h1>Show list</h1>
	<?
	$query = $this->db->get('students');
	$str = "<h2><table class='table table-hover'><th>ID</th> <th>Student Name</th> <th>Student DOB</th> <th>Student Sex</th> <th>Student Address</th> <th>Operation</th>";
	echo($str);
	foreach ($query->result() as $row) {
		echo "<tr><td>" .$row->id. "</td><td>" .$row->student_name. "</td><td>" .$row->student_birth. "</td><td>" .$row->student_sex. "</td><td>" .$row->student_address. "</td><td><a href=".base_url()."index.php/students/edit/".$row->id.">Edit</a> | <a href=".base_url()."index.php/students/delete/".$row->id."  onclick='return xacnhan();'>Delete</a></td></tr>";
	}
	?>