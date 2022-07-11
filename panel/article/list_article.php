<?php
include_once '../functions/functions.php';
include_once '../functions/f-article.php';
$num=articles_numbers();
$select_permitions=select_user_permition($_SESSION['login_user']);
if (strpos($select_permitions->permition,'list_article') !==false):
?>

<!DOCTYPE html>
<head>
    <title>مشاهده مقالات</title>
</head>

<a class="btn btn-primary" href="dashboard.php?page=new-article" role="button">افزودن نوشته جدید</a>
    <div style="text-align: center" class="alert alert-primary" role="alert">
        تعداد مقالات: <?php echo $num ?>
    </div>

<table class="table table-sm table-dark table-hover">
    <thead>
    <tr>
        <th scope="col">ردیف</th>
        <th scope="col">کد محتوا</th>
        <th scope="col">عنوان نوشته</th>
        <th scope="col">محتوای نوشته</th>
        <th scope="col">دسته بندی</th>
        <th scope="col">وضعیت انتشار</th>
        <th scope="col">نویسنده</th>
        <th scope="col">تاریخ ایجاد</th>
        <th scope="col">تصویر</th>
        <th scope="col">ویرایش</th>
        <th scope="col">حذف</th>
    </tr>
    </thead>
    <tbody>
    <?php $articles=articles_list();
    foreach ($articles as $key=>$article): ?>
    <tr>
        <td><?php echo $key+1; ?></td>
        <td><?php echo $article->code_article; ?></td>
        <td><?php echo $article->title; ?></td>
        <td><?php if(strlen($article->text) > 30){$article->text = substr($article->text, 0, 30) . '...';echo $article->text;}else{echo $article->text;} ?></td>
        <td><?php $cats_names=categories_names($article->cat_id);
            foreach ($cats_names as $item){
                echo $item->title.PHP_EOL;

            }
            ?></td>
        <td><?php echo $article->status; ?></td>
        <td><?php echo $article->author; ?></td>
        <td><?php echo $article->date; ?></td>
        <td><img src="<?php echo $article->img; ?>" width="100" height="60"></td>
        <td><a class="btn btn-primary" href="dashboard.php?page=edit-article&id=<?php echo $article->id; ?>" role="button">ویرایش</a></td>
        <td><a class="btn btn-primary" href="dashboard.php?page=delete-article&id=<?php echo $article->id; ?>" role="button">حذف</a></td>
    </tr>
<?php endforeach;?>
    </tbody>
</table>
<?php else:?>
    <div class="alert alert-dark" role="alert">
       SORRY NO ACCESS!!!!!!
    </div>

<?php endif;?>
