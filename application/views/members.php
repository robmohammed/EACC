<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Members</title>


    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>images/icons/eacc logo.png"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/main.css"> 
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/home.css">


</head>
<body>
<div class="background">
</div>
<ul class="navbar">
  <li class="navlinks"><a class="navlink" href="<?php  echo site_url(); ?>/auth/home">Home</a></li>
  <li class="navlinks"><a class="navlink" href="<?php echo site_url(); ?>/auth/about">About</a></li>
  <li class="navlinks"><a class="navlink" href="#contact">Contact</a></li>
  <li class="navlinks"><a class="active navlink" href="<?php echo site_url(); ?>/auth/members">Members</a></li>
  <li class="navlinks"><a class="navlink" href="<?php echo site_url(); ?>/auth/events">Events</a></li>
  <li class="navlinks"><img src="<?php echo base_url(); ?>images/banner1.jpeg" class="banner"></li>

  <?php if (!isset($_SESSION['user_logged'])) {
             echo('<li class="signs1"><a class="navlink" href="'.site_url("auth/register").'">Register</a></li>');
             echo ('<li class="signs2"><a class="navlink" href="'.site_url("auth/login").'">Login</a></li>');
        } else {

          echo ('<li class="signs2"><a class="navlink" href=" '.site_url("auth/logout").'">Logout</a></li>');
          echo ('<li class="signs2"><a class="navlink" href=" '.site_url("User/profile").'">'.$_SESSION['fname'].' '. $_SESSION['lname'].'</a></li>');
        }
  ?>

</ul>


<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<?php




$query = ("SELECT * FROM members ORDER BY Last_Name ASC");
$result3 = $this->db->query($query);
foreach ($result3->result_array() as $row3){
$fname=$row3['First_Name'];
$lname=$row3['Last_Name'];
?>
<table width="398" border="0" align="center" cellpadding="0">
  <tr>
    <td width="165" valign="top"> <h3> <?php echo $fname . " " .$lname   ?>  </h3>  </td>
  </tr>
  <br>
  <br>

</table>
<p align="center"><a href="index.php"></a></p>
<?php
}


?>





    
</body>
</html>