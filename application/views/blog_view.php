<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/home.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/blog.css">

    <title>Events</title>
    <style>

{ margin: 0; padding: 0; }
    html { 
        background: linear-gradient( rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7) ), url('../../images/cherry.jpg') no-repeat center center fixed; 
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }</style>

</head>
<body>

    <ul class="navbar">
  <li class="navlinks"><a class="navlink" href="<?php  echo site_url(); ?>/auth/home">Home</a></li>
  <li class="navlinks"><a class="navlink" href="<?php echo site_url(); ?>/auth/about">About</a></li>
  <li class="navlinks"><a class="navlink" href="<?php echo site_url(); ?>/auth/about">Contact</a></li>
  <!-- <li class="navlinks"><a class="navlink" href="<?php echo site_url(); ?>/auth/members">Members</a></li> -->
  <li class="navlinks"><a class="active navlink" href="<?php echo site_url(); ?>/blog2/index">Events</a></li>
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


        <div class="posts" style="width:700px; margin:0 auto;">

        <hr>
      <?php
      

        // echo '<h2><a href="'.site_url().'/blog2/newEvent">Add New Event</a></h2>';
      
      ?>

      <hr>

    <?php foreach($query->result() as $row): ?>
    
    <?php
    require ('connection.php');
    $t = $row->EventTitle;

    ?>
    <h3><?=anchor('blog2/viewevent/'.$row->EventTitle, $t);?></h3>
    <p><?=$row->EventDescription?></p>
    <?php 
    $pic = "SELECT * FROM events where EventTitle = '$t'";

    $res = mysqli_query($conn, $pic);
    $h;
    if(mysqli_num_rows($res) > 0){
      while($row = mysqli_fetch_assoc($res)){
      $h = $row['Picture'];

      }


    }


    ?>
    <img src="<?php echo base_url();?>/uploads/<?php echo $h; ?>" width=500px height=500px>


 <br>
 <br>
    <hr>

<?php endforeach; ?>
</div>

<br>




</body>
</html>