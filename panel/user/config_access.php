<?php include_once '../functions/f-user.php'?>
<?php include_once '../functions/functions.php'?>
<?php
$select_perm=select_user_permition($_SESSION['login_user']);
if (strpos($select_perm->permition,'config_access.php') !==false):
?>

<?php
$update=false;
if (isset($_GET['id_page'])){
$update=true;
$id=$_GET['id_page'];
$up_permition=select_permition_url($id);
$new_up_permition=explode(',',$up_permition->permition);}
?>






<!DOCTYPE html>
<head>
    <title>ایجاد و ویرایش مجوز دسترسی</title>
</head>
<?php if (isset($_POST['send_access'])){
    $page=$_POST['page'];
    $new_perm=implode(',',$page);
    $title=$_POST['title'];
    $status=$_POST['status'];
    insert_permition($title,$status,$new_perm);
    $result='ok_made_access';
    header("location:dashboard.php?page=config-access&op={$result}");

} if (isset($_POST['update_access'])){
    $page=$_POST['page'];
    $new_perm=implode(',',$page);
    $title=$_POST['title'];
    $status=$_POST['status'];
    update_permition($id,$title,$status,$new_perm);
    $result='ok_update_access';
    header("location:dashboard.php?page=config-access&op={$result}");

}
?>


<div class="alert alert-success" role="alert">
    <h4 class="alert-heading"> پیکربند دسترسی ها</h4>
    <p>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pin-angle-fill" viewBox="0 0 16 16">
            <path d="M9.828.722a.5.5 0 0 1 .354.146l4.95 4.95a.5.5 0 0 1 0 .707c-.48.48-1.072.588-1.503.588-.177 0-.335-.018-.46-.039l-3.134 3.134a5.927 5.927 0 0 1 .16 1.013c.046.702-.032 1.687-.72 2.375a.5.5 0 0 1-.707 0l-2.829-2.828-3.182 3.182c-.195.195-1.219.902-1.414.707-.195-.195.512-1.22.707-1.414l3.182-3.182-2.828-2.829a.5.5 0 0 1 0-.707c.688-.688 1.673-.767 2.375-.72a5.922 5.922 0 0 1 1.013.16l3.134-3.133a2.772 2.772 0 0 1-.04-.461c0-.43.108-1.022.589-1.503a.5.5 0 0 1 .353-.146z"/>
        </svg>برای افزودن ابزارک جدید به سایت به دو ورودی نیاز است .<br>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pin-angle-fill" viewBox="0 0 16 16">
            <path d="M9.828.722a.5.5 0 0 1 .354.146l4.95 4.95a.5.5 0 0 1 0 .707c-.48.48-1.072.588-1.503.588-.177 0-.335-.018-.46-.039l-3.134 3.134a5.927 5.927 0 0 1 .16 1.013c.046.702-.032 1.687-.72 2.375a.5.5 0 0 1-.707 0l-2.829-2.828-3.182 3.182c-.195.195-1.219.902-1.414.707-.195-.195.512-1.22.707-1.414l3.182-3.182-2.828-2.829a.5.5 0 0 1 0-.707c.688-.688 1.673-.767 2.375-.72a5.922 5.922 0 0 1 1.013.16l3.134-3.133a2.772 2.772 0 0 1-.04-.461c0-.43.108-1.022.589-1.503a.5.5 0 0 1 .353-.146z"/>
        </svg>در بخش اول شما محتوی لازم برای نمایش ابزارک را مشخص می کنید .<br>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pin-angle-fill" viewBox="0 0 16 16">
            <path d="M9.828.722a.5.5 0 0 1 .354.146l4.95 4.95a.5.5 0 0 1 0 .707c-.48.48-1.072.588-1.503.588-.177 0-.335-.018-.46-.039l-3.134 3.134a5.927 5.927 0 0 1 .16 1.013c.046.702-.032 1.687-.72 2.375a.5.5 0 0 1-.707 0l-2.829-2.828-3.182 3.182c-.195.195-1.219.902-1.414.707-.195-.195.512-1.22.707-1.414l3.182-3.182-2.828-2.829a.5.5 0 0 1 0-.707c.688-.688 1.673-.767 2.375-.72a5.922 5.922 0 0 1 1.013.16l3.134-3.133a2.772 2.772 0 0 1-.04-.461c0-.43.108-1.022.589-1.503a.5.5 0 0 1 .353-.146z"/>
        </svg>در بخش دوم کد svg تصویر مربوط به ابزارک مورد نظر را قرار دهید.<br>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pin-angle-fill" viewBox="0 0 16 16">
            <path d="M9.828.722a.5.5 0 0 1 .354.146l4.95 4.95a.5.5 0 0 1 0 .707c-.48.48-1.072.588-1.503.588-.177 0-.335-.018-.46-.039l-3.134 3.134a5.927 5.927 0 0 1 .16 1.013c.046.702-.032 1.687-.72 2.375a.5.5 0 0 1-.707 0l-2.829-2.828-3.182 3.182c-.195.195-1.219.902-1.414.707-.195-.195.512-1.22.707-1.414l3.182-3.182-2.828-2.829a.5.5 0 0 1 0-.707c.688-.688 1.673-.767 2.375-.72a5.922 5.922 0 0 1 1.013.16l3.134-3.133a2.772 2.772 0 0 1-.04-.461c0-.43.108-1.022.589-1.503a.5.5 0 0 1 .353-.146z"/>
        </svg>لطفا در هنگام قرار دادن کد svg ، ویژگی طول (Height) و عرض (Width) آن را حذف نمایید.<br>
    </p>
    <hr>
    <p class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pin-angle-fill" viewBox="0 0 16 16">
            <path d="M9.828.722a.5.5 0 0 1 .354.146l4.95 4.95a.5.5 0 0 1 0 .707c-.48.48-1.072.588-1.503.588-.177 0-.335-.018-.46-.039l-3.134 3.134a5.927 5.927 0 0 1 .16 1.013c.046.702-.032 1.687-.72 2.375a.5.5 0 0 1-.707 0l-2.829-2.828-3.182 3.182c-.195.195-1.219.902-1.414.707-.195-.195.512-1.22.707-1.414l3.182-3.182-2.828-2.829a.5.5 0 0 1 0-.707c.688-.688 1.673-.767 2.375-.72a5.922 5.922 0 0 1 1.013.16l3.134-3.133a2.772 2.772 0 0 1-.04-.461c0-.43.108-1.022.589-1.503a.5.5 0 0 1 .353-.146z"/>
        </svg> اگر نیاز به افزودن بیش از یک ابزارک دارید لطفا روی " + افزودن ابزارک " کلیک کنید.</p>
</div>
<hr>
<?php
if(isset($_GET['op'])):
if($_GET['op']=='ok_update_access'):?>
<div class="alert alert-primary" role="alert">
       اپدیت شد.
    </div>
<?php endif; ?>
<?php endif; ?>

<?php
if(isset($_GET['op'])):
if($_GET['op']=='ok_delete_access'):?>
<div class="alert alert-primary" role="alert">
        حذف شد.
    </div>
<?php endif; ?>
<?php endif; ?>

<?php
if(isset($_GET['op'])):
if($_GET['op']=='ok_made_access'):?>
<div class="alert alert-primary" role="alert">
        مجوز ساخته شد.
    </div>
<?php endif; ?>
<?php endif; ?>



<form method="post" enctype="multipart/form-data" style="padding:30px;background-color: #488858;box-shadow: #1b1e21;">
<h5>ایجاد مجوز دسترسی</h5>
    <br>
    <div class="row">
    <div class="col">
        <label for="formGroupExampleInput" class="form-label">عنوان مجوز/سمت در سیستم</label>
        <input value="<?php if ($update){echo $up_permition->name;} ?>" name="title" type="text" class="form-control" id="formGroupExampleInput" placeholder="لطفا عنوان مجوز را وارد کنید">
    </div>
    <div class="col">
        <label for="inputper" class="form-label">وضعیت مجوز</label>
        <select name="status" id="inputper" class="form-select">
            <option selected>__انتخاب وضعیت مجوز دسترسی</option>
            <option value="ON" <?php if ($update){if ($up_permition->status=='ON'){echo 'selected';}}; ?>>__فعال</option>
            <option value="OFF"<?php if ($update){if ($up_permition->status=='OFF'){echo 'selected';}}; ?>>__غیر فعال</option>
        </select>
    </div>
    </div>
<br>

<div class="row">
    <div class="col">
        <h5>مدیریت کاربران</h5>
        <br>
<?php
$dir_category='user/';
$scan_dir=scandir($dir_category);
foreach ($scan_dir as $key=>$file):
$array_file=explode('.',$file);
if (end($array_file)=="php"):
$title=page_title("user/".$file).'';
if ($title!==''):
?>
        <div class="form-check">
            <input name="page[]" class="form-check-input" type="checkbox" value="<?php echo $file; ?>" <?php if ($update){if (strpos($up_permition->permition,$file) !==false){echo 'checked';}} ?> id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
                    <?php echo $title; ?>
            </label>
        </div>
        <?php endif;?>
        <?php endif;?>
        <?php endforeach;?>


    </div>
<div class="col">
    <h5>مدیریت اسلایدرها</h5>
    <br>
    <?php
    $dir_category='slider/';
    $scan_dir=scandir($dir_category);
    foreach ($scan_dir as $key=>$file):
        $array_file=explode('.',$file);
        if (end($array_file)=="php"):
            $title=page_title("slider/".$file).'';
            if ($title!==''):
                ?>
                <div class="form-check">
                    <input name="page[]" class="form-check-input" type="checkbox" value="<?php echo $file; ?>" <?php if ($update){if (strpos($up_permition->permition,$file) !==false){echo 'checked';}} ?> id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        <?php echo $title; ?>
                    </label>
                </div>
            <?php endif;?>
        <?php endif;?>
    <?php endforeach;?>




</div>
<div class="col">
    <h5>مدیریت صفحات</h5>
    <br>
    <?php
    $dir_category='page/';
    $scan_dir=scandir($dir_category);
    foreach ($scan_dir as $key=>$file):
        $array_file=explode('.',$file);
        if (end($array_file)=="php"):
            $title=page_title("page/".$file).'';
            if ($title!==''):
                ?>
                <div class="form-check">
                    <input name="page[]" class="form-check-input" type="checkbox" value="<?php echo $file; ?>" <?php if ($update){if (strpos($up_permition->permition,$file) !==false){echo 'checked';}} ?> id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        <?php echo $title; ?>
                    </label>
                </div>
            <?php endif;?>
        <?php endif;?>
    <?php endforeach;?>


</div>
</div>
    <br>
<div class="row">
    <div class="col">
        <h5>مدیریت نوشته ها</h5>
        <br>
        <?php
        $dir_category='article/';
        $scan_dir=scandir($dir_category);
        foreach ($scan_dir as $key=>$file):
            $array_file=explode('.',$file);
            if (end($array_file)=="php"):
                $title=page_title("article/".$file).'';
                if ($title!==''):
                    ?>
                    <div class="form-check">
                        <input name="page[]" class="form-check-input" type="checkbox" value="<?php echo $file; ?>" <?php if ($update){if (strpos($up_permition->permition,$file) !==false){echo 'checked';}} ?> id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            <?php echo $title; ?>
                        </label>
                    </div>
                <?php endif;?>
            <?php endif;?>
        <?php endforeach;?>


    </div>
    <div class="col">
        <h5>مدیریت ابزارک ها</h5>
        <br>
        <?php
        $dir_category='widget/';
        $scan_dir=scandir($dir_category);
        foreach ($scan_dir as $key=>$file):
            $array_file=explode('.',$file);
            if (end($array_file)=="php"):
                $title=page_title("widget/".$file).'';
                if ($title!==''):
                    ?>
                    <div class="form-check">
                        <input name="page[]" class="form-check-input" type="checkbox" value="<?php echo $file; ?>" <?php if ($update){if (strpos($up_permition->permition,$file) !==false){echo 'checked';}} ?> id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            <?php echo $title; ?>
                        </label>
                    </div>
                <?php endif;?>
            <?php endif;?>
        <?php endforeach;?>


    </div>
    <div class="col">
        <h5>مدیریت دسته ها</h5>
        <br>
        <?php
        $dir_category='category/';
        $scan_dir=scandir($dir_category);
        foreach ($scan_dir as $key=>$file):
            $array_file=explode('.',$file);
            if (end($array_file)=="php"):
                $title=page_title("category/".$file).'';
                if ($title!==''):
                    ?>
                    <div class="form-check">
                        <input name="page[]" class="form-check-input" type="checkbox" value="<?php echo $file; ?>" <?php if ($update){if (strpos($up_permition->permition,$file) !==false){echo 'checked';}} ?> id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            <?php echo $title; ?>
                        </label>
                    </div>
                <?php endif;?>
            <?php endif;?>
        <?php endforeach;?>


    </div>

</div>
    <?php if($update): ?>
    <div class="mb-4 mt-3">
        <button style="float: left;" name="update_access" value="ویرایش مجوز"  type="submit" class="btn btn-primary">ویرایش مجوز</button>
    </div>
    <?php else:?>
    <div class="mb-4 mt-3">
        <button style="float: left;" name="send_access" value="ایجاد مجوز"  type="submit" class="btn btn-primary">ایجاد مجوز</button>
    </div>
<?php endif; ?>






</form>
<?php else:?>
    <div class="alert alert-warning" role="alert">
        NO_ACCESS!!!
    </div>
<?php endif;?>
    <br>
    <hr>
<div>
    <h5 style="text-align: center;padding: 20px;background-color: #721c24">لیست دسترسی ها</h5>
    <hr>
    <?php include_once 'list_access.php' ?>

</div>


