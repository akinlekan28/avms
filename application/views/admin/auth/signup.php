<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>AVMS | Sign up</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="<?php echo base_url();?>assetadmin/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assetadmin/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assetadmin/vendor/linearicons/style.css">
	
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="<?php echo base_url();?>assetadmin/css/main.css">

	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">

	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url();?>assetadmin/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url();?>assetadmin/img/favicon.png">
  <style>
    .signup-form{
      width:40%;
      margin: auto;
      margin-top: 100px;
    }
    @media screen and (max-width: 475px ) {
      .signup-form{
      width:90%;
      margin: auto;
      margin-top: 100px;
     }
     .mt{
       margin-top: 10px;
     }
    }
    @media screen and (min-width: 768px ) and (max-width: 1023px) {
      .signup-form{
      width:80%;
      margin: auto;
      margin-top: 100px;
     }
    }
  </style>
</head>
<body>
	<!-- WRAPPER -->
	<div id="wrapper signup-form">

    <div class="row">
		<div class="col-md-12">
			<!-- PANEL HEADLINE -->
			<div class="panel panel-headline signup-form">
				<div class="panel-heading">
					<h3 class="panel-title text-center">Sign Up</h3>
				</div>
				<div class="panel-body">
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
          <form method="post">

            <div class="form-group">
              <input type="text" name="firstname" Placeholder="First Name" class="form-control">
              <p><?php echo form_error('firstname')?></p>
            </div>

            <div class="form-group">
              <input type="text" name="lastname" Placeholder="Last Name" class="form-control">
              <p><?php echo form_error('lastname')?></p>
            </div>

            <div class="form-group">
              <input type="email" name="email" Placeholder="email" class="form-control">
              <p><?php echo form_error('email')?></p>
            </div>

            <div class="form-group">
              <input type="password" name="password" Placeholder="Password" class="form-control">
              <p><?php echo form_error('password')?></p>
            </div>

            <div class="text-center">
              <input type="submit" value="Submit" name="signup" class="btn btn-primary">
            </div>

            <div class="text-left mt">
              <a href="<?php echo base_url()?>admin"><i class="fa fa-lock"></i> Back to Login</a>
            </div>

          </form>
				</div>
			</div>
			<!-- END PANEL HEADLINE -->
		</div>
</div>
		
	</div>

</body>
</html>