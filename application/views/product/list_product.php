<style type="text/css">
	.paging {
		text-align: center;
		margin: 0px 0px 10px 0px;
		font: 12px 'Tahoma';
		margin-top: 30px;
		padding-bottom: 50px;
		border-bottom: 1px solid #e2e2e2;
	}
	.paging a:hover{
		color: white;
		font: 12px 'Tahoma';
		text-shadow:0px 1px #388DBE;
		border-color:#3390CA;
		background:#58B0E7;
		background:-moz-linear-gradient(top, #B4F6FF 1px, #63D0FE 1px, #58B0E7);
		background:-webkit-gradient(linear, 0 0, 0 100%, color-stop(0.02, #B4F6FF), color-stop(0.02, #63D0FE), color-stop(1, #58B0E7));
		border-radius: 3px 3px 3px 3px;
		padding: 5px 10px;
	}
	.paging a {
		font: 12px 'Tahoma';
		color: #0A7EC5;
		border: solid 1px;
		border-color: #8DC5E6;
		background: #F8FCFF;
		border-radius: 3px 3px 3px 3px;
		padding: 5px 10px;
		margin: 0px 5px;
	}
	.paging strong {
		color: white;
		font: 12px 'Tahoma';
		text-shadow:0px 1px #388DBE;
		border-color:#3390CA;
		background:#58B0E7;
		background:-moz-linear-gradient(top, #B4F6FF 1px, #63D0FE 1px, #58B0E7);
		background:-webkit-gradient(linear, 0 0, 0 100%, color-stop(0.02, #B4F6FF), color-stop(0.02, #63D0FE), color-stop(1, #58B0E7));
		border-radius: 3px 3px 3px 3px;
		padding: 6px 12px;
	}
</style>

<?php
	$query = $this->db->get('product');

	/*$count = count($data);
	for ($i=0; $i < $count; $i++) {
		$casting_array[] = (object) $data[$i];
	}*/

	/*echo "<pre>";
	print_r($casting_array);
	echo "</pre>";*/
?>
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Danh mục sản phẩm</h2>
		<ol class="breadcrumb">
			<li>
				<a href="<?php echo base_url()."" ?>">Trang chủ</a>
			</li>
			<li class="active">
				<strong>Sản phẩm</strong>
			</li>
		</ol>
	</div>
</div>

<section id="cart">
	<div id="heading">
		<h3 style="text-align: center;">Giỏ hàng của bạn</h3>
	</div>
	<div id="text" style="text-align: center;">
		<?php
		$cart_check = $this->cart->contents();
		if(empty($cart_check)) {
			echo 'Giỏ hàng của bạn chưa có sản phẩm nào !';
		}
		?>


	</div>
</section>

<div role="tabpanel">
	<!-- Nav tabs -->
	<ul class="nav nav-tabs" role="tablist">
		<li role="presentation" class="active">
		<a href="<?php echo base_url()."product"?>#grid" aria-controls="grid" role="tab" data-toggle="tab">Xem dạng lưới</a>
		</li>
		<li role="presentation">
			<a href="#table" aria-controls="table" role="tab" data-toggle="tab">Xem dạng bảng</a>
		</li>
	</ul>
	<!-- Tab panes -->
	<div class="tab-content wrapper wrapper-content animated fadeInRight">
		<div role="tabpanel" class="tab-pane active" id="grid">
		<!-- ////////////////////////////////////////////// -->
		<div class="row">
			<?php
			foreach ($post->result() as $row) { // $query->result()
				?>
				<div class="col-md-3">
					<div class="ibox">
						<div class="ibox-content product-box">
							<div class="product-imitation" style="padding: 22px 0;">

								<a href="<?php echo base_url()."product/details/".$row->pro_id; ?>">
									<?php if($row->pro_img){ ?>
									<img src="<?php echo base_url()."common/img/upload/".$row->pro_img; ?>" width="235px" height="180px">
									<?php } else { ?>
									<img src="http://developer-agent.com/wp-content/uploads/2015/05/images_no_image_jpg3.jpg" width="235px" height="180px">
									<?php } ?>
								</a>
							</div>
							<div class="product-desc">
								<span class="product-price" style="text-align: center">
									<span class="badge"><a href="#table">Thêm vào giỏ hàng</a></span><br>
									<?php echo number_format($row->pro_price); ?> VND
								</span>
								<small class="text-muted">Category</small>
								<a href="<?php echo base_url()."product/details/".$row->pro_id; ?>" class="product-name"> <?php echo $row->pro_name; ?></a>
								<span class="badge"><a href="<?php echo base_url()."product/edit/".$row->pro_id; ?>">Chỉnh sửa thông tin</a></span>
								<span class="badge"><a href="#">Xóa SP</a></span>

								<div class="small m-t-xs">
									<?php echo $row->pro_desc; ?>
								</div>
								<div class="m-t text-righ">
									<a href="<?php echo base_url()."product/details/".$row->pro_id; ?>" class="btn btn-xs btn-outline btn-primary">Xem thông tin chi tiết <i class="fa fa-long-arrow-right"></i> </a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
				<div class="paging"><?php echo '<h4>' .$paginator. '</h4>'; ?></div>
		<!-- ////////////////////////////////////////////// -->
		</div>


		<div role="tabpanel" class="tab-pane" id="table">
		<!-- ////////////////////////////////////////////// -->
		<?php
			echo '<table class="table table-bordered table-hover">';
			echo '<th>ID</th>';
			echo '<th>Tên sản phẩm</th>';
			echo '<th>Giá thành</th>';
			echo '<th>Mô tả</th>';
			echo '<th>Hình ảnh</th>';
			echo '<th>Ngày tạo</th>';
			echo '<th>Thao tác</th>';

			foreach ($post->result() as $row) {
				if($row->pro_img){
					$src_img = "<img src=" .base_url()."common/img/upload/".$row->pro_img." width='125px' height='80px'>";
				} else {
					$src_img = "<img src='http://developer-agent.com/wp-content/uploads/2015/05/images_no_image_jpg3.jpg' width='125px' height='80px'>";
				}
				echo "<tr><td>" .$row->pro_id. "</td>
				<td>" .$row->pro_name. "</td>
				<td>" .$row->pro_price. "</td>
				<td>" .$row->pro_desc. "</td>
				<td>" .$src_img. "</td>
				<td>" .$row->date_created. "</td>
				<td><a href=".base_url()."product/edit/".$row->pro_id.">Chỉnh sửa</a> | <a href=".base_url()."product/details/" .$row->pro_id. ">Xem</a> | <a href=".base_url()."product/delete/".$row->pro_id."  onclick='return xacnhan();'>Xóa</a></td></tr>";
			}
			echo '</table>';
		?>
		<div class="paging"><?php echo '<h4>' .$paginator. '</h4>'; ?></div>
		<!-- ////////////////////////////////////////////// -->
		</div>
	</div>
</div>



