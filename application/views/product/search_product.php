<form action="<?php echo base_url();?>students/search" method="post" id="categories">

<input type="text" class="searchBox form-control" id="searchBox" name="student_name" placeholder="enter name of student you want" />
<input type="submit" value="Search by student name" class="btnInput" id="btnInput"> </input>
<br><br>
<?php
echo '<hr>';
echo '<h2><b> Students List </b></h2>';
echo '<table id="" class="table">';
echo '<th> ID</th>';
echo '<th> Students name </th>';
echo '<th> Students DOB </th>';
echo '<th> Student sex </th>';
echo '<th> Students address </th>';

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