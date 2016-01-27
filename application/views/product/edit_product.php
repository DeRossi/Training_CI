<?php if($info['pro_id']) { ?>
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Chỉnh sửa thông tin sản phẩm</h2>
		<ol class="breadcrumb">
			<li>
				<a href="#">Trang chủ</a>
			</li>
			<li>
				<a href="<?php echo base_url()."product" ?>">Sản phẩm</a>
			</li>
			<li class="active">
				<strong><?php echo $info['pro_name']; ?></strong>
			</li>
		</ol>
	</div>
</div>

<div class="container wrapper wrapper-content animated fadeInDownBig" style="width: 99%">
	<?php
		echo "<div class=''>";
		echo "<ul>";
		if(validation_errors() != ''){
			echo "<li>".validation_errors()."</li>";
		}
		echo "</ul>";
		echo "</div>";
	?>
	<table class="table table-bordered table-hover">
		<tbody>
			<tr>
				<td style="width: 320px">
					<fieldset class="show scheduler-border">
						<legend class="scheduler-border"><?php echo $info['pro_name']; ?></legend>
					<?php
						$upload = array(
							"name" => "img",
							"size" => "25",
						);

						echo form_open_multipart(base_url()."product/edit/" .$info['pro_id']);
						echo form_label("Hình ảnh : ").form_upload($upload)."<br />";

						if($info['pro_img']){
						?>
						<img src="<?php echo base_url()."common/img/upload/".$info['pro_img']; ?>" class="img-responsive" width="240px" height="180px">
						<?php }
						else { ?>
							<img src="http://developer-agent.com/wp-content/uploads/2015/05/images_no_image_jpg3.jpg" class="img-responsive">
						<?php } ?>
						<br>
						<img width="240px" height="auto" src="<?php echo base_url("barcode/set_barcode/".$bd); ?>"/>
					</fieldset>
				</td>

				<td>
					<?php
						echo form_label('Tên sản phẩm : ').form_input(array('name' => 'pro_name'    , 'class' => 'input form-control'), $info['pro_name']); ?><br><?php
						echo form_label('Giá sản phẩm : ').form_input(array('name' => 'pro_price'   , 'class' => 'input form-control'), $info['pro_price']); ?><br><?php
						echo form_label('Thông tin chi tiết : ').form_textarea(array('name' => 'pro_desc' , 'id' => 'input', 'class' => 'form-control', 'rows' => 3, 'value' => $info['pro_desc'])); ?><br><?php

						echo form_label('<h3 style="font-family:Courier New">Thời điểm thêm mới sản phẩm : ' .$info['date_created']. '</h3>'); ?><br><?php
						echo form_label('<h3 style="font-family:Courier New">Thời điểm cập nhật gần nhất : ' .$info['date_modified']. '</h3>'); ?><br><?php
						echo form_label(" ").form_submit("ok", "Cập nhật");
						echo form_close();
					?>
				</td>
			</tr>
		</tbody>
	</table>

</div>


<?php echo $errors_msg; ?>

<?php } ?>