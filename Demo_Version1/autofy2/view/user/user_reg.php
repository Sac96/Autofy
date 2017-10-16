
<?php
include_once '../../core/db.php';
include_once './user_header.php';
include_once './public_menubar.php';
//session_start();
?>

<?php

function send($sms, $to) {
    
        $sms = urlencode($sms);
      
            $url = 'http://sms.safechaser.com/httpapi/httpapi?token=a917e2ac067a1a6c6d4c40bdd9c47c6d&sender=EYAUTO&number='.$to.'&route=2&type=1&sms='.$sms;
        
            echo $url;
            
            $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 50);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 50);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $datares = curl_exec($ch);
        curl_close($ch);
        return $datares;
    }

?>


<?php
//$mob=$_POST["usermob"];
//$txt=$_POST["txt"];
//$msg="Hai $txt team";
//send($msg,$mob);
//
//?>




<?php
if (isset($_POST['submitbtn'])) {
    
    
    
    

$mob=$_POST["driver_mob"];
$txt=$_POST["driver_email"];
$msg="Hai this is yor username:". $txt ."-team";
send($msg,$mob);
    
    
    

    $reg_number = $_POST['reg_number'];

    $registration_details = "rc_book_details/" . time() . "" . htmlspecialchars($_FILES['file_upload']['name']);
    move_uploaded_file($_FILES['file_upload']['tmp_name'], $registration_details);

    $autostand_id = $_POST['autostand_id'];
    //echo "<script>alert('$autostand_id')</script>";


    $driver_name = $_POST['driver_name'];
    $driver_mob = $_POST['driver_mob'];
    $driver_email = $_POST['driver_email'];

    $driver_password = $_POST['password'];
    $driver_password1 = $_POST['verifypass'];



    if ($driver_password == $driver_password1) {
        $sql = "INSERT INTO `auto`(`registration_number`, `registration_details`, `driver_name`, `driver_mob`, `driver_email`, `driver_password`, `status`, `autostand_id`) VALUES ('$reg_number','$registration_details','$driver_name','$driver_mob','$driver_email','$driver_password',1,'$autostand_id')";

        $res = mysqli_query($dbcon, $sql)or die(mysqli_error($dbcon));


        $p = "select max(auto_id) as lgid from auto";

        $q = mysqli_query($dbcon, $p) or die(mysqli_error($dbcon));
        $row = mysqli_fetch_array($q);
        $x = $row['lgid'];




        echo '<script> alert("Registration Successful Please Login")</script>';
    } else {

        echo '<script language="javascript">';
        echo 'alert("Your password does not match")';
        echo '</script>';
    }
}
?>

<head>
    <title> Driver Registration</title>
    <link rel="icon" href="images/icon.png" type="icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .m-t-10 {
            margin-top: 10px;
        }

        .show_error{
            display: inline;
        }
        .hide_error{
            display: none;
        }
    </style>

</head>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-sm-5 col-sm-offset-4">
            <div class="panel panel-primary" style="margin-top: 90px;">
                <div class="panel-heading" >Register your Auto!</div>
                <div class="panel-body">

                    <form name="reg_form" method="post" action="" enctype="multipart/form-data" onsubmit="return maincheck() " >
                        <label for="fname"> Vehicle Registration Number</label>
                        <input type="text" id="reg_number" class="form-control" onblur="reg_num()" name="reg_number" placeholder="Example: KL 38 AB 6677" required="">                         

                        <label for="fname"> Vehicle Registration Details</label>
                        <input type="file" id="file_upload" class="form-control" name="file_upload" required="">     

                        <label for="states" class="m-t-10">Select your Country</label>
                        <select id="country_select" class="form-control" name="country" required=""> 
                            <option>Country</option>
                            <?php
                            $res = mysqli_query($dbcon, "select * from country where status='1' ");
                            $res2 = mysqli_query($dbcon, "select * from state where status='1' ");

                            while ($row = mysqli_fetch_array($res)) {
                                echo '<option value=' . $row['country_id'] . '>' . $row['country_name'] . '</option>';
                            }
                            ?>
                        </select>

                        <label for="states" class="m-t-10">Select your State</label>
                        <select id="state_select" class="form-control" name="state" required="">   
                            <option value="-1" disabled selected>Select State</option>                        
                        </select>

                        <label for="districts" class="m-t-10">Select your District</label>
                        <select id="district_select" class="form-control" name="district">
                            <option value="-1" disabled selected>Select District</option>
                        </select>

                        <label for="places" class="m-t-10">Select your Place</label>
                        <select id="place_select" class="form-control" name="place">  
                            <option value="-1" disabled selected>Select Place</option>
                        </select>

                        <!--                    <label for="Add new place" style="color:red;"> *Add new place</label>
                                            <input type="tel" id="new_place" class="form-control" name="new_place" placeholder="New Place"> -->

                        <label for="autostands" class="m-t-10">Select your Autostand</label>
                        <select id="autostand_select" class="form-control" name="autostand_id">      
                            <option value="-1" disabled selected>Select Autostand</option>
                        </select>

                        <!--                    <label for="Add new autostand" style="color:red;"> *Add new autostand</label>
                                            <input type="tel" id="new_autostand" class="form-control" name="new_autostand" placeholder="New Autostand"> -->

                        <label for="Driver Name"> Driver Name</label>
                        <input type="text" id="driver_name" onblur="val_name()" class="form-control" name="driver_name" placeholder="Driver Name">  

                        <label for="Driver Mobile"> Driver Mobile Number(Add Country Code)</label>
                        <input type="text" id="driver_mob" class="form-control" name="driver_mob" placeholder="Driver Phone" onblur="mob_num()">  
                        <div class="row col-md-12 hide_error " id="vmob" >Error</div>


                        <label for="emailaddr" class="m-t-10">Email Address</label>
                        <input type="text" id="driver_email" class="form-control" onblur="validateEmail(driver_email)" name="driver_email" placeholder="Example: john.smith@gmail.com">

                        <label for="password" class="m-t-10">Password</label>
                        <input type="password" id="password" class="form-control" name="password" placeholder="Password here!">

                        <label for="verifypass" class="m-t-10">Verify Password</label>
                        <input type="password" id="confirmpass" class="form-control" name="verifypass" placeholder="Confirm Password">

                        <center><input type="submit" class="btn btn-primary m-t-10" id="submitbtn"  name="submitbtn" value="Submit"></center>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/get_data.js"></script>
<script src="js/validation.js"></script>


<script>
    function validateEmail(driver_email)
{
 var reg = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/
 if (reg.test(driver_email)){
 return true; }
 else{
     alert ('noo');
 return true;
 }
} 
</script>