<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo $titlePage; ?></title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="Hasegawa Kaito" />
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/admin/css/style.css" charset="utf-8" /> -->
	<script language="javascript">
		function xacnhan() {
			if (!window.confirm('You want delete ?')) {
				return false;
			}
		}
	</script>

</head>
<body id="manage">
	<div id="header">
		<ul id="menu">
			<li><a href="<? echo $base_url."index.php/students/add"; ?>">Add Student</a></li>
			<!-- <li><a href="<?php echo base_url(); ?>index.php/user">User</a></li> -->
			<li><a href="<? echo $base_url."index.php/students/search"; ?>">Search</a></li>
			<li><a href="#">Note</a></li>
			<li><a href="<? echo $base_url.""; ?>">INDEX</a></li>
		</ul>
		<p>
			Xin chào <span>Happy</span>
			<a href="#">[ Thoát ]</a>
		</p>
	</div><!-- End header -->
	
	<div id="content"><!-- ======== -->
		<div class="container">
			<? $this->load->view($subview); ?>
		</div>
	</div><!-- End #content -->

</body>
</html>
