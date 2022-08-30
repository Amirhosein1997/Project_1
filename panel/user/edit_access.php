<?php
include_once '../functions/functions.php';
include_once '../functions/f-user.php';
?>

<?php
$title_records=title_records();


?>


<div style="border: 1px solid;padding: 10px;box-shadow: 5px 5px 8px blue, 10px 10px 8px red, 15px 15px 8px green;margin: 20px;" >
    <h5>ویرایش دسترسی صفحات</h5>
    <hr>
    <h6>بخش مدیریت کاربران</h6>
    <br>
    <table class="table table-dark table-hover">
    <thead>
    <tr>
        <th>ردیف</th>
        <th>نام فایل</th>
        <th>محتوای تگ تایتل</th>
        <th>وضعیت</th>
        <th>افزودن</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($title_records as $key=>$title_record): ?>
    <tr>
        <td><?php echo $key+1;?></td>
        <td><?php echo $title_record->file_name; ?></td>
        <td><?php echo $title_record->title; ?></td>
        <td><?php if ($title_record->title_status=='on'):?>
            <button type="button" class="btn btn-success">فعال</button>
        <?php else:?>
            <button type="button" class="btn btn-danger">غیرفعال</button>
        <?php endif;?>
        </td>
        <td><?php if ($title_record->title_status=='off'): ?>
            <a href="dashboard.php?page=add-title-tag&file=<?php echo$title_record->file_name; ?>" class="btn btn-success">فعال سازی</a>
            <?php endif;?>
        </td>
    </tr>
    <?php endforeach;?>
    </tbody>
</table>
    <a href="dashboard.php?page=config-access" class="btn btn-success">بازگشت</a>
</div>
