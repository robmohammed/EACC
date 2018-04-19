<?php
require("connection.php");



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Event</title>
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/main.css">  -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/NewEvent.css"> 
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/home.css">

</head>
<style>

{ margin: 0; padding: 0; }
    html { 
        background: linear-gradient( rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7) ), url('../../images/cherry.jpg') no-repeat center center fixed; 
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }</style>

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

<div class="container"> 
    <br> 
  <form action="" method="post" enctype="multipart/form-data">
    <h3>Event Creation</h3>
    <br>
    <fieldset>
      <label for="title">Event Title:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
      <input id="title" class="form" name="title" placeholder="Event Title" type="text" tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
        <label for="description">Event Description:&nbsp&nbsp</label>  
         <input id="description" class="form" name="description" placeholder="Event Description" type="text" tabindex="2" required>
    </fieldset>
    <fieldset>
      <label for="starttime">Start Time:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
      <input id="starttime" class="form" name="starttime" placeholder="Event Start Time" type="text" tabindex="3" required>
    </fieldset>
    <fieldset>       
        <label for="endtime">End Time:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
      <input id="endtime" class="form" name="endtime" placeholder="Event End Time" type="text" tabindex="4" required>
    </fieldset>
    <fieldset>
    <label for="location">Location:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
      <input id="location" class="form" name="location" placeholder="Location" tabindex="5" required></textarea>
    </fieldset>
    <fieldset>
        <label for="file">Insert Image:&nbsp&nbsp&nbsp&nbsp&nbsp</label>
        <input type="file" name="file" id="file">
    </fieldset>
    <fieldset>
      <button class="post" name="post" type="submit" id="post">Post</button>
    </fieldset>
  </form>
</div>



    
</body>
</html>

<?php

require("connection.php");

if(isset($_POST['post'])){
    $title = strip_tags($_POST['title']);
    $description = strip_tags($_POST['description']);

    $title = mysqli_real_escape_string($conn, $title);
    $description = mysqli_real_escape_string($conn, $description);

    $date = date('Y-m-d G:i:s');
    $location = $_POST['location'];
    $starttime = $_POST['starttime'];
    $endtime = $_POST['endtime'];
    $file = $_FILES['file'];

    print_r($file);

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize < 10000000){
                $fileNameNew = uniqid('', true). "." . $fileActualExt ;
                $fileDestination = 'uploads/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
            } else {
                echo "File is too large!";
            }
        } else {
            echo "There was an error uploading your file!";
        }
    } else {
        echo "You cannot upload files of this type!";
    }


    if($title == "" || $description == ""){
        echo "Please complete your Post!";
        return;
    }

    $sql = "INSERT into events (EventTitle, EventDescription, StartTime, EndTime, Location, DatePosted, Picture) VALUES ('$title', '$description', '$starttime', '$endtime', '$location', '$date', '$fileNameNew')";



    mysqli_query($conn, $sql);

    print_r($_POST);

    redirect (site_url()."/blog2/index");
}

?>