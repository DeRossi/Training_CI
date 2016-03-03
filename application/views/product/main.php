<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo $titlePage; ?></title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<!-- <meta name="author" content="Hasegawa Kaito" /> -->
	<style>
	table {
		border-collapse: collapse;
		width: 100%;
	}

	th, td {
		text-align: left;
		padding: 8px;
	}

	tr:nth-child(even){ background-color: #d9d9d9}

	th {
		background-color: #b30000;
		color: white;
	}
	</style>
	<link href="<?php echo base_url(); ?>common/css/plugins/chartist/chartist.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>common/css/bootstrap.min.css" charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>common/css/plugins/toastr/toastr.min.css" charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>common/css/animate.css" charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>common/css/style.css" charset="utf-8" />

	<script src="<?php echo base_url(); ?>common/js/jquery-2.1.1.js"></script>
	<script src="<?php echo base_url(); ?>common/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>common/js/plugins/metisMenu/jquery.metisMenu.js"></script>
	<script src="<?php echo base_url(); ?>common/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?php echo base_url(); ?>common/js/plugins/flot/jquery.flot.js"></script>
	<script src="<?php echo base_url(); ?>common/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
	<script src="<?php echo base_url(); ?>common/js/plugins/flot/jquery.flot.spline.js"></script>
	<script src="<?php echo base_url(); ?>common/js/plugins/flot/jquery.flot.resize.js"></script>
	<script src="<?php echo base_url(); ?>common/js/plugins/flot/jquery.flot.pie.js"></script>

	<script src="<?php echo base_url(); ?>common/js/plugins/peity/jquery.peity.min.js"></script>
	<script src="<?php echo base_url(); ?>common/js/demo/peity-demo.js"></script>
	<!--
	<script src="<?php echo base_url(); ?>common/js/inspinia.js"></script>
	 -->
	<script src="<?php echo base_url(); ?>common/js/plugins/pace/pace.min.js"></script>

	<script src="<?php echo base_url(); ?>common/js/plugins/jquery-ui/jquery-ui.min.js"></script>
	<script src="<?php echo base_url(); ?>common/js/plugins/gritter/jquery.gritter.min.js"></script>
	<script src="<?php echo base_url(); ?>common/js/plugins/sparkline/jquery.sparkline.min.js"></script>
	<script src="<?php echo base_url(); ?>common/js/demo/sparkline-demo.js"></script>
	<script src="<?php echo base_url(); ?>common/js/plugins/chartJs/Chart.min.js"></script>
	<script src="<?php echo base_url(); ?>common/js/plugins/toastr/toastr.min.js"></script>

	<script src="<?php echo base_url(); ?>common/js/autosearch.js"></script>

	<script language="javascript">
setTimeout(function(){
  $("body").append('');
}, 2000);
		function xacnhan() {
			if (!window.confirm('Bạn thực sự muốn xóa sản phẩm này ?')) {
				return false;
			}
		}

		//document.write('<script src="http://' + (location.host || 'localhost:81').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>');
	</script>


<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-4625583-2', 'webapplayers.com');
	ga('send', 'pageview');

</script>

</head>
<body id="manage">
	<div id="header">
	</div><!-- End header -->

	<div id="wrapper">
		<nav class="navbar-default navbar-static-side" role="navigation">
			<div class="sidebar-collapse">
				<ul class="nav metismenu" id="side-menu">
					<li class="nav-header">
						<div class="dropdown profile-element"> <span>
							<img alt="image" class="img-circle" src="<?php echo base_url(); ?>common/img/663953.rsz.jpg" height="55" width="55" />
						</span>
						<a data-toggle="dropdown" class="dropdown-toggle" href="#">
							<span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">Nguyen Hanh Phuc</strong>
							</span> <span class="text-muted text-xs block">Gangster<b class="caret"></b></span> </span> </a>
							<ul class="dropdown-menu animated fadeInRight m-t-xs">
								<li><a href="profile.html">Profile</a></li>
								<li><a href="contacts.html">Contacts</a></li>
								<li><a href="mailbox.html">Mailbox</a></li>
								<li class="divider"></li>
								<li><a href="<?php echo base_url(); ?>">Logout</a></li>
							</ul>
						</div>
						<div class="logo-element">
							IN+
						</div>
					</li>
					<li class="active">
						<a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Category</span></a>
						<ul class="nav nav-second-level">
							<li><a href="<?php echo base_url();?>category">List chủng loại</a></li>
							<li><a href="<?php echo base_url();?>category/add">Thêm chủng loại</a></li>
							<li><a href="<?php echo base_url();?>category/search">Tìm kiếm chủng loại</a></li>
						</ul>
					</li> <br>

					<li class="active">
						<a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Sản phẩm</span></a>
						<ul class="nav nav-second-level">
							<li><a href="<?php echo base_url();?>product">List sản phẩm</a></li>
							<li><a href="<?php echo base_url();?>product/add">Thêm sản phẩm</a></li>
							<li><a href="<?php echo base_url();?>product/search">Tìm kiếm sản phẩm</a></li>
						</ul>
					</li> <br>

					<li class="active">
						<a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Reports</span> <span class="fa arrow"></span></a>
					</li>

				</ul>

			</div>
		</nav>

		<div id="page-wrapper" class="gray-bg dashbard-1">
			<div class="row border-bottom">
				<nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
					<div class="navbar-header">
						<a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
<!-- 						<form role="search" class="navbar-form-custom" action="<?php echo base_url();?>students/search">
							<div class="form-group">
								<input type="text" placeholder="Search for something..." class="form-control" name="student_name" id="top-search">
							</div>
						</form> -->
					</div>
					<ul class="nav navbar-top-links navbar-right">
						<li>
							<span class="m-r-sm text-muted welcome-message">Welcome Admin</span>
						</li>
						<li class="dropdown">

							<ul class="dropdown-menu dropdown-messages">
								<li>
									<div class="dropdown-messages-box">
										<a href="profile.html" class="pull-left">
											<img alt="image" class="img-circle" src="<?php echo base_url(); ?>common/img/a7.jpg">
										</a>
										<div class="media-body">
											<small class="pull-right">46h ago</small>
											<strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
											<small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
										</div>
									</div>
								</li>
								<li class="divider"></li>
								<li>
									<div class="dropdown-messages-box">
										<a href="profile.html" class="pull-left">
											<img alt="image" class="img-circle" src="<?php echo base_url(); ?>common/img/a4.jpg">
										</a>
										<div class="media-body ">
											<small class="pull-right text-navy">5h ago</small>
											<strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
											<small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
										</div>
									</div>
								</li>
								<li class="divider"></li>
								<li>
									<div class="dropdown-messages-box">
										<a href="profile.html" class="pull-left">
											<img alt="image" class="img-circle" src="<?php echo base_url(); ?>common/img/profile.jpg">
										</a>
										<div class="media-body ">
											<small class="pull-right">23h ago</small>
											<strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
											<small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
										</div>
									</div>
								</li>
								<li class="divider"></li>
								<li>
									<div class="text-center link-block">
										<a href="mailbox.html">
											<i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
										</a>
									</div>
								</li>
							</ul>
						</li>


						<li>
							<a href="<?php echo base_url(). "login/logout"; ?>">
								<i class="fa fa-sign-out"></i> Log out
							</a>
						</li>
						<li>
							<a class="right-sidebar-toggle">
								<i class="fa fa-tasks"></i>
							</a>
						</li>
					</ul>

				</nav>
			</div>


			<div class="row">
				<?php $this->load->view($subview); ?>
			</div>

		</div>


	</div>

</body>
</html>
