<?php
include_once './autostand_header.php';
include_once './autostand_menubar.php';
session_start();


      $b=$_SESSION["autostand_lgid"];  
        if(!$_SESSION["autostand_lgid"])
{
	header("Location:http://localhost/autofy2/index.php");
}


?>



Hello <?php echo $b;  ?>