<!DOCTYPE html>
<head>
    <title>ایجاد گروه صفحات</title>
</head>

<?php
include_once '../functions/functions.php';
include_once '../functions/f-page.php';
$select_perm=select_user_permition($_SESSION['login_user']);
if (strpos($select_perm->permition,'made_groupe_page.php') !==false):
?>
    <?php
    if (isset($_POST['send'])){
        $info=$_POST['info'];
        insert_page_group($info);
        header("location:dashboard.php?page=setting-page");
    }
    ?>
    <form style="padding: 30px;background-color: #884148;" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="exampleInput1" class="form-label">عنوان گروه</label>
            <input name="info[title]" type="text" class="form-control" id="exampleInput1" >
        </div>
        <div class="mb-3">
            <label for="exampleInput2" class="form-label">شرح گروه</label>
            <input name="info[description]" type="text" class="form-control" id="exampleInput2">
        </div>
        <div class="mb-3">
            <label for="exampleInput3" class="form-label">وضعیت گروه</label>
            <select name="info[status]" class="form-select" aria-label="Default select example" id="exampleInput3">
                <option selected disabled>__وضعیت گروه را انتخاب کنید</option>
                <option value="on">__on</option>
                <option value="off">__off</option>
            </select>
        </div>

        <button name="send" type="submit" class="btn btn-primary">ثبت</button>
    </form>

<?php else:?>
<div class="alert alert-warning" role="alert">
    NO_ACCESS!!!
</div>
<?php endif;?>