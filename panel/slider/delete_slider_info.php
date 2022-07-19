<!DOCTYPE html>
<head>
    <title>حذف اسلایدرها</title>
</head>
<?php
include_once '../functions/functions.php';
include_once '../functions/f-slider.php';
$sub_id=$_GET['id'];
delete_subslider($sub_id);
header("location:dashboard.php?page=setting-slider");



?>