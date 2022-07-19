<!DOCTYPE html>
<head>
    <title>حذف دسته اسلایدی</title>
</head>

<?php
include_once '../functions/functions.php';
include_once '../functions/f-slider.php';
$id=$_GET['id'];
delete_slide_group($id);
header("location:dashboard.php?page=setting-slider");
?>

