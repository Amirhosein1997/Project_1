<?php
include_once 'connect.php';
include_once 'functions.php';

function categories_callback(){
    $pdo=connect_db();
    $query=$pdo->prepare("select * from category_tbl where parent='0'");
    $query->execute();
    $res=$query->fetchAll(PDO::FETCH_OBJ);
    return $res;

}
function subcategories_callback($id){
    $pdo=connect_db();
    $query=$pdo->prepare("select * from category_tbl where parent='$id'");
    $query->execute();
    $res=$query->fetchAll(PDO::FETCH_OBJ);
    return $res;

}
function publish_article($info,$img,$cats,$status){
    $title=$info['title'];
    $code=getRandomString('6');
    $text=$info['text'];
    $cat_id=implode(',',$cats);
    $articles_loc="../img/articles/$title/";
    if (!is_dir($articles_loc)){mkdir($articles_loc);}
    $image=upload_pics($img,"../img/articles/$title/");
    $author=$_SESSION['login_user'];
    $date=date('Y/M/D');
    $pdo=connect_db();
    $query=$pdo->prepare("insert into article_tbl(code_article, title, text, cat_id, img, author, date, status)values ('$code','$title','$text','$cat_id','$image','$author','$date','$status')");
    $query->execute();

}
    function articles_numbers(){
    $pdo=connect_db();
    $query=$pdo->prepare("select * from article_tbl");
    $query->execute();
    $res=$query->fetchAll(PDO::FETCH_OBJ);
    $res2=count($res);
    return $res2;

    }
    function articles_list(){
    $pdo=connect_db();
    $query=$pdo->prepare("select * from article_tbl order by id desc ");
    $query->execute();
    $res=$query->fetchAll(PDO::FETCH_OBJ);
    return $res;

    }
    function categories_names($ids){
    $pdo=connect_db();
    $query=$pdo->prepare("select * from category_tbl where id in ($ids) ");
    $query->execute();
    $res=$query->fetchAll(PDO::FETCH_OBJ);
    return $res;


    }







?>