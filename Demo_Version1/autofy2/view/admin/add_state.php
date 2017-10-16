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

<head>
    <link rel="icon" href="images/icon.png" type="icon">
</head>
 
  <div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-sm-5 col-sm-offset-4">
            <div class="panel panel-primary" style="margin-top: 90px;">
                <div class="panel-heading" >Register your Auto!</div>
                <div class="panel-body">

                    
                        
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
                        
                        
                        <label for="statename"> Add New State</label>
                        <input type="text" id="add_state" class="form-control" name="add_state" placeholder="New State Name" required="">                         

                        <center><input type="button" class="btn btn-primary m-t-10" id="add" name="add" value="Add State" style="margin-top: 5px;"></center>
 
                  
                        
                        
                        
                        
                        
  
                        <br><label for="Heading"> Edit/Remove existing states </label><br><br>
                        
                        <label for="states" class="m-t-10">Select your Country</label>
                        
 
                        
                        <select id="country_edit_select" class="form-control" name="country" required=""> 
                            <option>Country</option>
                            <?php
                            $res = mysqli_query($dbcon, "select * from country where status='1' ");                            

                            while ($row = mysqli_fetch_array($res)) {
                                echo '<option value=' . $row['country_id'] . '>' . $row['country_name'] . '</option>';
                            }
                            ?>
                        </select>

                        <label for="states" class="m-t-10">Select your State</label>
                        <select id="state_select" class="form-control" name="state" required="">   
                            <option value="-1" disabled selected>Select State</option>                        
                        </select>
                        
                        
                        
                        <label for="Driver Name"> Set new name </label>
                        <input type="text" id="textedit" class="form-control" name="textrdit" placeholder="State Name">  

                        
                        <input type="button" class="btn btn-warning m-t-10" id="btnedit" name="btnedit" value="Edit" style="float: left;margin-top:5px; ">
                        
                        <input type="button" class="btn btn-danger m-t-10" id="btndelete" name="btndelete" value="Delete" style="float: right;margin-top:5px;">

                    
                </div>
            </div>
        </div>
    </div>
</div>  
    
    
    
    


<script src="js/edit_state.js"></script>