<?php
include_once 'connect.php';

function upload_pics($pic,$location){
$img_name=$pic['name'];
$img_tmp=$pic['tmp_name'];
$img_explode=explode('.',$img_name);
$img_format=end($img_explode);
$img_newname=time().'.'.$img_format;
$new_location=$location.$img_newname;
move_uploaded_file($img_tmp,$new_location);
return $new_location;
}

function getRandomString($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $string = '';

    for ($i = 0; $i < $length; $i++) {
        $string .= $characters[mt_rand(0, strlen($characters) - 1)];
    }

    return $string;
}

function select_user_permition($username){
    $pdo=connect_db();
$query1=$pdo->prepare("select * from users_tbl where user_name='$username'");
$query1->execute();
$res1=$query1->fetch(PDO::FETCH_OBJ);
$query2=$pdo->prepare("select * from permition_tbl where id=$res1->permition");
$query2->execute();
$res2=$query2->fetch(PDO::FETCH_OBJ);
return $res2;


}

?>