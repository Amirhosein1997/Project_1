<?php
include_once 'connect.php';
include_once 'functions.php';

function insert_slider_group($info){
    $title=$info['title'];
    $number=$info['number'];
    $parent=0;
    $folder_name=$info['dir_name'];
    $loc="../img/slider/$folder_name";
    if (!is_dir($loc)){mkdir($loc);}
    $date=date("y/m/d");
    $author=$_SESSION['login_user'];
    $status1=$info['status'];
    if ($status1){
        $status='on';
        $others='off';
            $pdo=connect_db();
        $query=$pdo->prepare("update slider_tbl set status='$others'where parent=0");
        $query->execute();
    }else{
        $status='off';
    }

    $pdo=connect_db();
    $query=$pdo->prepare("insert into slider_tbl (title, number, parent, dir, date, author, status) VALUES ('$title','$number','$parent','$loc','$date','$author','$status')");
    $query->execute();

}

function slider_group_callback(){
    $pdo=connect_db();
    $query=$pdo->prepare("select * from slider_tbl where parent=0");
    $query->execute();
    $res=$query->fetchAll(PDO::FETCH_OBJ);
    return $res;


}
function slider_group_reco_callback($id){
    $pdo=connect_db();
    $query=$pdo->prepare("select * from slider_tbl where id='$id'");
    $query->execute();
    $res=$query->fetch(PDO::FETCH_OBJ);
    return $res;


}
function update_slider_group($id,$info){
    $slider_reco=slider_group_reco_callback($id);
$title=$info['title'];
$number=$info['number'];
$folder_name=$info['dir_name'];
$parent=0;
$date=date("y/m/d");
$author=$_SESSION['login_user'];
if ($info['status']){
    $status='on';
    $others='off';
    $pdo=connect_db();
    $query=$pdo->prepare("update slider_tbl set status='$others' where parent=0");
    $query->execute();
}else{
    $status='off';
}
$dir_name=$info['dir_name'];
$loc="../img/slider/$dir_name";
if (!is_dir($loc)){
    unlink($slider_reco->dir);
    mkdir($loc);
}
$pdo=connect_db();
$query=$pdo->prepare("update slider_tbl set title='$title',number='$number',parent='$parent',dir='$loc',date='$date',author='$author',status='$status' where id='$id'");
$query->execute();
}

function delete_slide_group($id){
    $pdo=connect_db();
    $query=$pdo->prepare("delete from slider_tbl where id='$id'");
    $query->execute();
}
function upload_slide($tmp_name,$file_name,$dir){
    $exploded_name=explode('.',$file_name);
    $file_format=end($exploded_name);
    $new_name=time().".".$file_format;
    $new_loc=$dir.$new_name;
    move_uploaded_file($tmp_name,$new_loc);
    return $new_loc;

}
function insert_slider($id,$location,$number){
    $title='sub_slider';
    $date=date("y/m/d");
    $author=$_SESSION['login_user'];
    $status='on';
    $pdo=connect_db();
    $query=$pdo->prepare("insert into slider_tbl(title, number, parent, dir, date, author, status) VALUES ('$title','$number','$id','$location','$date','$author','$status')");
    $query->execute();


}
function sub_slider_callback($id){
    $pdo=connect_db();
    $query=$pdo->prepare("select * from slider_tbl where parent='$id'");
    $query->execute();
    $res=$query->fetchAll(PDO::FETCH_OBJ);
    return $res;
}
function delete_subslider($sub_id){
    $pdo=connect_db();
    $query=$pdo->prepare("delete from slider_tbl where id='$sub_id'");
    $query->execute();
}
function sub_sliders_records(){
    $pdo=connect_db();
    $query=$pdo->prepare("select * from slider_tbl where parent!=0");
    $query->execute();
    $res=$query->fetchAll(PDO::FETCH_OBJ);
    return $res;
}
function slide_show(){
    $pdo=connect_db();
    $query1=$pdo->prepare("select * from slider_tbl where parent='0' and status='on'");
    $query1->execute();
    $res1=$query1->fetch(PDO::FETCH_OBJ);
    $query2=$pdo->prepare("select * from slider_tbl where parent='$res1->id' and status='on'");
    $query2->execute();
    $res2=$query2->fetchAll(PDO::FETCH_OBJ);
    return $res2;
}




?>