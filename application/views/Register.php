<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?php echo base_url(); ?>images/icons/eacc logo.png"/>
<!--===============================================================================================-->
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/main.css">
	<link rel="icon" type="image/png" href="<?php echo base_url(); ?>images/icons/eacc logo.png"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/home.css">
<!--===============================================================================================-->
</head>
<body>

	<ul class="navbar">
  <li class="navlinks"><a class="navlink" href="<?php  echo site_url(); ?>/auth/home">Home</a></li>
  <li class="navlinks"><a class="navlink" href="<?php echo site_url(); ?>/auth/about">About</a></li>
  <li class="navlinks"><a class="navlink" href="<?php echo site_url(); ?>/auth/contact">Contact</a></li>
  <li class="navlinks"><a class="navlink" href="<?php echo site_url(); ?>/blog2/index">Events</a></li>
  <li class="navlinks"><img src="<?php echo base_url(); ?>images/banner1.jpeg" class="banner"></li>
  <li class="signs1"><a class="active navlink" href="<?php echo site_url(); ?>/auth/register">Register</a></li>
  <li class="signs2"><a class="navlink" href="<?php echo site_url(); ?>/auth/login">Login</a></li>

</ul>

<br>
<br>
<br>
<br>


    <div class="background">
       
    </div>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100">

                <?php if (isset($_SESSION['success'])) { ?>
                    <div class="alert alert-success"> <?php echo $_SESSION['success']; ?> </div>

                <?php
                }  ?>
                <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>


				<form  action="" method="POST" class="login100-form validate-form">
				  <span class="login100-form-logo">  </span> <span class="login100-form-title p-b-34 p-t-27"> Registration </span>
				  
				  <div class="wrap-input100 validate-input" data-validate = "First Name">
						<input class="input100" type="text" name="fname" placeholder="First Name">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate = "Last Name">
						<input class="input100" type="text" name="lname" placeholder="Last Name">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
				  
				  <div class="wrap-input100 validate-input" data-validate = "email" id="email" name="email" required>
						<input class="input100" type="text" name="email" placeholder="Email Address">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="password">
						<input class="input100" type="password" placeholder="Password" name="password" id="password" required="required" minlength="6">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>


					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="register">
							Create Account
						</button>
					</div>

					<div class="text-center p-t-90">
						<a href="<?php echo site_url(); ?>/auth/login" class="links"> Already have an Account? Click here to Login </a>		
						
					</div>

					
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	

</body>
</html>