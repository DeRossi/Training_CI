<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo $titlePage; ?></title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<!-- <meta name="author" content="Hasegawa Kaito" /> -->
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

	<script language="javascript">
setTimeout(function(){
  $("body").append('Some text');
}, 2000);
		function xacnhan() {
			if (!window.confirm('You want delete ?')) {
				return false;
			}
		}
	</script>

	<script>
		/*$(document).ready(function() {
			setTimeout(function() {
				toastr.options = {
					closeButton: true,
					progressBar: true,
					showMethod: 'slideDown',
					timeOut: 4000
				};
				toastr.success('Responsive Admin Theme', 'Welcome to INSPINIA');

			}, 1300);


			var data1 = [
			[0,4],[1,8],[2,5],[3,10],[4,4],[5,16],[6,5],[7,11],[8,6],[9,11],[10,30],[11,10],[12,13],[13,4],[14,3],[15,3],[16,6]
			];
			var data2 = [
			[0,1],[1,0],[2,2],[3,0],[4,1],[5,3],[6,1],[7,5],[8,2],[9,3],[10,2],[11,1],[12,0],[13,2],[14,8],[15,0],[16,0]
			];
			$("#flot-dashboard-chart").length && $.plot($("#flot-dashboard-chart"), [
				data1, data2
				],
				{
					series: {
						lines: {
							show: false,
							fill: true
						},
						splines: {
							show: true,
							tension: 0.4,
							lineWidth: 1,
							fill: 0.4
						},
						points: {
							radius: 0,
							show: true
						},
						shadowSize: 2
					},
					grid: {
						hoverable: true,
						clickable: true,
						tickColor: "#d5d5d5",
						borderWidth: 1,
						color: '#d5d5d5'
					},
					colors: ["#1ab394", "#1C84C6"],
					xaxis:{
					},
					yaxis: {
						ticks: 4
					},
					tooltip: false
				}
				);

			var doughnutData = [
			{
				value: 300,
				color: "#a3e1d4",
				highlight: "#1ab394",
				label: "App"
			},
			{
				value: 50,
				color: "#dedede",
				highlight: "#1ab394",
				label: "Software"
			},
			{
				value: 100,
				color: "#A4CEE8",
				highlight: "#1ab394",
				label: "Laptop"
			}
			];

			var doughnutOptions = {
				segmentShowStroke: true,
				segmentStrokeColor: "#fff",
				segmentStrokeWidth: 2,
                percentageInnerCutout: 45, // This is 0 for Pie charts
                animationSteps: 100,
                animationEasing: "easeOutBounce",
                animateRotate: true,
                animateScale: false
            };

            var ctx = document.getElementById("doughnutChart").getContext("2d");
            var DoughnutChart = new Chart(ctx).Doughnut(doughnutData, doughnutOptions);

            var polarData = [
            {
            	value: 300,
            	color: "#a3e1d4",
            	highlight: "#1ab394",
            	label: "App"
            },
            {
            	value: 140,
            	color: "#dedede",
            	highlight: "#1ab394",
            	label: "Software"
            },
            {
            	value: 200,
            	color: "#A4CEE8",
            	highlight: "#1ab394",
            	label: "Laptop"
            }
            ];

            var polarOptions = {
            	scaleShowLabelBackdrop: true,
            	scaleBackdropColor: "rgba(255,255,255,0.75)",
            	scaleBeginAtZero: true,
            	scaleBackdropPaddingY: 1,
            	scaleBackdropPaddingX: 1,
            	scaleShowLine: true,
            	segmentShowStroke: true,
            	segmentStrokeColor: "#fff",
            	segmentStrokeWidth: 2,
            	animationSteps: 100,
            	animationEasing: "easeOutBounce",
            	animateRotate: true,
            	animateScale: false
            };
            var ctx = document.getElementById("polarChart").getContext("2d");
            var Polarchart = new Chart(ctx).PolarArea(polarData, polarOptions);

        });*/
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
								<li><a href="login.html">Logout</a></li>
							</ul>
						</div>
						<div class="logo-element">
							IN+
						</div>
					</li>
					<li class="active">
						<a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Students</span> <span class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
							<li><a href="<?php echo base_url();?>students">Show list</a></li>
							<li><a href="<?php echo base_url();?>students/add">Add Student</a></li>
							<li><a href="<?php echo base_url();?>students/search">Search Student</a></li>
						</ul>
					</li> <br>

					<li class="active">
						<a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Sản phẩm</span> <span class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
							<li><a href="<?php echo base_url();?>product">List sản phẩm</a></li>
							<li><a href="<?php echo base_url();?>product/add">Thêm sản phẩm</a></li>
							<li><a href="<?php echo base_url();?>product/search">Tìm kiếm sản phẩm</a></li>
						</ul>
					</li> <br>

					<li class="active">
						<a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Reports</span> <span class="fa arrow"></span></a>
					</li>
					<!-- <li>
						<a href="layouts.html"><i class="fa fa-diamond"></i> <span class="nav-label">Layouts</span></a>
					</li>
					<li>
						<a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Graphs</span><span class="fa arrow"></span></a>
						<ul class="nav nav-second-level collapse">
							<li><a href="graph_flot.html">Flot Charts</a></li>
						</ul>
					</li>

					<li>
						<a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Forms</span><span class="fa arrow"></span></a>
						<ul class="nav nav-second-level collapse">
							<li><a href="form_basic.html">Basic form</a></li>
						</ul>
					</li>
					<li>
						<a href="#"><i class="fa fa-desktop"></i> <span class="nav-label">App Views</span>  <span class="pull-right label label-primary">SPECIAL</span></a>
						<ul class="nav nav-second-level collapse">
							<li><a href="contacts.html">Contacts</a></li>
							<li><a href="profile.html">Profile</a></li>
							<li><a href="profile_2.html">Profile v.2</a></li>
							<li><a href="contacts_2.html">Contacts v.2</a></li>
							<li><a href="projects.html">Projects</a></li>
							<li><a href="project_detail.html">Project detail</a></li>
							<li><a href="teams_board.html">Teams board</a></li>
							<li><a href="social_feed.html">Social feed</a></li>
							<li><a href="clients.html">Clients</a></li>
							<li><a href="full_height.html">Outlook view</a></li>
							<li><a href="vote_list.html">Vote list</a></li>
							<li><a href="file_manager.html">File manager</a></li>
							<li><a href="calendar.html">Calendar</a></li>
							<li><a href="issue_tracker.html">Issue tracker</a></li>
							<li><a href="blog.html">Blog</a></li>
							<li><a href="article.html">Article</a></li>
							<li><a href="faq.html">FAQ</a></li>
							<li><a href="timeline.html">Timeline</a></li>
							<li><a href="pin_board.html">Pin board</a></li>
						</ul>
					</li>
					<li>
						<a href="#"><i class="fa fa-files-o"></i> <span class="nav-label">Other Pages</span><span class="fa arrow"></span></a>
						<ul class="nav nav-second-level collapse">
							<li><a href="search_results.html">Search results</a></li>
							<li><a href="lockscreen.html">Lockscreen</a></li>
							<li><a href="invoice.html">Invoice</a></li>
							<li><a href="login.html">Login</a></li>
							<li><a href="login_two_columns.html">Login v.2</a></li>
							<li><a href="forgot_password.html">Forget password</a></li>
							<li><a href="register.html">Register</a></li>
							<li><a href="404.html">404 Page</a></li>
							<li><a href="500.html">500 Page</a></li>
							<li><a href="empty_page.html">Empty page</a></li>
						</ul>
					</li>
					<li>
						<a href="#"><i class="fa fa-globe"></i> <span class="nav-label">Miscellaneous</span><span class="label label-info pull-right">NEW</span></a>
						<ul class="nav nav-second-level collapse">
							<li><a href="toastr_notifications.html">Notification</a></li>
							<li><a href="nestable_list.html">Nestable list</a></li>
							<li><a href="agile_board.html">Agile board</a></li>
							<li><a href="timeline_2.html">Timeline v.2</a></li>
							<li><a href="diff.html">Diff</a></li>
							<li><a href="sweetalert.html">Sweet alert</a></li>
							<li><a href="idle_timer.html">Idle timer</a></li>
							<li><a href="spinners.html">Spinners</a></li>
							<li><a href="tinycon.html">Live favicon</a></li>
							<li><a href="google_maps.html">Google maps</a></li>
							<li><a href="code_editor.html">Code editor</a></li>
							<li><a href="modal_window.html">Modal window</a></li>
							<li><a href="forum_main.html">Forum view</a></li>
							<li><a href="validation.html">Validation</a></li>
							<li><a href="tree_view.html">Tree view</a></li>
							<li><a href="chat_view.html">Chat view</a></li>
							<li><a href="masonry.html">Masonry</a></li>
						</ul>
					</li>
					<li>
						<a href="#"><i class="fa fa-flask"></i> <span class="nav-label">UI Elements</span><span class="fa arrow"></span></a>
						<ul class="nav nav-second-level collapse">
							<li><a href="typography.html">Typography</a></li>
							<li><a href="icons.html">Icons</a></li>
							<li><a href="draggable_panels.html">Draggable Panels</a></li>
							<li><a href="buttons.html">Buttons</a></li>
							<li><a href="video.html">Video</a></li>
							<li><a href="tabs_panels.html">Panels</a></li>
							<li><a href="tabs.html">Tabs</a></li>
							<li><a href="notifications.html">Notifications & Tooltips</a></li>
							<li><a href="badges_labels.html">Badges, Labels, Progress</a></li>
						</ul>
					</li>

					<li>
						<a href="grid_options.html"><i class="fa fa-laptop"></i> <span class="nav-label">Grid options</span></a>
					</li>
					<li>
						<a href="#"><i class="fa fa-table"></i> <span class="nav-label">Tables</span><span class="fa arrow"></span></a>
						<ul class="nav nav-second-level collapse">
							<li><a href="table_basic.html">Static Tables</a></li>
							<li><a href="table_data_tables.html">Data Tables</a></li>
							<li><a href="table_foo_table.html">Foo Tables</a></li>
							<li><a href="jq_grid.html">jqGrid</a></li>
						</ul>
					</li>
					<li>
						<a href="#"><i class="fa fa-shopping-cart"></i> <span class="nav-label">E-commerce</span><span class="fa arrow"></span></a>
						<ul class="nav nav-second-level collapse">
							<li><a href="ecommerce_products_grid.html">Products grid</a></li>
							<li><a href="ecommerce_product_list.html">Products list</a></li>
							<li><a href="ecommerce_product.html">Product edit</a></li>
							<li><a href="ecommerce_product_detail.html">Product detail</a></li>
							<li><a href="ecommerce-orders.html">Orders</a></li>
							<li><a href="ecommerce_payments.html">Credit Card form</a></li>
						</ul>
					</li>
					<li>
						<a href="#"><i class="fa fa-picture-o"></i> <span class="nav-label">Gallery</span><span class="fa arrow"></span></a>
						<ul class="nav nav-second-level collapse">
							<li><a href="basic_gallery.html">Lightbox Gallery</a></li>
							<li><a href="slick_carousel.html">Slick Carousel</a></li>
							<li><a href="carousel.html">Bootstrap Carousel</a></li>

						</ul>
					</li>

					<li>
						<a href="css_animation.html"><i class="fa fa-magic"></i> <span class="nav-label">CSS Animations </span><span class="label label-info pull-right">62</span></a>
					</li>
					<li class="landing_link">
						<a target="_blank" href="landing.html"><i class="fa fa-star"></i> <span class="nav-label">Landing Page</span> <span class="label label-warning pull-right">NEW</span></a>
					</li> -->
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
							<span class="m-r-sm text-muted welcome-message">Welcome to INSPINIA+ Admin Theme.</span>
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
						<li class="dropdown">
							<ul class="dropdown-menu dropdown-alerts">
								<li>
									<a href="mailbox.html">
										<div>
											<i class="fa fa-envelope fa-fw"></i> You have 16 messages
											<span class="pull-right text-muted small">4 minutes ago</span>
										</div>
									</a>
								</li>
								<li class="divider"></li>
								<li>
									<a href="profile.html">
										<div>
											<i class="fa fa-twitter fa-fw"></i> 3 New Followers
											<span class="pull-right text-muted small">12 minutes ago</span>
										</div>
									</a>
								</li>
								<li class="divider"></li>
								<li>
									<a href="grid_options.html">
										<div>
											<i class="fa fa-upload fa-fw"></i> Server Rebooted
											<span class="pull-right text-muted small">4 minutes ago</span>
										</div>
									</a>
								</li>
								<li class="divider"></li>
								<li>
									<div class="text-center link-block">
										<a href="notifications.html">
											<strong>See All Alerts</strong>
											<i class="fa fa-angle-right"></i>
										</a>
									</div>
								</li>
							</ul>
						</li>


						<li>
							<a href="login.html">
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
				<?php

					//echo $this->pagination->create_links();
				?>
				<?php $this->load->view($subview); ?>
			</div>

		</div>


	</div>

</body>
</html>
