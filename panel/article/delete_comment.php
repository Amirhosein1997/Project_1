<!DOCTYPE html>
<head>
    <title>حذف نظرات نوشته</title>
</head>
<?php
include_once '../functions/functions.php';
include_once '../functions/f-article.php';
$id=$_GET['id'];
delete_comment($id);
header("location:dashboard.php?page=list-comment");
