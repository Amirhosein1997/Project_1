<!DOCTYPE html>
<head>
    <title>ویرایش ابزارک</title>
</head>
<?php
include_once '../functions/functions.php';
include_once '../functions/f-widget.php';
$id=$_GET['id'];
$widget_reco=widget_reco_callback($id);
if (isset($_POST['update'])){
    $info=$_POST['info'];
    update_widget($id,$info);
    header("location:dashboard.php?page=setting-widget");


}


?>






<form method="post" enctype="multipart/form-data">
    <h5>ویرایش ابزارک</h5><br>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">عنوان ابزارک</label>
        <input value="<?php echo $widget_reco->title; ?>" name="info[title]" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">ترتیب نمایش</label>
        <input value="<?php echo $widget_reco->sort; ?>" name="info[sort]" type="text" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">کد svg ابزارک</label>
        <textarea  name="info[icon]"  class="form-control" id="exampleInputPassword1"><?php echo $widget_reco->svg_code; ?></textarea>

    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">وضعیت ابزارک</label>
        <select name="info[status]" class="form-select">
            <option selected disabled></option>
            <option <?php if ($widget_reco->status=='on'){echo 'selected';} ?> value="on">__فعال</option>
            <option <?php if ($widget_reco->status=='off'){echo 'selected';} ?> value="off">__غیره فعال</option>
        </select>
    </div>

    <br>
    <button name="update" type="submit" class="btn btn-primary">ویرایش</button>
    <br>
    <a class="btn btn-primary" href="dashboard.php?page=setting-widget" role="button">بازگشت</a>
</form>

