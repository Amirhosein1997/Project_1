<!DOCTYPE html>
<head>
    <title>لیست گروه صفحات ایجاد شده</title>
</head>
<?php
include_once '../functions/functions.php';
include_once '../functions/f-page.php';
$group_page_records=grp_page_callback();
?>




<table class="table table-dark table-hover table-sm">
    <thead>
    <tr>
        <th scope="col">ردیف</th>
        <th scope="col">کد</th>
        <th scope="col">عنوان</th>
        <th scope="col">نویسنده</th>
        <th scope="col">تاریخ</th>
        <th scope="col">تعداد صفحات</th>
        <th scope="col">شرح</th>
        <th scope="col">وضعیت</th>
        <th scope="col">ویرایش</th>
        <th scope="col">حذف</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($group_page_records as $key=>$val): ?>
    <tr>
        <td><?php echo $key+1; ?></td>
        <td><?php echo $val->code; ?></td>
        <td><?php echo $val->title; ?></td>
        <td><?php echo $val->author; ?></td>
        <td><?php echo $val->date; ?></td>
        <td><?php $pages_records=select_pages($val->id);
                echo count($pages_records);
        ?>
        </td>
        <td><?php echo $val->description; ?></td>
        <td><?php echo $val->status; ?></td>
        <td><a class="btn btn-primary" href="dashboard.php?page=edit_groupe_page&id=<?php echo $val->id; ?>" role="button">ویرایش</a></td>
        <td><a class="btn btn-primary" href="dashboard.php?page=delete-groupe-page&id=<?php echo $val->id; ?>" role="button">حذف</a></td>
    </tr>
<?php endforeach;?>
    </tbody>
</table>