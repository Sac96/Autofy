<?php

$dbcon=mysqli_connect("localhost","root","","autofy1");


if (isset($_POST['state'])) {
    $a = $_POST['country'];
    $b = $_POST['state'];
    

    $q1= mysqli_query($dbcon, "INSERT INTO `state`(`state_name`, `country_id`, `status`) VALUES ('$b','$a',1)");    
}


if (isset($_POST['index1'])) {
    $index = $_POST['index1'];
    $q = mysqli_query($dbcon, "SELECT state_id,state_name FROM state where country_id='" . $index . "' and status=1");


    $str = "";
    while ($row = mysqli_fetch_array($q)) {
        $str .= $row['state_id'].":".$row['state_name'] . ",";
    }
    
    echo rtrim($str, ',');
}


if (isset($_POST['edit_state'])) {
    $a = $_POST['edit_state'];
    $b = $_POST['temp1'];

    $q1= mysqli_query($dbcon, "UPDATE `state` SET `state_name`='" . $a . "' where `state_id`='" . $b . "' ");    
}


if(isset($_POST['temp2'])){
    $temp2 = $_POST['temp2'];
    $q2=mysqli_query($dbcon, "DELETE FROM `state` WHERE `state_id`='" . $temp2 . "' ");
}

?>