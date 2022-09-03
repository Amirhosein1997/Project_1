<?php
include_once '../functions/f-category.php';
include_once '../functions/functions.php';
$select_permitions=select_user_permition($_SESSION['login_user']);
if (strpos($select_permitions->permition,'add_category.php') !==false):
?>
<!DOCTYPE html>
<head>
    <title>افزودن دسته جدید</title>
</head>
<?php
if (isset($_POST['send'])){
    $info=$_POST['info'];
    add_category($info);
    header("location:dashboard.php?page=list-category");
}
?>
<h5>افزودن دسته جدید</h5>
<br><hr>
<form method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">عنوان</label>
        <input type="text" name="info[title]" class="form-control" id="exampleInputEmail1" >
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">ترتیب نمایش</label>
        <input type="text" name="info[sort]" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">سرگروه یا زیرگروه</label>
        <select class="form-select" aria-label="Default select example" name="info[parent]">
            <option selected value="0">سرگروه</option>
            <?php
            $res=list_category();
            foreach ($res as $val):?>

            <option value="<?php echo $val->id; ?>"><?php echo $val->title; ?></option>
           <?php endforeach;?>
        </select>
    </div>
    <div class="form-check form-switch">
        <label class="form-check-label" for="flexSwitchCheckDefault">فعال یا غیرفعال</label>
        <input name="info[status]" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" checked>
    </div>
    <br>
    <button type="submit" name="send" class="btn btn-primary">ایجاد منو</button>

    <a class="btn btn-primary" href="dashboard.php?page=list-category" role="button">بازگشت</a>
</form>
<?php else:?>
<div class="alert alert-primary" role="alert">
    SORRY NO ACCESS
</div>
<?php endif;