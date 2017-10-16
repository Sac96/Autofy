<?php
include_once './admin_header.php';
include_once './admin_menubar.php';
session_start();

?>

<?php


if(!$_SESSION["adlgid"])
{
	header("Location:http://localhost/autofy2/index.php");
}


?>