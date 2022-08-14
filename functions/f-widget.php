<?php
include_once 'connect.php';
include_once 'functions.php';


function insert_widget($titles,$sorts,$svgs,$status){
    foreach ($titles as $key=>$title){
        $sort=$sorts[$key];
        $svg=$svgs[$key];
        $stat=$status[$key];
        $author=$_SESSION['login_user'];
        $date=date("y/m/d");
        $pdo=connect_db();
        $query=$pdo->prepare("insert into widget_tbl(title, sort, svg_code, author, date, status) VALUES ('$title','$sort','$svg','$author','$date','$stat')");
        $query->execute();


    }

}

function wid_reco_callback(){
    $pdo=connect_db();
    $query=$pdo->prepare("select * from widget_tbl order by id desc ");
    $query->execute();
    $res=$query->fetchAll(PDO::FETCH_OBJ);
    return $res;
}

function widget_reco_callback($id){
    $pdo=connect_db();
    $query=$pdo->prepare("select * from widget_tbl where id='$id'");
    $query->execute();
    $res=$query->fetch(PDO::FETCH_OBJ);
    return $res;

}

function update_widget($id,$info){
    $title=$info['title'];
    $sort=$info['sort'];
    $svg=$info['icon'];
    $status=$info['status'];
    $author=$_SESSION['login_user'];
    $date=date("y/m/d");
    $pdo=connect_db();
    $query=$pdo->prepare("update widget_tbl set title='$title',sort='$sort',svg_code='$svg',author='$author',date='$date',status='$status' where id='$id'");
    $query->execute();


}
function delete_widget($id){
    $pdo=connect_db();
    $query=$pdo->prepare("delete from widget_tbl where id='$id'");
    $query->execute();

}
function widgets_back(){
    $pdo=connect_db();
    $query=$pdo->prepare("select * from widget_tbl where status='on'");
    $query->execute();
    $res=$query->fetchAll(PDO::FETCH_OBJ);
    return $res;
}



?>
