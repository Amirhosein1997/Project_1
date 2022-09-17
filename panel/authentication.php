<?php
include_once '../functions/functions.php';
include_once '../functions/f-user.php';
if (isset($_GET['authentication_code'])){
$authentication_code=$_GET['authentication_code'];
$status=check_authentication_code($authentication_code);
}

?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>احراز هویت</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
    <?php
    if ($status=="pass"):
        ?>
        <div style="text-align: center;" class="alert alert-success">
            احراز هویت با موفقیت انجام شد
            <a href="../index.php" class="btn btn-success">بازگشت به سایت</a>
        </div>
    <?php
    elseif ($status=="fail"):
        ?>

        <div style="text-align: center" class="alert alert-danger">
            احراز هویت تایید نگردید
            <a href="../index.php" class="btn btn-success">بازگشت به سایت</a>
        </div>
    <?php endif;?>


    </body>
    </html>
