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
    redirect(site_url() . "User/profile");

}


?>