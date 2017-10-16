<?php
include_once './driver_header.php';
include_once './driver_menubar.php';
include_once '../../core/db.php';


if(!$_SESSION["lgid"])
{
	header("Location:http://localhost/autofy2/index.php");
}
?>



<div style="height: 200px; width: 50%; margin-left: 100px; background-color: #777;">

     <input type="button" id="" value="Availiable" class="btn btn-success"/>

</div>