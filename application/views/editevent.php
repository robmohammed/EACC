<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User</title>

        <link rel="icon" type="image/png" href="<?php echo base_url(); ?>images/icons/eacc logo.png"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/main.css"> 
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/home.css">
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


<div class="aboutform">

   

<form class="form-horizontal" action="" method="POST">
<fieldset>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">First Name</label>  
  <div class="col-md-4">
  <input id="firstname" name="firstname" value="<?php echo $array['fname'] ?>" class="form-control input-md" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Last Name</label>  
  <div class="col-md-4">
  <input id="lastname" name="lastname" value="<?php echo $array['lname'] ?>" class="form-control input-md" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Interest</label>  
  <div class="col-md-4">
  <input id="interest" name="interest" value="<?php echo $array['interest'] ?>" class="form-control input-md" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Contact Number</label>  
  <div class="col-md-4">
  <input id="contact" name="contact" value="<?php echo $array['contact'] ?>" class="form-control input-md" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Degree</label>  
  <div class="col-md-4">
  <input id="degree" name="degree" value="<?php echo $array['degree'] ?>" class="form-control input-md" type="text">
    
  </div>
</div>
<br>

<!-- Button -->
<div class="form-group">
  <div class="col-md-4">
    <button type='submit'  id="save" name="save" class="save">Save</button>
  </div>
</div>

</fieldset>
</form>



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
