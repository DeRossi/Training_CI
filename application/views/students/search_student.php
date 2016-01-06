<form action="<?php echo base_url();?>index.php/students/search" method="post" id="categories">

<input type="text" class="searchBox" id="searchBox" name="student_name" />
<input type="submit" value="Search" class="btnInput" id="btnInput"> </input>
<br><br>
<?php
echo '<hr>';
echo '<h1> Students List </h1>';
echo '<table id="" class="table">';
echo '<th> ID</th>';
echo '<th> Students name </th>';
echo '<th> Students DOB </th>';
echo '<th> Student sex </th>';
echo '<th> Students address </th>';

//$result = $this->db->like('student_name', $this->input->get("student_name"))->get('students');
//->or_like('student_address', $data)
//->get('students');

foreach($results as $rows) {
	echo '<tr>
	<td>'.$rows->id.'</td>
	<td>'.$rows->student_name.'</td>
	<td>'.$rows->student_birth.'</td>
	<td>'.$rows->student_sex.'</td>
	<td>'.$rows->student_address.'</td>
</tr>';
}
echo '</table>';
?>

</form>