<?php
include_once '../../core/db.php';
include_once 'admin_header.php';
include_once './admin_menubar.php';

?>

<?php


if(!$_SESSION["adlgid"])
{
	header("Location:http://localhost/autofy2/index.php");
}


?>

<?php
if (isset($_POST['add'])) {
    $country = $_POST['add_country'];

    $sql = "INSERT INTO `country`(`country_name`, `status`) VALUES ('$country',1)";
    $res = mysqli_query($dbcon, $sql);
    echo '<script>alert("Country added");</script>';
}
?>
<head>
    <link rel="icon" href="images/icon.png" type="icon">
</head>


<!--    <div class="container">
      

        <div class="row">
            <div>
                <label>Edit Country</label>
            </div>


            <div >
                <select  style="opacity: 100px" id="country_select"> <option>Country</option>

                   

                </select>
            </div>
        </div>
        <div class="row">
            <div>
                <input type="text" list="country" id="textedit" >
            </div>
            <div >
                <input type="button" id="btnedit" name="btnedit" value="Edit country">
            </div>
            <div >
                <input type="button" id="btndelete" name="btndelete" value="Delete country">
            </div>
        </div>-->
<!--
    </div>-->
    
  
    
    
    







    
  <div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-sm-5 col-sm-offset-4">
            <div class="panel panel-primary" style="margin-top: 90px;">
                <div class="panel-heading" >Register your Auto!</div>
                <div class="panel-body">

                    <form name="add_country_form" method="post" action="" enctype="multipart/form-data" onsubmit="" >
                        <label for="fname"> Add New Country</label>
                        <input type="text" id="add_country" class="form-control" name="add_country" placeholder="New Country Name" required="">                         

                        <center><input type="submit" class="btn btn-primary m-t-10" id="add" name="add" value="Add Country" style="margin-top: 5px;"></center>
 
                        </form>
                        
  
                        <br><label for="Heading"> Edit/Remove existing countries </label><br><br>
                        
                        <label for="states" class="m-t-10">Select your Country</label>
                        
 
                        
                        <select id="country_select" class="form-control" name="country" required=""> 
                            <option>Country</option>
                            <?php
                            $res = mysqli_query($dbcon, "select * from country where status='1' ");                            

                            while ($row = mysqli_fetch_array($res)) {
                                echo '<option value=' . $row['country_id'] . '>' . $row['country_name'] . '</option>';
                            }
                            ?>
                        </select>

                        
                        <label for="Driver Name"> Set new name </label>
                        <input type="text" id="textedit" class="form-control" name="textrdit" placeholder="Driver Name">  

                        
                        <input type="button" class="btn btn-warning m-t-10" id="btnedit" name="btnedit" value="Edit" style="float: left;margin-top:5px; ">
                        
                        <input type="button" class="btn btn-danger m-t-10" id="btndelete" name="btndelete" value="Delete" style="float: right;margin-top:5px;">

                    
                </div>
            </div>
        </div>
    </div>
</div>  
    
    
    
    


<script src="js/editcountry.js"></script>















