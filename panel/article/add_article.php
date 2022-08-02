<?php include_once '../functions/f-article.php';
include_once '../functions/functions.php';
$select_perm=select_user_permition($_SESSION['login_user']);
if (strpos($select_perm->permition,'add_article.php') !==false):
if (isset($_POST['publish']) or isset($_POST['save'])){
    if (isset($_POST['publish'])){
        $status='publish';
    }elseif(isset($_POST['save'])){
        $status='save';
    }

    $info=$_POST['info'];
    $img=$_FILES['img'];
    $cats=$_POST['cat'];
   publish_article($info,$img,$cats,$status);

}



?>
<!DOCTYPE html>
<head>
    <title>افزودن نوشته جدید</title>
    <script src="https://cdn.tiny.cloud/1/yp32oxam6dc9luldn9u29mvhyo76y09lc3yslstrt7e7xj08/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="../js/tinymce_js.js"></script>
    <link rel="stylesheet" href="../css/tinymce_css.css">
</head>
<form method="post" enctype="multipart/form-data">
    <div class="row">
<div class="col-md-9">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">عنوان:</label>
        <hr>
        <input name="info[title]" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

    </div>
<textarea name="info[text]" id="open-source-plugins">
</textarea>

</div>
<div class="col-md-3">
    <div class="mb-3">
        <label for="formFile" class="form-label">اپلود تصویر اصلی</label>
        <hr>
        <input name="img" class="form-control" type="file" id="formFile">
    </div>

    <br>
    <h6>دسته بندی ها</h6>
    <hr>
    <?php $categories=categories_callback();
        foreach ($categories as $cat):?>
        <div class="form-check">
            <input name="cat[]" class="form-check-input" type="checkbox" value="<?php echo $cat->id?>" id="<?php echo $cat->id?>">
            <label class="form-check-label" for="<?php echo $cat->id?>">
                <?php echo $cat->title; ?>
            </label>
        </div>
        <?php $subcategories=subcategories_callback($cat->id);
        foreach ($subcategories as $subcat):
        ?>

    <div class="form-check">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
        </svg>
        <input name="cat[]" class="form-check-input" type="checkbox" value="<?php echo $subcat->id?>" id="<?php echo $subcat->id?>">
        <label class="form-check-label" for="<?php echo $subcat->id?>">
            <?php echo $subcat->title; ?>
        </label>
    </div>


    <?php endforeach;  ?>
    <?php endforeach;?>


</div>
    </div>
    <br>
    <button name="publish" type="submit" class="btn btn-primary">انتشار مقاله</button>
    <button name="save" type="submit" class="btn btn-secondary">ذخیره مقاله</button>
    <a class="btn btn-primary" href="dashboard.php?page=list-article" role="button">بازگشت</a>
</form>

<?php else:?>
    <div class="alert alert-warning" role="alert">
        NO_ACCESS!!!
    </div>
<?php endif;?>