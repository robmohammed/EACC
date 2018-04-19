<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
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
  <li class="signs1"><a class="navlink" href="<?php echo site_url(); ?>/auth/register">Register</a></li>
  <li class="signs2"><a class="active navlink" href="<?php echo site_url(); ?>/auth/login">Login</a></li>


</ul>

<br>
<br>
<br>
<br>
    <div class="background">
       
</div>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">



				<form action="" method="POST" class="login100-form validate-form">
					<span class="login100-form-logo">
		
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter email">
						<input class="input100" type="text" name="email" id="email" placeholder="Email" required>
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password" id="password" required minlength="6">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="login" id="login">
							Login
						</button>
					</div>

					<div class="text-center p-t-90">
						<a href="<?php echo site_url(); ?>/auth/register" class="links"> Dont have an Account? Click here to Register </a>
							
						
					</div>

					
				</form>
			</div>
		</div>
	</div>

	<?php

	require('connection.php');

	if(isset($_POST['login'])){
		$email = $_POST['email'];
		$p = $_POST['password'];
		$pass = md5($_POST['password']);
		$check = "SELECT * FROM members WHERE Email = '$email' AND Password = '$pass'";
		$check2 = "SELECT * FROM admin WHERE Email = '$email' AND Password = '$p'";
		$sql = mysqli_query($conn, $check);
		$sql3 = mysqli_query($conn, $check2);
		if(mysqli_num_rows($sql) > 0){
			session_start();
			while($row = mysqli_fetch_assoc($sql)){


			$_SESSION['user_logged'] = TRUE;
			$_SESSION['member'] = TRUE;

			$_SESSION['id'] = $row['MemberID'];
			$_SESSION['email'] = $row['Email'];

			}
			$sql1 = "SELECT * FROM personal WHERE Email='$email'";
			$sql2 = mysqli_query($conn, $sql1);
			while($r = mysqli_fetch_assoc($sql2)){
				$_SESSION['fname'] = $r['First_Name'];
				$_SESSION['lname'] = $r['Last_Name'];
	
			}
			echo "<script>alert('Login Successful!')</script>";

			redirect('auth/home');
			
		}
		
		else if (mysqli_num_rows($sql3) > 0){

			while($row = mysqli_fetch_assoc($sql3)){
				session_start();
				$_SESSION['user_logged'] = TRUE;
				$_SESSION['member'] = FALSE;
				$_SESSION['admin'] = TRUE;
				$_SESSION['email'] = $row['Email'];
				redirect('auth/home');

			}


		}
		else {
			echo "<script>alert('Account not found in Database. Please ensure you entered correct data.')</script>";
			redirect("auth/login", "refresh");

		}
	}

	?>
	
	

</body>
</html>