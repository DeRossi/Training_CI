<div class="container">
	<form action="<?php echo base_url();?>product/search" method="post" id="categories">

	<input type="text" class="searchBox form-control" id="searchBox" name="pro_name" placeholder="Tìm kiếm sản phẩm" />
	<input type="submit" value="Tìm kiếm sản phẩm" class="btnInput" id="btnInput"> </input>
	<br><br>
	<?php
	echo '<hr>';
	echo '<h2><b>  List </b></h2>';
	echo '<table id="" class="table">';
	echo '<th> ID</th>';
	echo '<th> Tên sản phẩm </th>';
	echo '<th> Giá thành </th>';
	echo '<th> Hình ảnh </th>';
	echo '<th> Thông tin sản phẩm </th>';

	echo '<hr>';
	echo '<b style="color: red">' .$keyword. '</b>';

	foreach($results as $rows) {
		echo '<tr>
		<td>'.$rows->pro_id.'</td>
		<td>'.$rows->pro_name.'</td>
		<td>'.$rows->pro_price.'</td>
		<td>'.$rows->pro_img.'</td>
		<td>'.$rows->pro_desc.'</td>
	</tr>';
	}
	echo '</table>';
	?>
	</form>
</div>
