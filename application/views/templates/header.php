<!-- <!DOCTYPE html>
<html>
<head>
	<title>GOR Virtual</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css">
</head>
<body>
	<nav>
		<a href="<?php echo base_url(); ?>">Home</a>
		<a href="<?php echo base_url(); ?>venues">Venues</a>

		<?php if($this->session->userdata('logged_in') != true): ?>
			<a href="<?php echo base_url(); ?>users/register">Register</a>
			<a href="<?php echo base_url(); ?>users/login">Login</a>
		<?php endif; ?>

		<?php if($this->session->userdata('logged_in') === true): ?>
			<a href="<?php echo base_url(); ?>bookings">My Bookings</a>
			<a href="<?php echo base_url(); ?>lobbies">Lobbies</a>
			<a href="<?php echo base_url(); ?>users/logout">Logout</a>
		<?php endif; ?>
	</nav>
	<div class="container">
 -->
 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Gelanggang Olah Raga Virtual</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="<?php echo base_url(); ?>assets/img/favicon.png" rel="icon">
  <link href="<?php echo base_url(); ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="<?php echo base_url(); ?>assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="<?php echo base_url(); ?>assets/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/lib/animate/animate.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/lib/magnific-popup/magnific-popup.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/lib/ionicons/css/ionicons.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: Reveal
    Theme URL: https://bootstrapmade.com/reveal-bootstrap-corporate-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body id="body">

  <!--==========================
    Top Bar
  ============================-->
  <section id="topbar" class="d-none d-lg-block">
    <div class="container clearfix">
      <div class="contact-info float-left">
        <i class="fa fa-envelope-o"></i> <a href="mailto:admin@gorvirtual.com">admin@gorvirtual.com</a>
        <i class="fa fa-phone"></i>+628119207543
      </div>
      <!-- <div class="social-links float-right">
        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
        <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
        <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
        <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
      </div> -->
    </div>
  </section>

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <h1><a href="<?php echo base_url(); ?>pages/view" class="scrollto">GOR<span>Virtual</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#body"><img src="img/logo.png" alt="" title="" /></a>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="<?php echo base_url(); ?>pages/view">Home</a></li>
          <?php if(!$this->session->userdata('logged_in')):?>
            <li><a href="<?php echo base_url(); ?>pages/view#about">About Us</a></li>
          <?php endif;?>
          <li><a href="#">Panduan Pemakaian</a></li>
          <li><a href="<?php echo base_url(); ?>venues/index">Daftar Arena</a></li>
          <?php if($this->session->userdata('logged_in')):?>
            <li><a href="<?php echo base_url(); ?>lobbies/index">Lobby</a></li>
          <?php endif;?>
          <li class="menu-has-children"><a href="">User Menu</a>
            <ul>
            <?php if(!$this->session->userdata('logged_in') && !$this->session->userdata('logged_inadmin')):?>
              <li><a href="<?php echo base_url(); ?>users/register">Registrasi</a></li>
              <li><a href="<?php echo base_url(); ?>users/login">Login</a></li>
              <li><a href="<?php echo base_url(); ?>admins/login">Admin</a></li>
            <?php endif; ?>
            <?php if($this->session->userdata('logged_inadmin')):?>
              <li><a href="<?php echo base_url(); ?>admins/dashboard">Admin Page</a></li>
            <?php endif; ?>
            <?php if($this->session->userdata('logged_in')):?>
              <li><a href="<?php echo base_url(); ?>users/profile">Profile</a></li>
              <li><a href="<?php echo base_url(); ?>bookings/index">Pemesanan</a></li>
              <li><a href="<?php echo base_url(); ?>users/logout">Logout</a></li>
            <?php endif; ?>
            </ul>
          </li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->