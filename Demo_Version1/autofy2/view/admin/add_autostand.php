<?php
include_once '../../core/db.php';
include_once './admin_header.php';
include_once './admin_menubar.php';
?>

<?php
$sql = "SELECT * FROM `autostand` WHERE status=1";
$qry = mysqli_query($dbcon, $sql);
?>





<div class="container-fluid">

    <div class="row">
        <div class="" style="margin-top: 40px;">
            <div class="col-md-3">
<!--                <input type="text" class="form-control" style="background-color: darkslateblue; opacity: 100px">-->
                <select class="form-control" style="opacity: 100px" id="country_select"> <option>Country</option>

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
            
        </div>
    </div>
    <div class="container-fluid">
        <div class="row" style="margin-top: 10px; ">
            <div class="col-md-offset-5 col-sm-3">
                <input type="button" id="find" class="btn btn-block btn-success " style="width: 250px; " value="Manage Autostands">
            </div>
        </div>
    </div>
</div>


<div class="container-fluid">
    <div id="find_places">

    </div>
</div>


<script src="js/location.js"></script>
