<?php include_once '../functions/functions.php';
include_once '../functions/f-slider.php';?>
<!DOCTYPE html>
<head>
    <title>افزودن دسته اسلایدی جدید</title>
</head>
<?php
if (isset($_POST['send'])){
$info=$_POST['info'];
insert_slider_group($info);
header("location:dashboard.php?page=setting-slider");


}

?>
<h5>افزودن دسته اسلایدی جدید</h5>
<hr>
<form method="post" enctype="multipart/form-data" style="border: 10px solid #3928a2;padding: 30px;background-color: #3f8577" >
    <div class="mb-3">
        <label for="exampleInput1" class="form-label">عنوان دسته اسلایدی</label>
        <input name="info[title]" type="text" class="form-control" id="exampleInput1" required >
    </div>
    <div class="mb-3">
        <label for="exampleInput2" class="form-label">تعداد اسلاید</label>
        <input name="info[number]" type="text" class="form-control" id="exampleInput2" required>
    </div>
    <div class="mb-3">
        <label for="exampleInput3" class="form-label">نام پوشه</label>
        <input name="info[dir_name]" type="text" class="form-control" id="exampleInput3" required>
    </div>
    <div class="form-check form-switch">
        <label class="form-check-label" for="flexSwitchCheckDefault">فعال یا غیرفعال:</label>
        <input name="info[status]" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
    </div>
    <button name="send" type="submit" class="btn btn-primary">ثبت</button>
</form>
