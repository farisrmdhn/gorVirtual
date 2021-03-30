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
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap CSS File -->
  <link href="<?php echo base_url(); ?>assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?php echo base_url(); ?>assets/css/signin.css" rel="stylesheet">
</head>

<body class="text-center">
  <form class="form-signin" method="post" action="<?php echo base_url(); ?>admins/login">
    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
    <label for="inputEmail" class="sr-only">Username</label>
    <input type="email" name="username_admin" class="form-control" placeholder="Usernmae" required autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="password_admin" class="form-control" placeholder="Password" required>
    <input class="btn btn-lg btn-primary btn-block" type="submit" value="Sign In">
    <a class="mt-5 mb-3 text-muted" href="<?php echo base_url(); ?>pages/view">< Kembali</a>
  </form>
</body>
</html>
