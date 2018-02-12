<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Avms | Admin Login</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="<?php echo base_url();?>assetadmin/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assetadmin/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assetadmin/vendor/linearicons/style.css">

	<!-- MAIN CSS -->
	<link rel="stylesheet" href="<?php echo base_url();?>assetadmin/css/main.css">

	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">

	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url();?>assetadmin/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url();?>assetadmin/img/favicon.png">
</head>
<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content login-fix">
							<div class="header">
								<div class="logo text-center"><img src="<?php echo base_url();?>assetadmin/img/logo-dark.png" alt="Klorofil Logo"></div>
								<p class="lead">Login to your account</p>
							</div>
							<div style="color: red; font-size: 15px;">
                                <?php if(isset($response)):?>
                                    <?php if($response == TRUE):?>
                                        <?php echo $message;?>
                                    <?php endif?>
                                    <?php if($response == FALSE):?>
                                        <?php echo $message . '<br>.<br>';?>
                                    <?php endif?>
                                <?php endif?>
                            </div>
							<form class="form-auth-small" method="POST">
								<div class="form-group">
									<label for="signin-email" class="control-label sr-only">Email</label>
                  <input type="email" class="form-control" name="email" placeholder="Email">
                  <p><?php echo form_error('email')?></p>
								</div>
								<div class="form-group">
									<label for="signin-password" class="control-label sr-only">Password</label>
                  <input type="password" class="form-control" name="password" placeholder="Password">
                  <p><?php echo form_error('password')?></p>
								</div>
								<div class="form-group clearfix">
									<label class="fancy-checkbox element-left">
										<input type="checkbox">
										<span>Remember me</span>
									</label>
								</div>
								<button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
								<div class="bottom">
									<span class="helper-text"><i class="fa fa-lock"></i> <a href="#">Forgot password?</a></span>
									<span class="helper-text"><i class="fa fa-user"></i> <a href="<?php echo site_url('admin/signup')?>">Register</a></span>
								</div>
							</form>
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
              <h2 class="heading">Association of Veterinary Medical Students</h2>
              <p><small>Funaab Chapter</small></p>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->

</body>
</html>