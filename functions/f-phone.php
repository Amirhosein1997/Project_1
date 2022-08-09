<?php
include_once 'connect.php';
include_once 'functions.php';

function users_record(){
    $pdo=connect_db();
    $query=$pdo->prepare("select * from users_tbl where status='active' order by id desc ");
    $query->execute();
    $res=$query->fetchAll(PDO::FETCH_OBJ);
    return $res;
}
















?>