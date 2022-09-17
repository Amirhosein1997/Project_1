<?php
include_once '../functions/functions.php';
include_once '../functions/f-email.php';
if (isset($_POST['send'])){
    $info=$_POST['info'];
    $file=$_FILES['file'];
    send_email($info,$file);
    header("location:dashboard.php?page=email-setting");
}





?>
<div style="border: 1px solid;
  padding: 10px;
  box-shadow: 5px 5px blue, 10px 10px red, 15px 15px green;
  margin: 20px;">
    <h5>ارسال ایمیل</h5>
    <hr>
    <form method="post" enctype="multipart/form-data">
        <div class="mb-3 mt-3">
            <label for="email" class="form-label">ایمیل مورد نظر:</label>
            <input type="email" class="form-control" id="email"  name="info[email]">
        </div>
        <div class="mb-3">
            <label for="subject" class="form-label">عنوان متن:</label>
            <input type="text" class="form-control" id="subject"  name="info[subject]">
        </div>
        <div class="mb-3">
            <label for="comment">متن:</label>
            <textarea class="form-control" rows="5" id="comment" name="info[text]"></textarea>
        </div>
        <div class="mb-3">
            <label for="file" class="form-label">فایل ضمیمه:</label>
            <input type="file" class="form-control" id="file"  name="file">
        </div>

        <button name="send" type="submit" class="btn btn-primary">ارسال</button>
    </form>
</div>
