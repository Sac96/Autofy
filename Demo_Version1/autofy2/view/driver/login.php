
<?php
include_once '../../core/db.php';
include_once './driver_header.php';
//include_once './public_menubar.php';

?>

<?php
if (isset($_POST['login'])) {



    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $privatekey = "6LcuGjEUAAAAAMfRMhhVCN8lD5SZIjvtTj61JcOp";
    $response = file_get_contents($url . "?secret=" . $privatekey . "&response=" . $_POST['g-recaptcha-response'] . "&remoteip=" . $_SERVER['REMOTE_ADDR']);
    $data = json_decode($response);

    if (isset($data->success) AND $data->success == true) {




        $uname = $_POST['uname'];
        $pass = $_POST['pass'];

        $dbcon = mysqli_connect("localhost", "root", "", "autofy1") or die("error in connection");
        $res = mysqli_query($dbcon, "select auto_id,driver_name,driver_email,driver_password from auto where driver_email='$uname' and password='$pass' ");
        $row = mysqli_fetch_array($res);

        if ($row) {

            $_SESSION["lgid"] = $row['auto_id'];
            $_SESSION["name"] = $row['driver_name'];

            header("location:driver_home.php");
        } else {
            ?>
            <script>
                alert("invalid user");
            </script>
            <?php
        }
    } else {


        echo '<script> alert("Captcha Fail");</script>';
    }
}
?>


            
            
 <html>
<head>
<title>Driver LogIn</title>
<link href="css/style.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src='https://www.google.com/recaptcha/api.js'></script>
<meta name="keywords" content="Simple Login Form,Login Forms,Sign up Forms,Registration Forms,News latter Forms,Elements"./>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
</script>
<!--webfonts-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,600,700' rel='stylesheet' type='text/css'>
<!--//webfonts-->
</head>
<body>
    <form name="login_form" action="" method="post">
<!--/start-login-one-->
<h1>Driver Login</h1>
		<div class="login">	
			<div class="ribbon-wrapper h2 ribbon-red">
				<div class="ribbon-front">
					<h2>Driver Login</h2>
				</div>
				<div class="ribbon-edge-topleft2"></div>
				<div class="ribbon-edge-bottomleft"></div>
			</div>
			<form>
				<ul>
					<li>
                                            <input name="uname" type="text" class="text" value="Email Address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email Address';}" ><a href="#" class=" icon user"></a>
					</li>
					 <li>
                                             <input name="pass" type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}"><a href="#" class=" icon lock"></a>
					</li>
				</ul>

			
                    <div class="submit">
                            
			</div>
                            <div class="g-recaptcha" data-sitekey="6LcuGjEUAAAAAK92iJhRvfxK3ij7nQV1KP6JPdrM"></div>
			<div class="submit">
                            <input type="submit" name="submit" onclick="" value="Log in" >
			</div>
		</div>
</form>
</body>
</html>           
            



