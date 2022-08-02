<?php
$select_perm=select_user_permition($_SESSION['login_user']);
if (strpos($select_perm->permition,'list_upload_file.php') !==false):
?>
<!DOCTYPE html>
<head>
    <title>گزارش تاریخچه ارسال فایل</title>
</head>


<table class="table">
    <thead>
    <tr>
        <th scope="col">ردیف</th>
        <th scope="col">کد فایل</th>
        <th scope="col">عنوان فایل</th>
        <th scope="col">نوع فایل</th>
        <th scope="col">ارسال کننده</th>
        <th scope="col">تاریخ ارسال</th>
        <th scope="col">توضیحات</th>
        <th scope="col">دریافت فایل</th>

    </tr>
    </thead>
    <tbody>
    <?php include_once '../functions/f-user.php';
    $files=list_upload_file();
    if (count($files)==0):?>
    <div class="alert alert-primary" role="alert">
            NO files been uploaded
        </div>
    <?php endif; ?>
    <?php
    foreach ($files as $key=>$file):
    ?>
    <tr>
        <td><?php echo $key+1; ?></td>
        <td><?php echo $file->code;?></td>
        <td><?php echo $file->name;?></td>
        <td><?php echo $file->type;?></td>
        <td><?php echo $file->author;?></td>
        <td><?php echo $file->date;?></td>
        <td><?php echo $file->description; ?></td>
        <td><a href="<?php echo $file->path; ?>">دانلود فایل</a></td>

    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php else:?>
    <div class="alert alert-warning" role="alert">
        NO_ACCESS!!!
    </div>
<?php endif;?>