
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User</title>

        <link rel="icon" type="image/png" href="<?php echo base_url(); ?>images/icons/eacc logo.png"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/main.css"> 
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/home.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/profile.css">
    
</head>
<body>

<?php if (isset($_SESSION['success'])) { ?>
                    <div class="alert alert-success"> <?php echo $_SESSION['success']; ?> </div>

                <?php
                }  ?>
                <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

<div class="background">
</div>
<ul class="navbar">
  <li class="navlinks"><a class="navlink" href="<?php  echo site_url(); ?>/auth/home">Home</a></li>
  <li class="navlinks"><a class="navlink" href="<?php echo site_url(); ?>/auth/about">About</a></li>
  <li class="navlinks"><a class="navlink" href="#contact">Contact</a></li>
  <li class="navlinks"><a class="navlink" href="<?php echo site_url(); ?>/blog2/index">Events</a></li>

  <li class="navlinks"><img src="<?php echo base_url(); ?>images/banner1.jpeg" class="banner"></li>

  <?php if (!isset($_SESSION['user_logged'])) {
             echo('<li class="signs1"><a class="navlink" href="'.site_url("auth/register").'">Register</a></li>');
             echo ('<li class="signs2"><a class="navlink" href="'.site_url("auth/login").'">Login</a></li>');
        } else {

          echo ('<li class="signs2"><a class="navlink" href=" '.site_url("auth/logout").'">Logout</a></li>');
          echo ('<li class="signs2"><a class="active navlink" href=" '.site_url("User/profile").'">'.$_SESSION['fname'].' '. $_SESSION['lname'].'</a></li>');
        }
  ?>

</ul>
<br><br>
<br><br>
<br><br>

<?php
require('connection.php');

    
$array = array();

$e = $_SESSION['email'];
$email ="SELECT * FROM personal WHERE Email='$e'";
$em = mysqli_query($conn, $email);
while($r = mysqli_fetch_assoc($em)){
    $array['email'] = $r['Email'];
    $array['fname'] = $r['First_Name'];
    $array['lname'] = $r['Last_Name'];
    $array['interest'] = $r['Interest'];
    $array['contact'] = $r['ContactNumber'];
    $array['degree'] = $r['Degree'];
}    

?>

<div class="profiledata">
        <?php 
        $last = $array['lname'];
        if(substr("$last", -1) == 's'){
            echo "<h1 class='owner'>" . $array['fname'] . " " . $array['lname'] . "' Profile</h1>";

        } else {
           echo "<h1 class='owner'>" . $array['fname'] . " " . $array['lname'] . "'s Profile</h1>";

        }
        ?>
        <br>
        
        <h3>Name: <?php echo $array['fname'] . " " . $array['lname']; ?></h2>
        <br>
        <br>
        <h3>Interests:</h3>
        <p><?php echo $array['interest']; ?> </p>
        <br>
        <br>
        <br>
        <h3>Contact Number: <?php echo " ". $array['contact']; ?> </h3>
        <br>
        <br>
        <h3>Degree: <?php echo " ". $array['degree']; ?> </h3>
        <br>
        <div class="edit">
            <h2><a href="<?php echo site_url(); ?>/User/profileform">Click here to edit this data </a></h2>    

        </div>


</div>>



<br><br>
    
</body>

</html>