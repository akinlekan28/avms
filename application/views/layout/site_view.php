<!DOCTYPE html>
<html lang="en">

<head>
 
  <!--Meta-->
  <meta charset="UTF-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="description" content="avms funaab chapter website">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!--Favicon-->
  <link rel="icon" href="assets/img/favicon/144x144.png">
  
  <!-- Title-->
  <title>Avms Funaab</title>
  
  <!--Google fonts-->
  <link href="https://fonts.googleapis.com/css?family=Dosis:400,500,600,700%7COpen+Sans:400,600,700" rel="stylesheet">
  
	<!--Icon fonts-->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/strokegap/style.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/linearicons/style.css">
  
  <!-- Stylesheet-->

<!--  <link rel="stylesheet" href="assets/vendor/bootstrap/dist/css/bootstrap.min.css">  
  <link rel="stylesheet" href="assets/vendor/slick-carousel/slick/slick.css">
  <link rel="stylesheet" href="assets/vendor/fancybox/dist/jquery.fancybox.min.css">
  <link rel="stylesheet" href="assets/vendor/animate.css/animate.min.css">-->
  
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bundle.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
  
</head>

 <body id="top">
 
 <?php

 $this->load->view('partials/header');
    
    if (is_array($view_url)):
      foreach ($view_url as $inner_view):
         $this->load->view($inner_view);
      endforeach;

      else: $this->load->view($view_url);
      
    endif;

      $this->load->view('partials/footer');

?>