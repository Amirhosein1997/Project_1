<?php
$username = "";
$password = '';
$from = "+98100009";
$pattern_code = "139";
$to = array("9369400004");
$input_data = array("tracking-code" => "1054 4-41", "name" => "پنل");
$url = "https://ippanel.com/patterns/pattern?username=" . $username . "&password=" . urlencode($password) . "&from=$from&to=" . json_encode($to) . "&input_data=" . urlencode(json_encode($input_data)) . "&pattern_code=$pattern_code";
$handler = curl_init($url);
curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($handler, CURLOPT_POSTFIELDS, $input_data);
curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($handler);
echo $response;
?>