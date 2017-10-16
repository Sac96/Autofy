<?php

$dbcon=mysqli_connect("localhost","root","","autofy1");


if (isset($_POST['temp1'])) {
    $a = $_POST['index1'];
    $b = $_POST['temp1'];

    $q1= mysqli_query($dbcon, "UPDATE `country` SET `country_name`='" . $a . "' where `country_id`='" . $b . "' ");    
}

if(isset($_POST['temp2'])){
    $temp2 = $_POST['temp2'];
    $q2=mysqli_query($dbcon, "DELETE FROM `country` WHERE `country_id`='" . $temp2 . "' ");
}

?>