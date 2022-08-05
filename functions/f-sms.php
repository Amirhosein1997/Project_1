<?php
include_once 'functions.php';
include_once 'connect.php';

function getcredit(){
    $url = "https://ippanel.com/services.jspd";
    $param = array
    (
        'uname'=>'my_username',
        'pass'=>'my_password',
        'op'=>'credit'
    );

    $handler = curl_init($url);
    curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($handler, CURLOPT_POSTFIELDS, $param);
    curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
    $response2 = curl_exec($handler);

    $response2 = json_decode($response2);
    $res_code = $response2[0];
    $res_data = $response2[1];


    echo $res_data;

}
function insert_preset_sms($info){
    $text=$info['text'];
    $cat=$info['cat'];
    $author=$_SESSION['login_user'];
    $date=jdate("y/m/d");
    $status=$info['status'];
    $pdo=connect_db();
    $query=$pdo->prepare("insert into preset_sms(text, cat, author, date, status) VALUES('$text','$cat','$author','$date','$status') ");
    $query->execute();

}
function preset_sms_callback(){
    $pdo=connect_db();
    $query=$pdo->prepare("select * from preset_sms order by id desc ");
    $query->execute();
    $res=$query->fetchAll(PDO::FETCH_OBJ);
    return $res;
}
function update_preset_sms($info,$id){
    $text=$info['text'];
    $cat=$info['cat'];
    $author=$_SESSION['login_user'];
    $date=jdate("Y/m/d");
    $status=$info['status'];
    $pdo=connect_db();
    $query=$pdo->prepare("update preset_sms set text='$text',cat='$cat',author='$author',date='$date',status='$status' where id='$id'");
    $query->execute();

}
function preset_sms_record($id){
    $pdo=connect_db();
    $query=$pdo->prepare("select * from preset_sms where id='$id'");
    $query->execute();
    $res=$query->fetch(PDO::FETCH_OBJ);
    return $res;
}
function delete_preset_sms($id){
    $pdo=connect_db();
    $query=$pdo->prepare("delete from preset_sms where id='$id'");
    $query->execute();
}



?>