<?php
// Start the session
session_start();
?>
<?php ob_start();?>
<?php
include_once '../functions/functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>پنل کاربری</title>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<?php if (isset($_SESSION['login_user'])): ?>
<div class="topmenu">
    <?php include_once 'top_menu.php' ?>
</div>
<div>

</div>

<div class="container-fluid">
    <div class="admin-container">
        <div class="row">
            <div class="col-md-2">

                <?php include_once 'dashboard_menu.php' ?>
            </div>
        <div class="col-md-10">
        <?php include_once 'content_panel.php' ?>

        </div>
    </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script src="../js/jquery-1.11.3.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/main.js"></script>

<?php else: ?>
<div style="text-align: center" class="alert alert-danger" role="alert">
    please sign in !!!!!!!
    <a class="btn btn-primary" href="../index.php" role="button">بازگشت به سایت</a>
</div>
<?php endif;?>
</body>
</html>