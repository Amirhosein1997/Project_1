<?php
session_start();
include_once 'functions/f-user.php';
if(isset($_POST['send'])){
    $user=$_POST['username'];
    $pass=$_POST['password'];
    if(isset($_POST['remember'])){
        remember($user,$pass);
    }
    login_user($user,$pass);
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ورود به سایت</title>
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
<?php include_once 'login_header.php';?>
<br>

<br>
<br>

<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 post-single">

            <div class="post-title-single"><h1>ورود به سایت</h1></div>
            <br><br><br>
            <div class="post-txt-single">
                <form method="post">
                    <label>نام کاربری :</label> <br>
                    <input type="text" name="username" class="form-control" required value="<?php if (isset($_COOKIE['user'])){echo $_COOKIE['user'];}?>"><br>
                    <label>رمز عبور :</label> <br>
                    <input type="password" name="password" class="form-control" required value="<?php if (isset($_COOKIE['pass'])){echo $_COOKIE['pass'];}?>"><br>

                    <div class="custom-checkbox fr">
                        <input type="checkbox" name="remember" value="rm" class="custom-control-input" id="wp">
                        <label class="custom-control-label" for="wp">مرابه خاطر بسپار</label>
                    </div>
                    <br>
                    <hr>

                    <input type="submit" name="send" value="ورود" class="btn btn-primary">
                </form>
                <br>
            </div>
        </div>

    </div>
</div>

<br>
<br>
<?php include_once 'login_footer.php'; ?>

<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>