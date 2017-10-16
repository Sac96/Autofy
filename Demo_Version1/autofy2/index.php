<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
include_once './core/db.php';
include_once './public/public_menubar.php';

?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">       
        <title>Aey Auto!</title>
        <link rel="stylesheet" href="public/css/bootstrap.css">
        <link rel="icon" href="public/images/unnamed.png" type="icon">
        <!--<link rel="stylesheet" type="text/css" href="public/css/main.css">-->

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
    <script src="public/js/jquery.js"></script>


    <body>

        <div class="container-fluid" style="position:relative;">

            <div class="row">
                <div class="" style="margin-top: 40px;">
                    <div class="col-md-3">
        
                        <select class="form-control" style="opacity: 100px" id="country_select"> <option selected="" disabled="" value="-1">Country</option>

                            <?php
                            $res = mysqli_query($dbcon, "select * from country where status='1' ");
//                            $res2 = mysqli_query($dbcon, "select * from state where status='1' ");

                            while ($row = mysqli_fetch_array($res)) {
                                echo '<option value=' . $row['country_id'] . '>' . $row['country_name'] . '</option>';
                            }
                            ?>

                        </select>
                    </div>
                    <div class="col-md-3">

                        <select class="form-control" id="state_select" > <option value="-1" disabled="" selected="">State</option>
                        </select>

                    </div>
                    <div class="col-md-3 col-sm-3">

                        <select class="form-control" style="opacity: 100px" id="district_select"> <option>District</option></select>

                    </div>
                    <div class="col-md-3" col-sm-3>

                        <select class="form-control" style="opacity: 100px" id="place_select"> <option>Place</option></select>

                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row" style="margin-top: 10px; ">
                    <div class="col-md-offset-5 col-sm-3">
                        <input type="button" id="find" class="btn btn-block btn-success " style="width: 250px; " value="Find Nearest Auto!">
                    </div>
                </div>
            </div>
            <center><div class="row col-md-12 hide_error " style="color:white; font-size: 60px;" id="place_error" >Error</div></center>

        </div>    

        <div class="container-fluid">
            <div id="find_autostand">

            </div>
        </div>

<!--        <div class="container-fluid" style="position:absolute; margin-top: 575px; width: 100%;">
            <div id="check_fare">
                <iframe src="maps1.htm" width="100%" height="600px"  frameBorder="0">

                </iframe>
            </div>
        </div>-->



    </body>

    <script src="public/js/location.js" ></script>



</html>

