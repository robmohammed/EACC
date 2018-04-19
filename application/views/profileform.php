<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User</title>

        <link rel="icon" type="image/png" href="<?php echo base_url(); ?>images/icons/eacc logo.png"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/main.css"> 
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/home.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/NewEvent.css"> 


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

  <!-- <li class="navlinks"><a class="navlink" href="<?php echo site_url(); ?>/auth/members">Members</a></li> -->
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

$e = $_SESSION['email'];

$sql = "SELECT * FROM personal WHERE Email = '$e'";
  
$array = array();

$em = mysqli_query($conn, $sql);
while($r = mysqli_fetch_assoc($em)){
    $array['fname'] = $r['First_Name'];
    $array['lname'] = $r['Last_Name'];
    $array['interest'] = $r['Interest'];
    $array['contact'] = $r['ContactNumber'];
    $array['degree'] = $r['Degree'];
}    

?>


<div class="posts" style="width:800px; margin:0 auto;">

   



<div class="container"> 
    <br> 
  <form action="" method="post">
    <h3>Update Profile Information</h3>
    <br>
    <fieldset>
      <label for="firstname" class="heading">First Name:</label>

      <input class="form" id="firstname" name="firstname" value="<?php echo $array['fname'] ?>" type="text" tabindex="1" required autofocus>
    </fieldset>
 
    <fieldset>
        <label for="lastname" class="heading">Last Name:</label>  
         <input class="form" id="lastname" name="lastname" value="<?php echo $array['lname'] ?>" type="text" tabindex="2" required>
    </fieldset>
    <fieldset>
      <label for="interest" class="heading">Interest:</label>
      <input  class="form" id="interest" name="interest" value="<?php echo $array['interest'] ?>" type="text" tabindex="3" required>
    </fieldset>
    <fieldset>       
        <label for="contact" class="heading">Contact Number:</label>
      <input class="form" id="contact" name="contact" value="<?php echo $array['contact'] ?>" type="text" tabindex="4" required>
    </fieldset>
    <fieldset>
    <label for="degree" class="heading">Degree:</label>
      <input class="form" id="degree" name="degree" value="<?php echo $array['degree'] ?>" tabindex="5" required></textarea>
    </fieldset>
    <fieldset>
      <button class="post" name="save" type="submit" id="save">Save</button>
    </fieldset>
  </form>
</div>



</div>


<br><br>
    
</body>

</html>


<?php
require ('connection.php');



if(isset($_POST['save'])){

  $email = $_SESSION['email'];
$fname = $_POST['firstname'];
$last = $_POST['lastname'];
$int = $_POST['interest'];
$contact = $_POST['contact'];
$degree = $_POST['degree'];

$query = "UPDATE personal SET First_Name='$fname', Last_Name='$last', Interest='$int', ContactNumber='$contact', Degree='$degree' WHERE Email='$email'";

    $run = mysqli_query($conn, $query);
    redirect(site_url() . "/User/profile");

}


?>
