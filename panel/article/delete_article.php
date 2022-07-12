<!DOCTYPE html>
<head>
    <title>حذف نوشته ها</title>
</head>
<?php
include_once '../functions/f-article.php';
include_once '../functions/functions.php';
$id=$_GET['id'];
$article_rec_for_img=article_callback($id);
unlink($article_rec_for_img->img);
delete_article($id);
header("location:dashboard.php?page=list-article");

?>