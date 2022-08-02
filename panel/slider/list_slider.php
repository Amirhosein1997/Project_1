<!DOCTYPE html>
<head>
    <title>لیست اسلایدر های دسته اسلایدی</title>
</head>
<?php
include_once '../functions/functions.php';
include_once '../functions/f-slider.php';
$select_perm=select_user_permition($_SESSION['login_user']);
if (strpos($select_perm->permition,'list_slider.php') !==false):
$all_subsliders=sub_sliders_records();


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
        <th scope="col">ویرایش</th>
        <th scope="col">حذف</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($all_subsliders as $sub):
        $parent_record=slider_group_reco_callback($sub->parent);
        ?>

        <tr>
            <td><?php echo $sub->title; ?></td>
            <td><?php echo $parent_record->title; ?></td>
            <td><?php echo $sub->date; ?></td>
            <td><?php echo $sub->author; ?></td>
            <td>ON</td>
            <td><img height="50px" width="100px" src="<?php echo $sub->dir; ?>"></td>
            <td><a class="btn btn-primary" href="dashboard.php?page=setting-slider" role="button">ویرایش</a></td>
            <td><a class="btn btn-primary" href="dashboard.php?page=setting-slider" role="button">حذف</a></td>

        </tr>
    <?php endforeach;?>
    </tbody>
</table>

<?php else:?>
    <div class="alert alert-warning" role="alert">
        NO_ACCESS!!!
    </div>
<?php endif;?>