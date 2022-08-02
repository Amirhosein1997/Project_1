<?php include_once '../functions/f-user.php';
$select_perm=select_user_permition($_SESSION['login_user']);
if (strpos($select_perm->permition,'list_access.php') !==false):
?>

<!DOCTYPE html>
<head>
    <title>مشاهده لیست مجوزها</title>
</head>



<div>
    <table class="table table-dark table-striped">
        <thead>
        <tr>
            <th scope="col">ردیف</th>
            <th scope="col">کد مجوز</th>
            <th scope="col">عنوان مجوز/سمت</th>
            <th scope="col">ایجاد کننده</th>
            <th scope="col">تاریخ</th>
            <th scope="col">مجوزها</th>
            <th scope="col">وضعیت</th>
            <th scope="col">ویرایش</th>
            <th scope="col">حذف</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $access=list_permition();
        if (count($access)==0): ?>

            <div class="alert alert-primary" role="alert">
                بدون هیچ مجوز دسترسی.
            </div>

        <?php endif;?>
<?php foreach ($access as $index=>$val):
    ?>
        <tr>
            <td><?php echo $index+1; ?></td>
            <td><?php echo $val->code; ?></td>
            <td><?php echo $val->name; ?></td>
            <td><?php echo $val->author; ?></td>
            <td><?php echo $val->date; ?></td>
            <td>
            <?php $result=list_name_permition($val->id);
            foreach ($result as $key=>$result_names):?>
                <?php echo $result_names   ?>
                <?php endforeach;?>

            </td>
            <td><?php echo $val->status; ?></td>
            <td><button type="button" class="btn btn-primary"><a href="dashboard.php?page=config-access&id_page=<?php echo $val->id; ?>">ویرایش</a></button></td>
            <td><button type="button" class="btn btn-primary"><a href="dashboard.php?page=delete-access&id=<?php echo $val->id; ?>">حذف</a></button></td>
        </tr>
<?php endforeach;?>
             </tbody>
    </table>




</div>
<?php else:?>
    <div class="alert alert-warning" role="alert">
        NO_ACCESS!!!
    </div>
<?php endif;?>