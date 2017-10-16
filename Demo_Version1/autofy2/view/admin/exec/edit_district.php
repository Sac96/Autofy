<?php

$dbcon=mysqli_connect("localhost","root","","autofy1");


if (isset($_POST['district'])) {
    $a = $_POST['state'];
    $b = $_POST['district'];
    

    $q1= mysqli_query($dbcon, "INSERT INTO `district`(`district_name`, `state_id`, `status`) VALUES ('$b','$a',1)");    
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

if (isset($_POST['index2'])) {
    $index = $_POST['index2'];
    $q = mysqli_query($dbcon, "SELECT state_id,state_name FROM state where country_id='" . $index . "' and status=1");


    $str = "";
    while ($row = mysqli_fetch_array($q)) {
        $str .= $row['state_id'].":".$row['state_name'] . ",";
    }
    
    echo rtrim($str, ',');
}

if (isset($_POST['index3'])) {
    $index = $_POST['index3'];
    $q = mysqli_query($dbcon, "SELECT district_id,district_name FROM district where state_id='" . $index . "' and status=1");


    $str = "";
    while ($row = mysqli_fetch_array($q)) {
        $str .= $row['district_id'].":".$row['district_name'] . ",";
    }
    
    echo rtrim($str, ',');
}


if (isset($_POST['edit_district'])) {
    $a = $_POST['edit_district'];
    $b = $_POST['temp1'];

    $q1= mysqli_query($dbcon, "UPDATE `district` SET `district_name`='" . $a . "' where `district_id`='" . $b . "' ");    
}


if(isset($_POST['temp2'])){
    $temp2 = $_POST['temp2'];
    $q2=mysqli_query($dbcon, "DELETE FROM `district` WHERE `district_id`='" . $temp2 . "' ");
}

?>