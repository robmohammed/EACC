<?php
require ('connection.php');

if(isset($_POST['save'])){

    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $int =  $_POST['interest'];
    $cont = $_POST['contact'];
    $deg = $_POST['degree'];
    $ems = $_SESSION['email'];

    $j = "UPDATE personal SET First_Name = '$fname', Last_Name = '$lname', Interest = '$int', ContactNumber = '$cont', Degree = '$deg' WHERE Email = '$ems'";

    $f = mysqli_query($conn, $j);

    

    redirect(site_url() . "/User/profile");

    

}


?>