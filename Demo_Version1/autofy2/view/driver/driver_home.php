<?php
include_once './driver_header.php';
include_once './driver_menubar.php';
session_start();

?>
<head>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link href="css/bootstrap.css" type="text/css" rel="stylesheet">
</head>
<?php


if(!$_SESSION["lgid"])
{
	header("Location:http://localhost/autofy2/index.php");
}


?>
<div class="jumbotron">
    <h2>
        <center> Welcome <?php echo $_SESSION["name"]; ?> </center>
    </h2>
</div>
<div style="float: right; margin-right: 20px;">


</div>