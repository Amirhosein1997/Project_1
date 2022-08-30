<?php
include_once '../functions/functions.php';
include_once '../functions/f-user.php';
?>





<?php
$file=$_GET['file'];
$title_record=title_record($file);
if (isset($_POST['send'])){
    $title=$_POST['title'];
    insert_tag($title,$file);
    header("location:dashboard.php?page=edit-access");
}

?>
<div style="  border: 1px solid;
  padding: 10px;
  box-shadow: 5px 10px 20px red inset;">
<form method="post" enctype="multipart/form-data">
    <div class="mb-3 mt-3">
        <label  class="form-label">نام فایل</label>
        <input readonly value="<?php echo $title_record->file_name; ?>" type="text" class="form-control"  >
    </div>
    <div class="mb-3 mt-3">
        <label  class="form-label">محتوای تگ تایتل</label>
        <input name="title" type="text" class="form-control">
    </div>
    <button name="send" type="submit" class="btn btn-primary">ارسال</button>
    <a href="dashboard.php?page=edit-access" class="btn btn-success">بازگشت</a>
</form>
</div>