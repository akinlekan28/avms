<!doctype html>
<html lang="en">

<head>
	<title>AVMS | Dashboard</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="<?php echo base_url();?>assetadmin/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assetadmin/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assetadmin/vendor/linearicons/style.css">
	<link href="<?php echo base_url();?>assetadmin/css/jquery.dataTables.min.css" rel="stylesheet">
	
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="<?php echo base_url();?>assetadmin/css/main.css">

	<script src="<?php echo base_url();?>assetadmin/vendor/jquery/jquery.min.js"></script>
	<link href="<?php echo base_url();?>assetadmin/css/sweetalert.css" rel="stylesheet" type="text/css"/>
	<script src="<?php echo base_url();?>assetadmin/scripts/jquery.dataTables.min.js"></script>

	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">

	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url();?>assetadmin/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url();?>assetadmin/img/favicon.png">
</head>
<body>
	<!-- WRAPPER -->
	<div id="wrapper">

		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="index-2.html"><img src="<?php echo base_url();?>assetadmin/img/logo-dark.png" alt="Klorofil Logo" class="img-responsive logo"></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>

				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?php echo base_url();?>assetadmin/img/user.png" class="img-circle" alt="Avatar"> <span> Hello <?php echo $u->firstname?>!</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo site_url('admin/signout');?>"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
    <!-- END NAVBAR -->
    
    <div id="sidebar-nav" class="sidebar">
			 <div class="sidebar-scroll">
				<nav>
	<ul class="nav">
			<li><a href="<?php echo site_url('dashboard');?>"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
						
			<li>
				<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-magic-wand"></i> <span>News</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
				<div id="subPages" class="collapse ">
					<ul class="nav">
							<li><a href="<?php echo site_url('dashboard/addnews');?>" class="">Add News</a></li>
							<li><a href="<?php echo site_url('dashboard/viewnews');?>" class="">View News</a></li>
					</ul>
				</div>
      </li>

      <li>
				<a href="#subPage" data-toggle="collapse" class="collapsed"><i class="lnr lnr-pencil"></i> <span>Blog Post</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
				<div id="subPage" class="collapse ">
					<ul class="nav">
              <li><a href="<?php echo site_url('dashboard/categories');?>" class="">Category</a></li>
							<li><a href="<?php echo site_url('dashboard/addpost');?>" class="">Add Post</a></li>
							<li><a href="<?php echo site_url('dashboard/viewpost');?>" class="">View Posts</a></li>
							<li><a href="<?php echo site_url('dashboard/draftpost');?>" class="">Drafts</a></li>
					</ul>
				</div>
			</li>
      
      <li><a href="<?php echo site_url('dashboard/materials');?>" class=""><i class="lnr lnr-map"></i> <span>Study Materials</span></a></li>

       <li><a href="<?php echo site_url('dashboard/dues');?>" class=""><i class="lnr lnr-inbox"></i> <span>Annual Dues</span></a></li>

			 <li><a href="<?php echo site_url('dashboard/executives');?>" class=""><i class="lnr lnr-bookmark"></i> <span>Executives</span></a></li>
			 
			 <li><a href="<?php echo site_url('dashboard/access');?>" class=""><i class="lnr lnr-user"></i> <span>Access Control</span></a></li>


				
	</ul>				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->

		<!-- MAIN -->
		<div class="main">

			<!-- MAIN CONTENT -->
			<div class="main-content">
			<div class="container-fluid">