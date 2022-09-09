<?php
include_once 'connect.php';
include_once 'functions.php';
include_once 'jdf.php';

?>

<?php
function pay_the_price($info){
    $order_id=$info['order_id'];
    $amount=$info['money'];
    $name=$info['name'];
    $phone=$info['phone'];
    $mail=$info['email'];
    $desc=$info['text'];


    $params = array(
        'order_id' => $order_id,
        'amount' => $amount,
        'name' => $name,
        'phone' => $phone,
        'mail' => $mail,
        'desc' => $desc,
        'callback' => 'http://localhost',
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.idpay.ir/v1.1/payment');
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'X-API-KEY: 6a7f99eb-7c20-4412-a972-6dfb7cd253a4',
        'X-SANDBOX: 1'
    ));

    $result = curl_exec($ch);
    curl_close($ch);

    $data=json_decode($result);
    $link=$data->link;
    $id=$data->id;
    $pdo=connect_db();
    $query=$pdo->prepare("insert into payment_tbl (payment_code, page_link) VALUES ('$id','$link')");
    $query->execute();
    if ($link){
        return $link;
    }else{
        return $data->error_message;
    }



}



?>
