<?php

include_once '../functions/functions.php';
include_once '../functions/f-article.php';

    $id=$_GET['id'];
    $article_record=article_callback($id);


if (isset($_POST['update']) or isset($_POST['save'])){
    if (isset($_POST['update'])){
        $status='publish';
    }elseif (isset($_POST['save'])){
        $status='save';
    }
    $info=$_POST['info'];
    $image=$_FILES['img'];
    $cats=$_POST['cat'];
    $title=$info['title'];
    $articles_loc="../img/articles/$title/";
    if (!is_dir($articles_loc)){mkdir($articles_loc);}
    if ($image['name'] !==""){
        unlink($article_record->img);
        $image_loc=upload_pics($image,$articles_loc);
    }else{$image_loc=$article_record->img;}


      update_article($id,$status,$info,$image_loc,$cats);
    header("location:dashboard.php?page=list-article");


}




?>

<!DOCTYPE html>
<head>
    <title>ویرایش نوشته</title>
    <script src="https://cdn.tiny.cloud/1/yp32oxam6dc9luldn9u29mvhyo76y09lc3yslstrt7e7xj08/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="../js/tinymce_js.js"></script>
    <link rel="stylesheet" href="../css/tinymce_css.css" >
</head>


<form action="#" method="post" enctype="multipart/form-data"  >
    <div class="row">
        <div class="col-md-9">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">عنوان:</label>
                <hr>
                <input value="<?php echo $article_record->title; ?>" name="info[title]" type="text" class="form-control"  >

            </div>
            <textarea  name="info[text]" id="open-source-plugins"><?php echo $article_record->text; ?></textarea>

        </div>
        <div class="col-md-3">
            <div class="mb-3">
                <label for="formFile" class="form-label">اپلود تصویر اصلی</label>
                <hr>
                <input name="img" class="form-control" type="file" id="formFile">
                <img width="250" height="200" src="<?php echo $article_record->img; ?>">
            </div>

            <br>
            <h6>دسته بندی ها</h6>
            <hr>
            <?php $categories=categories_callback();

            foreach ($categories as $cat):?>
                <div class="form-check">
                    <input <?php if (strpos($article_record->cat_id,$cat->id ) !==false){echo 'checked';} ?> name="cat[]" class="form-check-input" type="checkbox" value="<?php echo $cat->id?>" id="<?php echo $cat->id?>">
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
                        <input <?php if (strpos($article_record->cat_id,$subcat->id ) !==false){echo 'checked';} ?> name="cat[]" class="form-check-input" type="checkbox" value="<?php echo $subcat->id?>" id="<?php echo $subcat->id?>">
                        <label class="form-check-label" for="<?php echo $subcat->id?>">
                            <?php echo $subcat->title; ?>
                        </label>
                    </div>


                <?php endforeach;  ?>
            <?php endforeach;?>
            <hr>
            <h6>اطلاعات وارد شده</h6>
            <hr><br>

                <div class="mb-3">
                    <label  class="form-label">تاریخ ثبت</label>
                    <input value="<?php echo $article_record->date; ?>" type="text" class="form-control"  readonly >

                </div>
                <div class="mb-3">
                    <label  class="form-label">نویسنده</label>
                    <input value="<?php echo $article_record->author; ?>" type="text" class="form-control"  readonly>
                </div>



        </div>
    </div>
    <br>
   <!-- <input name="update" class="btn btn-primary" type="submit" value="ویرایش">
    <input name="save" class="btn btn-primary" type="submit" value="ذخیره"> -->
    <h5>انتشار : </h5>
    <button class="btn btn-primary" type="submit" name="update">
        ویرایش و انتشار
    </button>
    <button class="btn btn-primary" type="submit" name="save">
        پیش نویس
    </button>
    <a class="btn btn-primary" href="dashboard.php?page=list-article" role="button">بازگشت</a>
</form>
