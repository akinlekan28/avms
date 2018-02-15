<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>AVMS | Reset Password</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

  <link rel="stylesheet" href="<?php echo base_url();?>assetadmin/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assetadmin/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assetadmin/vendor/linearicons/style.css">

	<!-- MAIN CSS -->
	<link rel="stylesheet" href="<?php echo base_url();?>assetadmin/css/main.css">

	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">

	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
  <style>
    
    @media screen and (max-width: 425px ){
      .mt{
      margin-bottom: 30px;
    }
    }
  </style>
</head>
<body>
	<!-- WRAPPER -->
	<div id="wrapper">

		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box lockscreen clearfix">
					<div class="content">
						<h4 class="text-center mt">Reset Password</h4>
						<form method="POST">
            <p><?php echo form_error('email')?></p>
             <div style="color: red; font-size: 15px;">
          <strong>
            <?php if(isset($response)):?>
              <?php if($response == FALSE):?>
                <?php echo $message . '<br><br>';?>
                <?php endif?>
                 <?php endif?>
          </strong>
        </div>
        
        <div style="color: green; font-size: 15px;">
          <strong>
            <?php if(isset($response)):?>
                <?php if($response == TRUE):?>
                  <?php echo $message;?>
                  <?php endif?>
                  <?php endif?>
          </strong>
        </div>
							<div class="input-group">
								<input type="email" class="form-control" placeholder="Enter your email" name="email">
								<span class="input-group-btn"><button type="submit" class="btn btn-primary"><i class="fa fa-arrow-right"></i></button></span>
							</div>
						</form>
						<br>
						<div class="text-left">
              <a href="<?php echo base_url()?>admin"><i class="fa fa-lock"></i> Back to Login</a>
            </div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->

</body>

</html>