<!DOCTYPE html>
<head>
    <title>افزودن اسلایدر به گروه اسلایدی</title>
</head>
<?php
include_once '../functions/functions.php';
include_once '../functions/f-slider.php';
$id=$_GET['id'];
$slider_group_record=slider_group_reco_callback($id);
if (isset($_POST['update'])){
$dir=$slider_group_record->dir."/";
foreach ($_FILES['file']['name'] as $key=>$val){
    $tmp_name=$_FILES['file']['tmp_name'][$key];
    $file_name=$_FILES['file']['name'][$key];
    $location=upload_slide($tmp_name,$file_name,$dir);
    $number=$key+1;
    insert_slider($id,$location,$number);


}

}




?>

<form method="post" enctype="multipart/form-data">
  <?php
    for ($i=0;$i<$slider_group_record->number;$i++):
  ?>
    <div class="mb-3">
        <label for="formFile" class="form-label">اسلاید شماره<?php echo $i+1; ?></label>
        <input name="file[]" class="form-control" type="file" id="formFile" required>
    </div>

<?php endfor;?>
    <a class="btn btn-primary" href="dashboard.php?page=setting-slider" role="button">بازگشت</a>
    <input name="update" class="btn btn-primary" type="submit" value="ثبت">
</form>
<br><hr><br>
<?php include_once 'slider/list_slide_info.php';?>
