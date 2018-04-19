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
        background: linear-gradient( rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7) ), url('<?php echo base_url(); ?>images/cherry.jpg') no-repeat center center fixed; 
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
  <li class="navlinks"><a class="navlink" href="#contact">Contact</a></li>
  <!-- <li class="navlinks"><a class="navlink" href="<?php echo site_url(); ?>/auth/members">Members</a></li> -->
  <li class="navlinks"><a class="active navlink" href="<?php echo site_url(); ?>/blog2/index">Events</a></li>
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

<br>
<br>
<br>
<br>
<br>
<br>
<div class="posts" style="width:800px; margin:0 auto;">




    <?php

require('connection.php');
$id = $this->uri->segment(3);
$id2  = str_replace('%20', ' ', $id);
$sql = "SELECT * FROM Events WHERE EventTitle = '$id2'";

$res = mysqli_query($conn, $sql) or die(mysqli_error());



if(mysqli_num_rows($res) > 0){
  while($row = mysqli_fetch_assoc($res)){
    $eid = $row['EventID'];
    $titlee = $row['EventTitle'];
    $description = $row['EventDescription'];
    $loc = $row['Location'];
    $date = $row['DatePosted'];
    $h = $row['Picture'];
    $starttime = $row['StartTime'];
    $endtime = $row['EndTime'];

  }

}


?>


<h1><?=$titlee?></h1>
<p>Posted on <?php echo date("Y-m-d", strtotime($date)); ?></p>
<br>
<br>
<h3>Located at: <?=$loc?></h3>
<br>
<h3>Description</h3>
<p><?=$description?></p>
<br>
<h3>Start Time</h3>
<p><?=$starttime?></p>
<br>
<h3>End Time</h3>
<p><?=$endtime?></p>
<br>





<img src="<?php echo base_url();?>/uploads/<?php echo $h; ?>" width='850px' height='650px' >


<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<hr>
<h2>Comments</h2>
<br>
<hr>


<?php 
$com = "SELECT * FROM comments WHERE EventID = '$eid'";

$com1 = mysqli_query($conn, $com);
if(mysqli_num_rows($com1) > 0){
  while($row = mysqli_fetch_assoc($com1)){
    echo '<h3>'.$row['First_Name'] . ' ' . $row['Last_Name'] . '</h3><br>';
    echo $row['Comment'];
    echo '<hr>';
  }
}
?>
<hr>
<br>
<br>
<br>

<form class="form-horizontal" action="" method="POST">
<fieldset>


<?php if($_SESSION['member']==TRUE){ ?>


<!-- Textarea -->
<div class="form-group">

  <div class="col-md-4">                     
    <textarea class="form-control" id="comment" name="comment" value="Enter your comment here!"  rows=10 columns=55></textarea>
  </div>
</div>

<!-- Button -->
<div class="form-group">

  <div class="col-md-4">
    <button type="submit" id="post" name="post" class="btn btn-primary">Post Comment</button>
  </div>
</div>

</form>



<?php } 



if(isset($_POST['post'])){
  $uid = $_SESSION['id'];
$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$coms = $_POST['comment'];
  $ins = "INSERT INTO comments (EventID, UserID, First_Name, Last_Name, Comment) VALUES ('$eid', '$uid', '$fname', '$lname', '$coms')";
  mysqli_query($conn, $ins);

  header("Refresh:0");

}
?>

</div>


</body>
</html>