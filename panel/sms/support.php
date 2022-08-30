<?php
include_once '../functions/functions.php';
include_once '../functions/f-sms.php';
?>

<br>
<?php
if (isset($_POST['send_ticket'])){
$info=$_POST['info'];
$file=$_FILES['file'];
send_ticket($info,$file);
$result='ticket_sended';
header("location:dashboard.php?page=setting-sms&op={$result}");
}
?>


<div class="row"  style="border: 1px solid;padding: 10px;box-shadow: 5px 10px 18px red;border-radius: 15px;">
    <div class="col">
    <form method="post" enctype="multipart/form-data">
        <div class="mb-3 mt-3">
            <label for="in1" class="form-label">موضوع:</label>
            <input type="text" class="form-control" id="in1"  name="info[title]">
        </div>
        <div class="mb-3">
            <label for="sel1" class="form-label">نوع پشتیبانی:</label>
            <select class="form-select" id="sel1" name="info[type]">
                <option value="مالی">__مالی</option>
                <option value="وب سرویس">__وب سرویس</option>
                <option value="خطوط">__خطوط</option>
                <option value="گزارش مشکل">__گزارش مشکل</option>
            </select>
        </div>

        <div>
            <label>اهمیت:</label>
            <div>
                <label class="btn btn-dark">
                    کم <input type="radio" value="کم" name="info[level]" autocomplete="off">
                </label>

                <label class="btn btn-info">
                    متوسط <input type="radio" value="متوسط" name="info[level]" autocomplete="off">
                </label>

                <label class="btn btn-warning">
                    فوری <input type="radio" value="فوری" name="info[level]" autocomplete="off">
                </label>

                <label class="btn btn-danger ">
                    بحرانی <input type="radio" value="بحرانی" name="info[level]" autocomplete="off">
                </label>
            </div>
        </div>
        <label>اطلاع از طریق پیامک:</label>
        <div>
        <label class="btn btn-info">
            فعال<input type="radio" value="ارسال پیامک" name="info[sms]" autocomplete="off">
        </label>

        <label class="btn btn-info">
            غیر فعال <input type="radio" value="بدون ارسال پیامک" name="info[sms]" autocomplete="off">
        </label>
        </div>
        <div class="mb-3 mt-3">
            <label for="comment">توضیحات:</label>
            <textarea class="form-control" rows="3" id="comment" name="info[text]"></textarea>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">فایل ضمیمه:</label>
            <input name="file" class="form-control" type="file" id="formFile">
        </div>
        <hr>
        <button type="submit" name="send_ticket" class="btn btn-primary">ارسال تیکت</button>
    </form>
    </div>
    <div class="col"><img style="width: 100%;height: auto;" src="../img/AdobeStock_170263847_Support-scaled.jpg"></div>
</div>

