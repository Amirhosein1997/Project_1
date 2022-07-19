<!DOCTYPE html>
<head>
    <title>لیست دسته های اسلایدی</title>
</head>
<?php
include_once '../functions/functions.php';
include_once '../functions/f-slider.php';

$id=$_GET['id'];
$sub_slider_record=sub_slider_callback($id);
$parent_record=slider_group_reco_callback($id);



?>





<table class="table">
    <thead>
    <tr>
        <th scope="col">عنوان اسلاید</th>
        <th scope="col">دسته اسلایدی</th>
        <th scope="col">تاریخ ایجاد</th>
        <th scope="col">کاربر</th>
        <th scope="col">وضعیت</th>
        <th scope="col">تصویر اسلاید</th>
        <th scope="col">حذف</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($sub_slider_record as $sub): ?>
    <tr>
        <td><?php echo $sub->title; ?></td>
        <td><?php echo $parent_record->title; ?></td>
        <td><?php echo $sub->date; ?></td>
        <td><?php echo $sub->author; ?></td>
        <td>ON</td>
        <td><img height="50px" width="100px" src="<?php echo $sub->dir; ?>"></td>
        <td><a class="btn btn-primary" href="dashboard.php?page=delete-slideinfo&id=<?php echo $sub->id; ?>" role="button">حذف</a></td>

    </tr>
    <?php endforeach;?>
    </tbody>
</table>