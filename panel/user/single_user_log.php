<?php
include_once '../functions/functions.php';
include_once '../functions/f-user.php';
?>

<?php
$sess_id=$_GET['id'];
$sess_record=sess_id_call($sess_id);
$user_record=sess_to_usertbl($sess_record->title);
?>


<div style="border: 1px solid;padding: 10px;box-shadow: 5px 5px 8px blue, 10px 10px 8px red, 15px 15px 8px green;margin: 20px;">
    <h5>گزارش تکی کاربر</h5>
    <hr>
<form>
    <div class="row">
    <div class="mb-3 mt-3 col-md-4">
        <label  class="form-label">نام کاربر:</label>
        <input value="<?php echo $user_record->full_name; ?>" type="text" class="form-control" readonly>
    </div>
    <div class="mb-3 mt-3 col-md-4">
        <label  class="form-label">تاریخ ثبت کاربر:</label>
        <input value="<?php echo $user_record->register_date; ?>" type="text" class="form-control" readonly>
    </div>
    <div class="mb-3 mt-3 col-md-4">
        <label  class="form-label">وضعیت در سیستم:</label>
        <input value="<?php echo $user_record->status; ?>" type="text" class="form-control" readonly>
    </div>
        <div class="mb-3 mt-3 col-md-4">
            <label  class="form-label">اخرین ورود:</label>
            <input value="<?php echo $sess_record->login_date; ?>" type="text" class="form-control" readonly>
        </div>
        <div class="mb-3 mt-3 col-md-4">
            <label  class="form-label">اخرین خروج:</label>
            <input value="<?php echo $sess_record->logout_date; ?>" type="text" class="form-control" readonly>
        </div>
        <div class="mb-3 mt-3 col-md-4">
            <label  class="form-label">اخرین عملیات:</label>
            <input value="<?php echo $sess_record->last_activity; ?>" type="text" class="form-control" readonly>
        </div>
    </div>
    <a href="dashboard.php?page=user-log" class="btn btn-success">بازگشت</a>
</form>
</div>