<?php
include_once '../functions/functions.php';
include_once '../functions/f-category.php';
?>

<?php
$id=$_GET['id'];
$cat_record=call_back_cat($id);
if (isset($_POST['submit'])){
    $info=$_POST['info'];
    add_subcategory($info,$id);
    header("location:dashboard.php?page=list-category");
}



?>



<div style="border: 1px solid;padding: 10px;box-shadow: 5px 5px blue, 10px 10px red, 15px 15px green;margin: 20px;">
<h5>افزودن زیر دسته</h5>
    <hr>
    <form method="post" enctype="multipart/form-data">
        <div class="mb-3 mt-3">
            <label  class="form-label">نام دسته اصلی</label>
            <input value="<?php echo $cat_record->title; ?>" readonly type="text" class="form-control" >
        </div>
        <div class="mb-3 mt-3">
            <label  class="form-label">نام زیر دسته مورد نظر</label>
            <input name="info[title]" type="text" class="form-control" >
        </div>
        <div class="mb-3 mt-3">
            <label  class="form-label">ترتیب زیردسته</label>
            <input name="info[sort]"  type="text" class="form-control" >
        </div>
        <div class="form-check form-switch">
            <label class="form-check-label" for="mySwitch">وضعیت:</label>
            <input class="form-check-input" type="checkbox" id="mySwitch" name="info[status]" value="yes" checked>
        </div>
        <button name="submit" type="submit" class="btn btn-primary">ثبت</button>
    </form>





</div>