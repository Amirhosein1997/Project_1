<?php include_once '../functions/functions.php';
    include_once '../functions/f-sms.php';
?>

<head>
    <title>تنظیمات اس ام اس</title>
</head>
<?php
if (isset($_GET['op'])):
    if ($_GET['op']=='preset_sms_inserted'):?>
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            متن پیامک پیش فرض ثبت گردید.
        </div>
    <?php endif;?>
<?php endif;?>
<?php
if (isset($_GET['op'])):
    if ($_GET['op']=='preset_sms_updated'):?>
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        متن پیامک پیش فرض ویرایش گردید.
    </div>
    <?php endif;?>
<?php endif;?>
<?php
if (isset($_GET['op'])):
if ($_GET['op']=='preset_sms_deleted'):?>
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        متن پیامک پیش فرض حذف گردید.
    </div>

<?php endif;?>
<?php endif;?>


<div class="shadow p-4 mb-4 bg-dark rounded" >
<div class="container shadow p-4 mb-4 bg-light text-dark rounded" >
    <!-- Nav tabs -->
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link <?php if (!isset($_GET['phone']) and !isset($_GET['link'])){echo "active";} ?>" data-bs-toggle="tab" href="#home">راهنمای پیکربندی</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#menu1">موجودی پنل</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#menu2">پیامک های پیش فرض</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if (isset($_GET['phone'])){echo 'active';} ?>" data-bs-toggle="tab" href="#menu3">پیامک فردی</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if (isset($_GET['link'])){echo 'active';} ?>" data-bs-toggle="tab" href="#menu4">ارتباط با پشتیبانی</a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane container <?php if (!isset($_GET['phone']) and !isset($_GET['link'])){echo "active";} ?> " id="home">
            <br>
            <div class="alert alert-info">
                <h5>پیکربندی سرویس SMS</h5>
                <hr>
                در صورت نیاز به اشنایی بیشتر با امکانات این سرویس روی <a href="sms/hamysms_api/api.pdf" class="alert-link">لینک</a>  کلیک کنید.

            </div>
        </div>
        <div class="tab-pane container fade" id="menu1">
            <br>
            <div class="alert alert-primary">
                <strong>موجودی سرویس پیامکی شما:</strong>
                <?php
                //  $credit=getcredit();
                    $credit=38320455.456;
                    $exploded_credit=explode('.',$credit);
                    $formated_number=number_format($exploded_credit[0]);
                    echo $formated_number;

                ?>
                ریال
            </div>
            <div class="alert alert-danger">
                در صورت نیاز به شارژ سرویس پیامکی خود روی این <a href="https://hamysms.com/login/" class="alert-link">لینک</a> کلیک کنید.
                    <hr>
                اطلاعات سرویس پیامکی شما:
                    <br>
                <button type="button" class="btn btn-success btn-sm mt-2">نام کاربری:my_username</button>
                    <br>
                <button type="button" class="btn btn-success btn-sm mt-2">کلمه عبور:my_password</button>
            </div>
        </div>
        <div style="background-color: #5da46d;" class="tab-pane container fade rounded" id="menu2"><?php include_once 'pre_set_sms.php';?></div>
        <div class="tab-pane container <?php if (isset($_GET['phone'])){echo 'active';} ?>" id="menu3"><?php include_once 'send_sms.php';?></div>
        <div class="tab-pane container <?php if (isset($_GET['link'])){echo 'active';} ?>" id="menu4"><?php include_once 'support.php';?></div>


    </div>

</div>
</div>