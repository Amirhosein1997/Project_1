<?php
include_once '../functions/functions.php';
include_once '../functions/f-slider.php';
?>
<!DOCTYPE html>
<head>
    <title>مشاهده همه دسته های اسلایدی</title>
</head>



<table class="table">
    <thead>
    <tr>
        <th scope="col">عنوان گروه</th>
        <th scope="col">تعداد اسلاید</th>
        <th scope="col">تاریخ ایجاد</th>
        <th scope="col">کاربر</th>
        <th scope="col">وضعیت</th>
        <th scope="col">مسیر</th>
        <th scope="col">ویرایش</th>
        <th scope="col">افزودن اسلاید</th>
        <th scope="col">حذف</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $sliders_parents=slider_group_callback();
    foreach ($sliders_parents as $parent):
    ?>
    <tr>
        <td><?php echo $parent->title; ?></td>
        <td><?php echo $parent->number; ?></td>
        <td><?php echo $parent->date; ?></td>
        <td><?php echo $parent->author; ?></td>
        <td><?php echo $parent->status; ?></td>
        <td><?php echo $parent->dir; ?></td>
        <td><a class="btn btn-primary" href="dashboard.php?page=edit-slideinfo&id=<?php echo $parent->id; ?>" role="button">ویرایش</a></td>
        <td><a class="btn btn-primary" href="dashboard.php?page=import-slider&id=<?php echo $parent->id; ?>" role="button">افزودن اسلاید</a></td>
        <td><a class="btn btn-primary" href="dashboard.php?page=delete_slide_info&id=<?php echo $parent->id; ?>" role="button">حذف</a></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>