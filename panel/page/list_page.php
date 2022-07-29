<!DOCTYPE html>
<head>
    <title>لیست صفحات ایجاد شده</title>
</head>
<?php
include_once '../functions/functions.php';
include_once '../functions/f-page.php';
$page_records=page_callback();

?>




<table class="table table-dark table-hover table-sm">
    <thead>
    <tr>
        <th scope="col">ردیف</th>
        <th scope="col">کد</th>
        <th scope="col">عنوان</th>
        <th scope="col">لینک</th>
        <th scope="col">گروه</th>
        <th scope="col">نویسنده</th>
        <th scope="col">تاریخ</th>
        <th scope="col">وضعیت</th>
        <th scope="col">ویرایش</th>
        <th scope="col">حذف</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($page_records as $key=>$val): ?>
    <tr>
        <td><?php echo $key+1 ?></td>
        <td><?php echo $val->code; ?></td>
        <td><?php echo $val->title; ?></td>
        <td><?php echo $val->page_link; ?></td>
        <td><?php $parent_reco=parent_record($val->parent);
            echo $parent_reco->title;
        ?>
        </td>
        <td><?php echo $val->author; ?></td>
        <td><?php echo $val->date; ?></td>
        <td><?php echo $val->status; ?></td>
        <td><a class="btn btn-primary" href="dashboard.php?page=edit-page&id=<?php echo $val->id; ?>" role="button">ویرایش</a></td>
        <td><a class="btn btn-primary" href="dashboard.php?page=delete-page&id=<?php echo $val->id; ?>" role="button">حذف</a></td>
    </tr>
    <?php endforeach;?>
    </tbody>
</table>