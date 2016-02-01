<?php
	/*echo "<pre>";
	print_r($info);
	echo "</pre>";*/
?>

<script>
$(document).ready(function () {
	// Simple pie chart
	var data = {
		series: [5, 30]
	};

	var sum = function(a, b) { return a + b };

	new Chartist.Pie('#ct-chart5', data, {
		labelInterpolationFnc: function(value) {
			return Math.round(value / data.series.reduce(sum) * 100) + '%';
		}
	});
});
</script>

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
				<strong><?php echo $info['pro_name']; ?></strong>
			</li>
		</ol>
	</div>
	<div class="col-lg-2">

	</div>
</div>

<div class="wrapper wrapper-content animated flip">

	<div class="row">
		<div class="col-lg-12">

			<div class="ibox product-detail">
				<div clasEys="ibox-content">

					<div class="row">
						<div class="col-md-5">
							<div class="product-images">
								<div>
									<div class="image-imitation" style="padding: 20px 0;">
										<img src="<?php echo base_url()."common/img/upload/".$info['pro_img'] ?>" class="img-responsive" width="333px" height="255px">
										<span id="ct-chart5" class="ct-perfect-fourth" style="width:333px"></span>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-7">
							<h2 class="font-bold m-b-xs">
								<?php echo $info['pro_name']; ?>
							</h2>

							<div class="m-t-md">
								<h2 class="product-main-price"><?php echo number_format($info['pro_price']); ?> VND <small class="text-muted">Exclude Tax</small> </h2>
							</div>
							<br>
							<!--<img width="300px" height="100px" src="<?php echo base_url('barcode/set_barcode/'.$bd);?>"/>
							<img width="300px" height="100px" src="<?php echo base_url()."product/details/".$info['pro_id']."/set_barcode/".$bd ?>"/> -->

							<img width="300px" height="100px" src="<?php echo base_url("barcode/set_barcode/".$info['pro_barcode']); ?>"/>

							<h4>Thông tin sản phẩm</h4>

							<div class="small text-muted">
								<?php echo $info['pro_desc'] ?>
							</div>
							<dl class="small m-t-md">
								<dt>Số lượng</dt>
								<dd>A description list is perfect for defining terms.</dd>
							</dl>
							<hr>
							<span class="pull-right" style="font-family: courier new">
								Ngày nhập hàng <i class="fa fa-clock-o"></i> <b><?php echo $info['date_created'] ?></b><br>
								Thao tác trước đó <i class="fa fa-clock-o"></i> <b><?php echo $info['date_modified'] ?></b>
							</span>

							<div>
								<div class="btn-group">
									<button class="btn btn-primary btn-sm"><i class="fa fa-cart-plus"></i> Add to cart</button>
									<button class="btn btn-white btn-sm"><i class="fa fa-star"></i> Add to wishlist </button>
									<button class="btn btn-white btn-sm"><i class="fa fa-envelope"></i> Contact with author </button>
								</div>
							</div>


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
	<script src="<?php echo base_url();?>common/js/plugins/chartist/chartist.min.js"></script>

	<!-- Flot demo data -->
	<script type="text/javascript">$hp = 200;</script>
	<script src="<?php echo base_url(); ?>common/js/demo/flot-demo.js"></script>
