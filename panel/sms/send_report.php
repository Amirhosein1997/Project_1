<?php
include_once '../functions/functions.php';
include_once '../functions/f-sms.php';
?>
<head>
    <title>
        گزارش ارسال پیامک
    </title>
</head>
<br>






<table class="table table-dark table-hover">
    <thead>
    <tr>
        <th>ردیف</th>
        <th>کد رسید</th>
        <th>مبدا</th>
        <th>مقصد</th>
        <th>ارسال کننده</th>
        <th>زمان</th>
        <th>وضعیت ارسال</th>
        <th>وضعیت تایید</th>
        <th>وضعیت نهایی</th>
    </tr>
    </thead>
    <tbody>
    <?php $sended_sms_records=sended_sms_records();
    foreach ($sended_sms_records as $key=>$val):
        $sms_status=sms_status($val->code);
        $sms_valid=sms_valid($val->code);
        ?>

    <tr>
        <td><?php echo $key+1; ?></td>
        <td><?php echo $val->code; ?></td>
        <td><?php echo $val->from_num; ?></td>
        <td><?php echo $val->to_num; ?></td>
        <td><?php echo $val->sender; ?></td>
        <td><?php echo $val->date;echo '<br>';echo $val->time; ?></td>
        <td> <button type="button" class="btn btn-outline-info"><?php echo $sms_status; ?></button></td>
        <td><button type="button" class="btn btn-outline-warning"><?php echo $sms_valid; ?></button></td>
        <td> <button type="button" class="btn btn-outline-success"><?php if ($sms_status=='پایان یافته' and $sms_valid=='تایید شده'){echo 'ارسال موفق';}else{echo 'معلق';} ?></button></td>
    </tr>
    <?php endforeach;?>
    </tbody>
</table>
