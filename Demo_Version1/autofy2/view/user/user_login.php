
<?php
include_once '../../core/db.php';
include_once './user_header.php';
include_once './public_menubar.php';
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
        $res = mysqli_query($dbcon, "select auto_id,driver_name,driver_email,driver_password from auto where driver_email='$uname' and driver_password='$pass' ");
        $row = mysqli_fetch_array($res);

        if ($row) {

            $_SESSION["lgid"] = $row['auto_id'];
            $_SESSION["name"] = $row['driver_name'];

            header("location:user_home.php");
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



<head>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="icon" href="images/unnamed.png" type="icon">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="js/sidemenu.js"></script>
</head>

<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">Sign in as Driver</h1>
            <div class="account-wall">
                <img class="profile-img" src="images/photo.jpg.png" 
                     alt="">
                <form class="form-signin" method="post" action="">
                    <input type="text" name="uname" id="uname" class="form-control" placeholder="Email" required autofocus>
                    <input type="password" name="pass" id="pass" class="form-control" placeholder="Password" required>

                    <!--Site Key-->

                    <div class="g-recaptcha" data-sitekey="6LcuGjEUAAAAAK92iJhRvfxK3ij7nQV1KP6JPdrM"></div>



                    <input type="submit" class="btn btn-lg btn-primary btn-block" name="login" id="login" value="Log In">
                    <label class="checkbox pull-left">
                        <input type="checkbox" value="remember-me">
                        Remember me
                    </label>
                    <a href="#" class="pull-right need-help">Need help? </a><span class="clearfix"></span>

                </form>
            </div>
            <a href="driver_registration.php" class="text-center new-account">Create an account </a>
        </div>
    </div>
</div>

