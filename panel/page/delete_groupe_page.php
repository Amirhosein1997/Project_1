<!DOCTYPE html>
<head>
    <title>حذف گروه صفحات ایجاد شده</title>
</head>

<?php
include_once '../functions/functions.php';
include_once '../functions/f-page.php';
$id=$_GET['id'];
delete_page_group($id);
header("location:dashboard.php?page=setting-page");
?>