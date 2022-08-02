<!DOCTYPE html>
<head>
    <title>مشاهده همه ابزارک ها</title>
</head>
<?php
include_once '../functions/functions.php';
include_once '../functions/f-widget.php';
$select_perm=select_user_permition($_SESSION['login_user']);
if (strpos($select_perm->permition,'list_widget.php') !==false):
$widget_records=wid_reco_callback();
?>


<table class="table">
    <thead>
    <tr>
        <th scope="col">ردیف</th>
        <th scope="col">عنوان</th>
        <th scope="col">ترتیب</th>
        <th scope="col">تصویر ابزارک</th>
        <th scope="col">کاربر نویسنده</th>
        <th scope="col">تاریخ</th>
        <th scope="col">وضعیت</th>
        <th scope="col">ویرایش</th>
        <th scope="col">حذف</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($widget_records as $key=>$record):
    ?>
    <tr>
        <td><?php echo $key+1; ?></td>
        <td><?php echo $record->title; ?></td>
        <td><?php echo $record->sort; ?></td>
        <td><?php echo $record->svg_code; ?></td>
        <td><?php echo $record->author; ?></td>
        <td><?php echo $record->date; ?></td>
        <td><?php echo $record->status; ?></td>
        <td><a class="btn btn-primary" href="dashboard.php?page=edit-widget&id=<?php echo $record->id; ?>" role="button">ویرایش</a></td>
        <td><a class="btn btn-primary" href="dashboard.php?page=delete-widget&id=<?php echo $record->id; ?>" role="button">حذف</a></td>
    </tr>
<?php endforeach;?>
    </tbody>
</table>

<?php else:?>
    <div class="alert alert-warning" role="alert">
        NO_ACCESS!!!
    </div>
<?php endif;?>
