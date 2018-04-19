<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About</title>


    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>images/icons/eacc logo.png"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/home.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/main.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/about.css"> 

</head>
<body>
<div>
<ul class="navbar">
  <li class="navlinks"><a class="navlink" href="<?php  echo site_url(); ?>/auth/home">Home</a></li>
  <li class="navlinks"><a class="active navlink" href="<?php echo site_url(); ?>/auth/about">About</a></li>
  <li class="navlinks"><a class="navlink" href="<?php echo site_url(); ?>/auth/contact">Contact</a></li>
  <li class="navlinks"><a class="navlink" href="<?php echo site_url(); ?>/blog2/index">Events</a></li>
  <li class="navlinks"><img src="<?php echo base_url(); ?>images/banner1.jpeg" class="banner"></li>
  <?php if (!isset($_SESSION['user_logged'])) {
            echo('<li class="signs1"><a class="navlink" href="'.site_url("auth/register").'">Register</a></li>');
            echo ('<li class="signs2"><a class="navlink" href="'.site_url("auth/login").'">Login</a></li>');
        } else {
            echo ('<li class="signs2"><a class="navlink" href=" '.site_url("auth/logout").'">Logout</a></li>');
            if($_SESSION['member']==TRUE){
                echo ('<li class="signs2"><a class="navlink" href=" '.site_url("User/profile").'">'.$_SESSION['fname'].' '. $_SESSION['lname'].'</a></li>');
    
            }    

        }
  ?>
</ul>
</div>
<div class="background">

</div>
<br>
<br>
<br>
<br>
<br>
<br>

<div class="about">
    
<ul class="aboutinfo">
  
    <li class="abt"><h1>About</h1>
        <p>The UWI EACC celebrates Chinese, Japanese and Korean <br>
            cultures through events, educative workshops and forums. <br>
            Members can participate in events and be part of the community. <br>
            Come, make an account and join us today!</p> </li>
    <li><img src="<?php echo base_url(); ?>/images/Collage.jpg" class="collage"></li>

</ul>
    

</div>
      

  


    
</body>
</html>