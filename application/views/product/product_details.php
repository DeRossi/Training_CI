<?php
	echo "<pre>";
	print_r($info, $bd);
	echo "</pre>";

	echo "<pre>";
	print_r($bd);
	echo "</pre>";

	echo "<pre>";
	print_r($info);
	echo "</pre>";
?>
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>Chi tiết sản phẩm</h2>
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
	<div class="col-lg-2">

	</div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">

	<div class="row">
		<div class="col-lg-12">

			<div class="ibox product-detail">
				<div clasEys="ibox-content">

					<div class="row">
						<div class="col-md-5">
							<div class="product-images">
								<div>
									<div class="image-imitation" style="padding: 20px 0;">
										<img src="<?php echo base_url()."common/img/upload/".$info['pro_img'] ?>" width="333px" height="255px">
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-7">
							<h2 class="font-bold m-b-xs">
								<?php echo $info['pro_name']; ?>
							</h2>
							<small>Many desktop publishing packages and web page editors now.</small>
							<div class="m-t-md">
								<h2 class="product-main-price">$ <?php echo $info['pro_price'] ?> <small class="text-muted">Exclude Tax</small> </h2>
							</div>
							<hr>

							<img width="300px" height="100px" src="<?php echo base_url()."product/details/".$info['pro_id']."/set_barcode/".$bd ?>"/>

							<h4>Product description</h4>

							<div class="small text-muted">
								<?php echo $info['pro_desc'] ?>
							</div>
							<dl class="small m-t-md">
								<dt>Số lượng</dt>
								<dd>A description list is perfect for defining terms.</dd>
							</dl>
							<hr>

							<div>
								<div class="btn-group">
									<button class="btn btn-primary btn-sm"><i class="fa fa-cart-plus"></i> Add to cart</button>
									<button class="btn btn-white btn-sm"><i class="fa fa-star"></i> Add to wishlist </button>
									<button class="btn btn-white btn-sm"><i class="fa fa-envelope"></i> Contact with author </button>
								</div>
							</div>

							<span class="pull-right">
								Last update - <i class="fa fa-clock-o"></i> 14.04.2016 10:04 pm
							</span>

						</div>
					</div>

					<div class="row">
						<div class="col-lg-6">
							<div class="ibox float-e-margins">
								<div class="ibox-title">
									<h5>Report về sản phẩm <?php echo $info['pro_name']; ?></h5>
								</div>
								<div class="ibox-content">
									<div class="flot-chart">
										<div class="flot-chart-content" id="flot-bar-chart"></div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>

			</div>
		</div>
	</div>
	</div>


	<!-- Custom and plugin javascript -->
	<script src="<?php echo base_url(); ?>common/js/plugins/pace/pace.min.js"></script>

	<!-- Flot demo data -->
	<script type="text/javascript">$hp = 200;</script>
	<script src="<?php echo base_url(); ?>common/js/demo/flot-demo.js"></script>