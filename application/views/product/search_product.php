<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Chi tiết sản phẩm</h2>
		<ol class="breadcrumb">
			<li>
				<a href="<?php echo base_url()?>">Trang chủ</a>
			</li>
			<li>
				<a href="<?php echo base_url()."product" ?>">Sản phẩm</a>
			</li>
			<li class="active">
				<strong>Tìm kiếm sản phẩm</strong>
			</li>
		</ol>
	</div>
</div>

<div class="container">
	<form action="<?php echo base_url();?>product/search" method="post" id="categories">

	<!-- <input type="text" class="searchBox form-control" id="searchBox" name="pro_name" placeholder="Tìm kiếm sản phẩm" /> -->

	<div class="row">
		<fieldset class="show scheduler-border">
		<div class="col-md-4 col-md-offset-1" style="margin-top: 20px; margin: auto">
		   <label class="control-lable">Tìm kiếm theo tên sản phẩm</label>
			 <input type="text" id="pro_name" autocomplete="on" name="pro_name" class="form-control" placeholder="Tìm kiếm sản phẩm theo tên">
			 <ul class="dropdown-menu txtproname" style="margin-left:15px;margin-right:0px;" role="menu" aria-labelledby="dropdownMenu" id="DropdownProName">
			 </ul>
			 <br>
			<label class="control-lable">Tìm kiếm theo giá sản phẩm</label>
			<input type="text" id="pro_name" autocomplete="off" name="pro_name_" class="form-control" placeholder=""> đến
			<input type="text" id="pro_name" autocomplete="off" name="pro_name_" class="form-control" placeholder="">

		<input type="submit" value="Tìm kiếm sản phẩm" class="btnInput" id="btnInput"> </input>
		</fieldset>
		</div>
	</div>

	<?php
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
			<td>'.number_format($rows->pro_price).' VND</td>
			<td>'.$rows->pro_img.'</td>
			<td>'.$rows->pro_desc.'</td>
		</tr>';
		}
		echo '</table>';
	?>

	</form>
</div>
