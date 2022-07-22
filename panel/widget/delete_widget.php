<!DOCTYPE html>
<head>
    <title>حذف ابزارک</title>
</head>
<?php
include_once '../functions/functions.php';
include_once '../functions/f-widget.php';

$id=$_GET['id'];
delete_widget($id);
header("location:dashboard.php?page=setting-widget");



?>