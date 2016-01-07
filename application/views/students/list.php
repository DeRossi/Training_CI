<h2><b>Show list</b></h2>

<?php
	$query = $this->db->get('students');
	//$query = $info[];

	echo '<table class="table table-hover">';
	echo '<th>ID</th>';
	echo '<th>Student Name</th>';
	echo '<th>Student DOB</th>';
	echo '<th>Student Sex</th>';
	echo '<th>Student Address</th>';
	echo '<th>Operation</th>';

	//$query->result()

	/*$object = new stdClass();
	foreach ($this->_data['info'] as $key => $value) {
		$object->$key = $value;

	}*/

	$object = (object) $this->_data['info'];
	foreach ($query->result() as $row) {
		echo "<tr><td>" .$row->id. "</td>
		<td>" .$row->student_name. "</td>
		<td>" .$row->student_birth. "</td>
		<td>" .$row->student_sex. "</td>
		<td>" .$row->student_address. "</td>
		<td><a href=".base_url()."students/edit/".$row->id.">Edit</a> | <a href=".base_url()."students/delete/".$row->id."  onclick='return xacnhan();'>Delete</a></td></tr>";
	}

	echo "<pre>";
	print_r((object) $this->_data['info']);
	echo "</pre>";

	/*echo "<pre>";
	print_r($query->result());
	echo "</pre>";*/
?>
