<?php
include_once '../functions/functions.php';
include_once '../functions/f-slider.php';
$permition_record=select_user_permition($_SESSION['login_user']);
if (strpos($permition_record->permition,'edit_slider_info.php') !==false):
?>
<!DOCTYPE html>
<head>
    <title>ویرایش دسته اسلایدی</title>
</head>
<?php
    $id=$_GET['id'];
    $slider_group_reco=slider_group_reco_callback($id);
    $exploded_dir=explode("/",$slider_group_reco->dir);
    $dir_name=end($exploded_dir);
    if (isset($_POST['update'])){
        $info=$_POST['info'];
        update_slider_group($id,$info);
        header("location:dashboard.php?page=setting-slider");


    }

    ?>



    <form method="post" enctype="multipart/form-data" style="border: 10px solid #3928a2;padding: 30px;background-color: #3f8577" >
        <div class="mb-3">
            <label for="exampleInput1" class="form-label">عنوان دسته اسلایدی</label>
            <input value="<?php echo $slider_group_reco->title; ?>" name="info[title]" type="text" class="form-control" id="exampleInput1" required >
        </div>
        <div class="mb-3">
            <label for="exampleInput2" class="form-label">تعداد اسلاید</label>
            <input value="<?php echo $slider_group_reco->number; ?>" name="info[number]" type="text" class="form-control" id="exampleInput2" required>
        </div>
        <div class="mb-3">
            <label for="exampleInput3" class="form-label">نام پوشه</label>
            <input value="<?php echo $dir_name; ?>" name="info[dir_name]" type="text" class="form-control" id="exampleInput3" required>
        </div>
        <div class="form-check form-switch">
            <label class="form-check-label" for="flexSwitchCheckDefault">فعال یا غیرفعال:</label>
            <input <?php if ($slider_group_reco->status='on'){echo 'checked';} ?> name="info[status]" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
        </div>
        <button name="update" type="submit" class="btn btn-primary">ثبت</button>
    </form>





<br><hr><br>
<?php include_once 'slider/list_slider_info.php' ;?>

<?php else:?>
    <div class="alert alert-primary" role="alert">
        NO ACCESS
    </div>

<?php endif;?>
