<?php
include_once 'connect.php';
include_once 'functions.php';
?>
<?php

function insert_page_group($info){
$title=$info['title'];
$description=$info['description'];
$status=$info['status'];
$code=getRandomString(6);
$author=$_SESSION['login_user'];
$date=jdate('Y F j');
$pdo=connect_db();
$query=$pdo->prepare("insert into page_groups(code, title, description, author, date, status) VALUES('$code','$title','$description','$author','$date','$status')");
$query->execute();
}
function grp_page_callback(){
    $pdo=connect_db();
    $query=$pdo->prepare("select * from page_groups order by id desc ");
    $query->execute();
    $res=$query->fetchAll(PDO::FETCH_OBJ);
    return $res;
}
function insert_page($info){
    $code=getRandomString(6);
    $parent=$info['parent'];
    $link=$info['link'];
    $title=$info['title'];
    $author=$_SESSION['login_user'];
    $date=date("y/m/d");
    $status=$info['status'];
    $pdo=connect_db();
    $query=$pdo->prepare("insert into page_tbl(code, parent,page_link, title, author, date, status ) VALUES ('$code','$parent','$link','$title','$author','$date','$status')");
    $query->execute();
}
function page_callback(){
    $pdo=connect_db();
    $query=$pdo->prepare("select * from page_tbl order by id desc ");
    $query->execute();
    $res=$query->fetchAll(PDO::FETCH_OBJ);
    return $res;
}
function parent_record($id){
    $pdo=connect_db();
    $query=$pdo->prepare("select * from page_groups where id='$id'");
    $query->execute();
    $res=$query->fetch(PDO::FETCH_OBJ);
    return $res;
}
function update_page_group($id,$info){
    $title=$info['title'];
    $description=$info['description'];
    $author=$_SESSION['login_user'];
    $date=date("y/m/d");
    $status=$info['status'];
    $pdo=connect_db();
    $query=$pdo->prepare("update page_groups set title='$title',description='$description',author='$author',date='$date',status='$status' where id='$id'");
    $query->execute();


}
function delete_page_group($id){
    $pdo=connect_db();
    $query=$pdo->prepare("delete from page_groups where id='$id'");
    $query->execute();

}
function page_record($id){
    $pdo=connect_db();
    $query=$pdo->prepare("select * from page_tbl where id='$id'");
    $query->execute();
    $res=$query->fetch(PDO::FETCH_OBJ);
    return $res;
}
function update_page($id,$info){
    $parent=$info['parent'];
    $title=$info['title'];
    $link=$info['link'];
    $author=$_SESSION['login_user'];
    $date=date("y/m/d");
    $status=$info['status'];
    $pdo=connect_db();
    $query=$pdo->prepare("update page_tbl set parent='$parent',page_link='$link',title='$title',author='$author',date='$date',status='$status' where id='$id'");
    $query->execute();

}
function delete_page($id){
    $pdo=connect_db();
    $query=$pdo->prepare("delete from page_tbl where id='$id'");
    $query->execute();
}
function on_grp_page_callback(){
    $pdo=connect_db();
    $query=$pdo->prepare("select * from page_groups where status='on' order by id desc ");
    $query->execute();
    $res=$query->fetchAll(PDO::FETCH_OBJ);
    return $res;
}
function select_pages($id){
    $pdo=connect_db();
    $query=$pdo->prepare("select * from page_tbl where parent='$id'");
    $query->execute();
    $res=$query->fetchAll(PDO::FETCH_OBJ);
    return $res;
}
function links(){
    $pdo=connect_db();
    $query=$pdo->prepare("select * from template_page ");
    $query->execute();
    $res=$query->fetchAll(PDO::FETCH_OBJ);
    return $res;
}
function insert_single_page($info,$btn_title,$page){
    $title=$info['title'];
    $description=$info['description'];
    $code=$info['vid_link'];
    $author=$_SESSION['login_user'];
    $date=date('y/m/d');
    $status=$info['status'];
    $imploded_btn=implode(',',$btn_title);
    $imploded_page=implode(',',$page);
    $single_page_records=single_page_callback();
    $single_page_nums=count($single_page_records);
    if ($single_page_nums==0){
        $pdo=connect_db();
        $query=$pdo->prepare("insert into single_page (title, description, video_code, btn_title, page_link, author, date, status) VALUES('$title','$description','$code','$imploded_btn','$imploded_page','$author','$date','$status' )");
        $query->execute();
    }else {
        $pdo = connect_db();
        $query = $pdo->prepare("update single_page set title='$title',description='$description',video_code='$code',btn_title='$imploded_btn',page_link='$imploded_page',author='$author',date='$date',status='$status' ");
        $query->execute();
    }

}
function single_page_callback(){
    $pdo=connect_db();
    $query=$pdo->prepare("select * from single_page");
    $query->execute();
    $res=$query->fetchAll(PDO::FETCH_OBJ);
    return $res;
}
function single_record(){
    $pdo=connect_db();
    $query=$pdo->prepare("select * from single_page");
    $query->execute();
    $res=$query->fetch(PDO::FETCH_OBJ);
    return $res;
}

function insert_template_pages($files){
    $pdo=connect_db();
    foreach ($files as $file){
        if (!template_record($file)) {
            $link = "panel/template_page/" . $file;
            $query = $pdo->prepare("insert into template_page(name, link) VALUES ('$file','$link')");
            $query->execute();
        }
        }
}
function template_record($file){
    $pdo=connect_db();
    $query=$pdo->prepare("select * from template_page where name='$file'");
    $query->execute();
    $res=$query->fetch(PDO::FETCH_OBJ);
    return $res;
}
?>