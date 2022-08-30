<?php include_once 'connect.php';


function list_category(){
    $pdo=connect_db();
    $query=$pdo->prepare("select * from category_tbl where parent=0");
    $query->execute();
    $res=$query->fetchAll(PDO::FETCH_OBJ);
    return $res;

}

function add_category($info){
    $title=$info['title'];
    $sort=$info['sort'];
    $parent=$info['parent'];
    if (isset($info['status'])){
        $status='on';
    }else{
        $status='off';
    }
    $pdo=connect_db();
    $query=$pdo->prepare("INSERT INTO category_tbl (title, sort, parent, status) VALUES('$title','$sort','$parent','$status')");
    $query->execute();

}
function list_subcategory($id){
    $pdo=connect_db();
    $query=$pdo->prepare("select * from category_tbl where parent='$id'");
    $query->execute();
    $res=$query->fetchAll(PDO::FETCH_OBJ);
    return $res;

}
function call_back_cat($id){
    $pdo=connect_db();
    $query=$pdo->prepare("select * from category_tbl where id='$id'");
    $query->execute();
    $res=$query->fetch(PDO::FETCH_OBJ);
    return $res;

}
function update_category($id,$info){
    $title=$info['title'];
    $sort=$info['sort'];
    $parent=$info['parent'];
    if (isset($info['status'])) {
        $status='on';
    }else{
        $status='off';
    }
    $pdo=connect_db();
    $query=$pdo->prepare("update category_tbl set title='$title',sort='$sort',parent='$parent',status='$status' where id='$id'");
    $query->execute();

}
function delete_category($id){
    $pdo=connect_db();
    $query=$pdo->prepare("delete from category_tbl where id='$id' ");
    $query->execute();

}
function cat_callback(){
    $pdo=connect_db();
    $query=$pdo->prepare("select * from category_tbl where parent='0' and status='on' order by id desc ");
    $query->execute();
    $res=$query->fetchAll(PDO::FETCH_OBJ);
    return $res;
}
function subcat_callback($id){
    $pdo=connect_db();
    $query=$pdo->prepare("select * from category_tbl where parent='$id' and status='on' order by id desc");
    $query->execute();
    $res=$query->fetchAll(PDO::FETCH_OBJ);
    return $res;

}
function add_subcategory($info,$id){
    $title=$info['title'];
    $sort=$info['sort'];
    $parent=$id;
    if (isset($info['status'])){
        $status='on';
    }else{
        $status='off';
    }
    $pdo=connect_db();
    $query=$pdo->prepare("INSERT INTO category_tbl (title, sort, parent, status) VALUES('$title','$sort','$parent','$status')");
    $query->execute();

}







?>
