<?php

$dbcon = mysqli_connect("localhost", "root", "", "autofy1");
if (isset($_POST['index'])) {
    $index = $_POST['index'];
    $q = mysqli_query($dbcon, "SELECT state_id,state_name FROM state where country_id='" . $index . "' and status=1");


    $str = "";
    while ($row = mysqli_fetch_array($q)) {
        $str .= $row['state_id'].":".$row['state_name'] . ",";
    }
    
    echo rtrim($str, ',');
}


if (isset($_POST['index1'])) {
    $index2 = $_POST['index1'];
    
    $q1 =  "SELECT `district_id`, `district_name` FROM `district` WHERE `state_id`= '" . $index2 . "' AND `status`=1";
    
   
    //echo $q1;
    $q2=mysqli_query($dbcon,$q1);
    
    //var_dump($q2);
    
//    foreach ($q2 as $value){
//        $str3=$value['district_id'].":".$value['district_name'].',';
//    }
//    
    $str2 = "";
    while ($row1 = mysqli_fetch_array($q2)) {
        $str2 .= $row1['district_id'].":".$row1['district_name'] . ",";
    }
    echo rtrim($str2, ',');
}






if (isset($_POST['index2'])) {
    $index3 = $_POST['index2'];
    
    $q1 =  "SELECT `place_id`, `place_name` FROM `place` WHERE `district_id`='" . $index3 . "' AND `place_status` =1";
    
       
    $q2=mysqli_query($dbcon,$q1);
    
    
    
//    foreach ($q2 as $value){
//        $str3=$value['district_id'].":".$value['district_name'].',';
//    }
//    
    $str5 = "";
    while ($row4 = mysqli_fetch_array($q2)) {
        $str5 .= $row4['place_id'].":".$row4['place_name'] . ",";
    }
    echo rtrim($str5, ',');
}





if (isset($_POST['index3'])) {
    $index4 = $_POST['index3'];
    
    $q1 =  "SELECT `autostand_id`, `autostand_name` FROM `autostand` WHERE `place_id`='" . $index4 . "' AND `status` =1";
    
   //    echo $q1;
       
    $q2=mysqli_query($dbcon,$q1);
    
    
    
//    foreach ($q2 as $value){
//        $str3=$value['district_id'].":".$value['district_name'].',';
//    }
//    
    $str5 = "";
    while ($row4 = mysqli_fetch_array($q2)) {
        $str5 .= $row4['autostand_id'].":".$row4['autostand_name'] . ",";
    }
    echo rtrim($str5, ',');
}





?>

