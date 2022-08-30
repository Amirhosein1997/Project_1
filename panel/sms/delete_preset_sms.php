<?php
include_once '../functions/functions.php';
include_once '../functions/f-sms.php';
?>


<?php
$id=$_GET['id'];
delete_preset_sms($id);
$result='preset_sms_deleted';
header("location:dashboard.php?page=setting-sms&op={$result}");
?>
