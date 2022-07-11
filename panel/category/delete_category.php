<?php
include_once '../functions/f-category.php';
if (isset($_GET['id'])){
    $id=$_GET['id'];
    delete_category($id);
    header("location:dashboard.php?page=list-category");

}

?>