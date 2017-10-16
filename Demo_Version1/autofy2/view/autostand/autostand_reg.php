<?php
include_once '../../core/db.php';
include_once './autostand_header.php';
include_once './public_menubar.php';
//session_start();
?>

<?php
if (isset($_POST['submitbtn'])) {



    $association_id = $_POST['association_id'];
    $autostand_name = $_POST['autostand_name'];


    $autostand_img = "autostands/" . time() . "" . htmlspecialchars($_FILES['file_upload']['name']);
    move_uploaded_file($_FILES['file_upload']['tmp_name'], $autostand_img);


    //echo "<script>alert('$autostand_id')</script>";
    $pincode = $_POST['pincode'];

    $autostand_phone = $_POST['autostand_phone'];

    $autostand_email = $_POST['autostand_email'];

    $autostand_password = $_POST['password'];
    $autostand_password1 = $_POST['verifypass'];

    $place_id = $_POST['place'];

    if ($autostand_password == $autostand_password1) {
        $sql = "INSERT INTO `autostand`(`association_id`, `autostand_name`, `autostand_img`, `pincode`, `autostand_phone`, `autostand_mail`, `autostand_password`, `status`, `place_id`) VALUES ('$association_id','$autostand_name','$autostand_img','$pincode','$autostand_phone','$autostand_email','$autostand_password1',1,'$place_id')";

        $res = mysqli_query($dbcon, $sql)or die(mysqli_error($dbcon));


        $p = "select max(autostand_id) as lgid from autostand";

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
    <title> AutoStand Registration</title>
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
                <div class="panel-heading" >Register AutoStand!</div>
                <div class="panel-body">

                    <form name="association_id" method="post" action="" enctype="multipart/form-data" onsubmit="" >
                        <label for="fname"> Association ID</label>
                        <input type="text" id="association_id" class="form-control" name="association_id" placeholder="Association ID" required="">                         

                        <label for="autostand_name"> AutoStand Name</label>
                        <input type="text" id="autostand_name" class="form-control" name="autostand_name" onblur="val_name()" placeholder="Stand Name" required="">                         
                        <div class="row col-md-12 hide_error " style="color:red; font-size: 20px;" id="vname" >Error</div>

                        <label for="fname"> AutoStand Image</label>
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



                        <!--                    <label for="Add new autostand" style="color:red;"> *Add new autostand</label>
                                            <input type="tel" id="new_autostand" class="form-control" name="new_autostand" placeholder="New Autostand"> -->

                        <label for="Driver Name"> Pincode</label>
                        <input type="tel" id="pincode" class="form-control" name="pincode" placeholder="Driver Name">  

                        <label for="Driver Mobile"> AutoStand Phone Number</label>
                        <input type="text" id="autostand_phone" class="form-control" name="autostand_phone" placeholder="Driver Phone" onblur="mob_num()">  
                        <div class="row col-md-12 hide_error " id="vmob" >Error</div>


                        <label for="emailaddr" class="m-t-10">Email Address</label>
                        <input type="text" id="autostand_email" class="form-control" onblur="validateEmail()" name="autostand_email" placeholder="Example: autostand@mail.com">
                        <div class="row col-md-12 hide_error " style="color:red; font-size: 20px;" id="vemail" >Error</div>

                        <label for="password" class="m-t-10">Password</label>
                        <input type="password" id="password" class="form-control" name="password" placeholder="Password here!">

                        <label for="verifypass" class="m-t-10">Verify Password</label>
                        <input type="password" id="confirmpass" class="form-control" name="verifypass" placeholder="Confirm Password">

                        <center><input type="submit" class="btn btn-primary m-t-10" id="submitbtn" name="submitbtn" value="Submit"></center>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/get_data.js"></script>
<script src="js/validate_stand.js"></script>