<?php

require('connection.php');

function getUserData($email){

    $array = array();
    $q = mysql_query("SELECT * FROM 'personal' WHERE 'Email' =".$email);

    while ($r = mysql_fetch_assoc($q)){
        $array['email'] = $r['Email'];
        $array['fname'] = $r['First_Name'];
        $array['lname'] = $r['Last_Name'];
        $array['interest'] = $r['Interest'];
        $array['contact'] = $r['ContactNumber'];
        $array['degree'] = $r['Degree'];


    }

    return $array;


}