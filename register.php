<?php
include_once 'functions/f-user.php';
if (isset($_POST['send'])){
  $info=$_POST['info'];
  register_user($info);
header("location:panel/dashboard.php");
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">


</head>
<body>
<?php include_once 'register_header.php';?>
<br>
<br>

<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 post-single">

            <div class="post-title-single"><h1>ثبت نام</h1></div>
            <br><br><br>
            <div class="post-txt-single">
                <form method="post">
                    نام کاربری : <br>
                    <input type="text" name="info[username]" class="form-control" required><br>
                    رمز عبور : <br>
                    <input type="password" name="info[password]" class="form-control" required><br>
                    ایمیل : <br>
                    <input type="email" name="info[email]" class="form-control" required><br>

                    <div class="custom-checkbox fr">
                        <input type="checkbox" name="remember" value="wordpress" class="custom-control-input" id="wp">
                        <label class="custom-control-label" for="wp">مرابه خاطر بسپار</label>
                    </div>
                    <br>
                    <hr>

                    <input type="submit" name="send" value="ثبت نام" class="btn btn-primary">
                </form>
                <br>
            </div>
        </div>

    </div>
</div>

<br>
<br>
<footer>
    <?php include_once 'register_footer.php';?>
</footer>


<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>