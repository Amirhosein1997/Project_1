<?php
include_once '../functions/functions.php';
include_once '../functions/f-sms.php';
?>
<head>
    <title>
        گزارش ارسال و دریافت پیامک
    </title>
</head>


<div class="rounded" style="border: 1px solid;padding: 10px;box-shadow: 5px 5px 8px blue, 10px 10px 8px red, 15px 15px 8px green;margin: 20px;">
<!-- Nav pills -->
<ul class="nav nav-pills nav-justified">
    <li class="nav-item">
        <a class="nav-link active" data-bs-toggle="pill" href="#home">گزارش دریافت</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="pill" href="#menu1">گزارش ارسال</a>
    </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    <div class="tab-pane container active" id="home"><?php include_once 'sms/receive_report.php';?></div>
    <div class="tab-pane container fade" id="menu1"><?php include_once 'sms/send_report.php';?></div>
</div>
</div>