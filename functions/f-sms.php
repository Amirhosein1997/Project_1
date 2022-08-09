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


    return $res_data;

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
function serv_numbers(){
    $url = "https://ippanel.com/services.jspd";
    $param = array
    (
        'uname'=>'',
        'pass'=>'',
        'op'=>'lines'
    );

    $handler = curl_init($url);
    curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($handler, CURLOPT_POSTFIELDS, $param);
    curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
    $response2 = curl_exec($handler);

    $response2 = json_decode($response2);
    $res_code = $response2[0];
    $res_data = $response2[1];
    $decode_res=json_decode($res_data);


    return $decode_res;
}
function send_sms($info){
$sender=$_SESSION['login_user'];
$time=jdate("H:i:s");
$date=jdate("y/m/d");
$text=$info['text'];

$from=$info['from'];
$to=$info['to'];
if (isset($info['preset_text'])){
    $sms_text=$info['preset_text'];
}else{
    $sms_text=$text;
}
    $url = "https://ippanel.com/services.jspd";

    $rcpt_nm = array($to);
    $param = array
    (
        'uname'=>'',
        'pass'=>'',
        'from'=>$from,
        'message'=>$sms_text,
        'to'=>json_encode($rcpt_nm),
        'op'=>'send'
    );

    $handler = curl_init($url);
    curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($handler, CURLOPT_POSTFIELDS, $param);
    curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
    $response2 = curl_exec($handler);

    $response2 = json_decode($response2);
    $res_code = $response2[0];
    $res_data = $response2[1];

    $pdo=connect_db();
    $query=$pdo->prepare("insert into send_sms (code, from_num, to_num, text, date, time, sender) VALUES ('$res_data','$from','$to','$sms_text','$date','$time','$sender')");
    $query->execute();

}
function sended_sms_records(){
    $pdo=connect_db();
    $query=$pdo->prepare("select * from send_sms order by id desc ");
    $query->execute();
    $res=$query->fetchAll(PDO::FETCH_OBJ);
    return $res;

}
function sms_status($code){
    $url = "https://ippanel.com/services.jspd";
    $param = array
    (
        'uname'=>'',
        'pass'=>'',
        'op'=>'checkmessage',
        'messageid'=>$code
    );

    $handler = curl_init($url);
    curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($handler, CURLOPT_POSTFIELDS, $param);
    curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
    $response2 = curl_exec($handler);
    $response2 = json_decode($response2);

    if(isset($response2->statusMessage)){
        switch ($response2->statusMessage){
            case 'Finish':
                return 'پایان یافته';
            case 'NoContactWithTheOperator':
                return 'عدم برقراری با اپراتور';
            case 'Interacting':
                return 'در حال ارتباط';
            case 'NoAuthentication':
                return 'عدم احراز هویت';
            case 'Active':
                return 'فعال';
            case 'NoSendSMS':
                return 'عدم ارسال پیامک';
            case 'Cancel':
                return 'انصراف';
        }

    }else {
        $res_code = $response2[0];
        $res_data = $response2[1];
        return $res_data;
    }


//statusMessage : Finish => پایان یافته, NoContactWithTheOperator => عدم برقراری با اپراتور, Interacting =>  در حال ارتباط,
//                NoAuthentication => عدم احراز هویت, Active => فعال, NoSendSMS => عدم ارسال پیامک, Cancel => انصراف

//validMessage: approve => تایید شده, cancel => رد شده, notconfirm => منتظر تایید

}

function sms_valid($code){
    $url = "https://ippanel.com/services.jspd";
    $param = array
    (
        'uname'=>'',
        'pass'=>'',
        'op'=>'checkmessage',
        'messageid'=>$code
    );

    $handler = curl_init($url);
    curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($handler, CURLOPT_POSTFIELDS, $param);
    curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
    $response2 = curl_exec($handler);
    $response2 = json_decode($response2);

    if(isset($response2->statusMessage)){
        switch ($response2->validMessage){
            case 'approve':
                return 'تایید شده';
            case 'cancel':
                return 'رد شده';
            case 'notconfirm':
                return 'منتظر تایید';
        }

    }else {
        $res_code = $response2[0];
        $res_data = $response2[1];
        return $res_data;
    }


//statusMessage : Finish => پایان یافته, NoContactWithTheOperator => عدم برقراری با اپراتور, Interacting =>  در حال ارتباط,
//                NoAuthentication => عدم احراز هویت, Active => فعال, NoSendSMS => عدم ارسال پیامک, Cancel => انصراف

//validMessage: approve => تایید شده, cancel => رد شده, notconfirm => منتظر تایید

}
function send_ticket($info,$file){
$title=$info['title'];
$type=$info['type'];
$level=$info['level'];
$text=$info['text'];
$date=jdate('y/m/d');
$sms=$info['sms'];
$sender=$_SESSION['login_user'];
$file_loc=upload_pics($file,'../img/ticket/');
$pdo=connect_db();
$query=$pdo->prepare("insert into ticket_tbl(title, type, level,sms_status, text, file_loc, date, sender) VALUES('$title','$type','$level','$sms','$text','$file_loc','$date','$sender') ");
$query->execute();

}

?>