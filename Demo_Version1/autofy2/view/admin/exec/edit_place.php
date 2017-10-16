<?php

$dbcon=mysqli_connect("localhost","root","","autofy1");


if (isset($_POST['place'])) {
    $a = $_POST['district'];
    $b = $_POST['place'];
    

    $q1= mysqli_query($dbcon, "INSERT INTO `place`(`place_name`, `district_id`, `place_status`) VALUES ('$b','$a',1)");    
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


if (isset($_POST['index11'])) {
    $index = $_POST['index11'];
    $q = mysqli_query($dbcon, "SELECT district_id,district_name FROM district where state_id='" . $index . "' and status=1");


    $str = "";
    while ($row = mysqli_fetch_array($q)) {
        $str .= $row['district_id'].":".$row['district_name'] . ",";
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

if (isset($_POST['index4'])) {
    $index = $_POST['index4'];
    $q = mysqli_query($dbcon, "SELECT place_id,place_name FROM place where district_id='" . $index . "' and place_status=1");

    

    $str = "";
    while ($row = mysqli_fetch_array($q)) {
        $str .= $row['place_id'].":".$row['place_name'] . ",";
    }
    
    echo rtrim($str, ',');
}


if (isset($_POST['edit_place'])) {
    $a = $_POST['edit_place'];
    $b = $_POST['temp1'];

    $q1= mysqli_query($dbcon, "UPDATE `place` SET `place_name`='" . $a . "' where `place_id`='" . $b . "' ");    
}


if(isset($_POST['temp2'])){
    $temp2 = $_POST['temp2'];
    $q2=mysqli_query($dbcon, "DELETE FROM `place` WHERE `place_id`='" . $temp2 . "' ");
}

?>