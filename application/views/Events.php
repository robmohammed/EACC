
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Events</title>


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
  <!-- <li class="navlinks"><a class="navlink" href="<?php echo site_url(); ?>/auth/members">Members</a></li> -->
  <li class="navlinks"><a class="active navlink" href="<?php echo site_url(); ?>/auth/events">Events</a></li>
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

<?php
  require("connection.php");
  require_once("nbbc/nbbc.php");
  $bbcode = new BBCode;

  $sql = "SELECT * FROM Events ORDER BY EventID DESC";

  $res = mysqli_query($conn, $sql) or die(mysqli_error());

  $posts = "";

  if(mysqli_num_rows($res) > 0){
    while($row = mysqli_fetch_assoc($res)){
      $id = $row['EventID'];
      $title = $row['EventTitle'];
      $description = $row['EventDescription'];
      $loc = $row['Location'];
      $partic = $row['Participants'];
      $date = $row['DatePosted'];

      $admin = "<div><a href='del_post.php?pid=$id'>Delete</a>&nbsp;<a href='edit_post.php?pid=$id'>Edit</a>";

      $output = $bbcode->Parse($description);

      $posts .= "<div><h2><a href='". site_url('auth/Event') . "->$id'>$title</a></h2><h3>$date</h3><p>$output</p>$admin</div>";
    }
    echo $posts;
  } else{
    echo "There are no Events.";
  }

?>
</body>
  <a href="<?php echo site_url(); ?>/auth/newEvent">Add New Event</a>
</html>
