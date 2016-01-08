<?php
	$query = $this->db->get('product');
?>
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Danh mục sản phẩm</h2>
		<ol class="breadcrumb">
			<li>
				<a href="#">Trang chủ</a>
			</li>
			<li class="active">
				<strong>Sản phẩm</strong>
			</li>
		</ol>
	</div>
</div>

<div role="tabpanel">
	<!-- Nav tabs -->
	<ul class="nav nav-tabs" role="tablist">
		<li role="presentation" class="active">
		<a href="#grid" aria-controls="grid" role="tab" data-toggle="tab">Xem dạng lưới</a>
		</li>
		<li role="presentation">
			<a href="#table" aria-controls="table" role="tab" data-toggle="tab">Xem dạng bảng</a>
		</li>
	</ul>
	<!-- Tab panes -->
	<div class="tab-content">
		<div role="tabpanel" class="tab-pane active" id="grid">
		<!-- ////////////////////////////////////////////// -->
		<div class="row">
			<?php
			foreach ($query->result() as $row) {
				?>
				<div class="col-md-3">
					<div class="ibox">
						<div class="ibox-content product-box">
							<div class="product-imitation" style="padding: 22px 0;">
								<a href="<?php echo base_url()."product/details/".$row->pro_id; ?>">
									<img src="<?php echo base_url()."common/img/upload/".$row->pro_img; ?>" width="240px" height="180px">
								</a>
							</div>
							<div class="product-desc">
								<span class="product-price">
									<?php echo $row->pro_price; ?>
								</span>
								<small class="text-muted">Category</small>
								<a href="<?php echo base_url()."product/details/".$row->pro_id; ?>" class="product-name"> <?php echo $row->pro_name; ?> </a>

								<div class="small m-t-xs">
									<?php echo $row->pro_desc; ?>
								</div>
								<div class="m-t text-righ">
									<button type="button" class="btn btn-xs btn-outline btn-primary"><a href="<?php echo base_url()."product/edit/".$row->pro_id; ?>">Chỉnh sửa thông tin</a> | <a href="#2">Xóa sản phẩm</a></button>
									<a href="<?php echo base_url()."product/details/".$row->pro_id; ?>" class="btn btn-xs btn-outline btn-primary">Xem thông tin chi tiết <i class="fa fa-long-arrow-right"></i> </a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
		<!-- ////////////////////////////////////////////// -->
		</div>

		<div role="tabpanel" class="tab-pane" id="table">
		<!-- ////////////////////////////////////////////// -->
		<?php
			echo '<table class="table table-hover">';
			echo '<th>ID</th>';
			echo '<th>Tên sản phẩm</th>';
			echo '<th>Giá thành</th>';
			echo '<th>Mô tả</th>';
			echo '<th>Hình ảnh</th>';
			echo '<th>Thao tác</th>';

			foreach ($query->result() as $row) {
				echo "<tr><td>" .$row->pro_id. "</td>
				<td>" .$row->pro_name. "</td>
				<td>" .$row->pro_price. "</td>
				<td>" .$row->pro_desc. "</td>
				<td> <img src=" .base_url()."common/img/upload/".$row->pro_img." width='125px' height='80px'> </td>
				<td><a href=".base_url()."product/edit/".$row->pro_id.">Edit</a> | <a href=".base_url()."product/delete/".$row->pro_id."  onclick='return xacnhan();'>Delete</a></td></tr>";
			}
		?>
		<!-- ////////////////////////////////////////////// -->
		</div>
	</div>
</div>


