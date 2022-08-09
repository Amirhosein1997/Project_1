<?php
include_once '../functions/functions.php';
include_once '../functions/f-phone.php';
?>
<head>
    <title>
        لیست موبایل کاربران
    </title>
</head>



<br>
<h5>لیست تلفن کاربران</h5>
<hr>
<table class="table table-dark table-hover">
    <thead>
    <tr>
        <th>ردیف</th>
        <th>نام کاربر</th>
        <th>ثبت کننده کاربر</th>
        <th>تاریخ ثبت کاربر</th>
        <th>شماره تلفن</th>
        <th>ارجاع به صفحه پیامک</th>
    </tr>
    </thead>
    <tbody>
    <?php $users_record=users_record();
    foreach ($users_record as $key=>$val):?>
    <tr>
        <td><?php echo $key+1; ?></td>
        <td><button type="button" class="btn btn-outline-success"><?php echo $val->full_name; ?></button></td>
        <td><?php echo $val->author; ?></td>
        <td><?php echo $val->register_date; ?></td>
        <td><?php echo $val->phone; ?></td>
        <td><a href="dashboard.php?page=setting-sms&phone=<?php echo $val->phone; ?>" class="btn btn-success">ارسال پیامک</a></td>
    </tr>
    <?php endforeach;?>
    </tbody>
</table>