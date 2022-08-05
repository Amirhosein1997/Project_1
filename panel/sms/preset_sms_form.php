<?php
include_once '../functions/functions.php';
include_once '../functions/f-sms.php';
?>

<head>
    <title>
        فرم پیامک های پیش فرض
    </title>
</head>
<?php
if (isset($_POST['send'])){
    $info=$_POST['info'];
    insert_preset_sms($info);
    $result='preset_sms_inserted';
    header("location:dashboard.php?page=setting-sms&op={$result}");
}
?>

    <form method="post" enctype="multipart/form-data">
        <div class="mb-3 mt-3">
            <label for="comment">متن پیامک پیش فرض:</label>
            <textarea required class="form-control" rows="4" id="comment" name="info[text]"></textarea>
        </div>
        <div class="mb-3">
            <label for="sel1" class="form-label">گروه پیامکی:</label>
            <select required class="form-select" id="sel1" name="info[cat]">
                <option value="مشتریان">__مشتریان</option>
                <option value="همکاران">__همکاران</option>
                <option value="مدیران">__مدیران</option>

            </select>
        </div>
        <div class="mb-3">
            <label for="sel2" class="form-label">وضعیت:</label>
            <select required class="form-select" id="sel2" name="info[status]">
                <option selected>وضعیت مورد نطر را انتخاب کنید</option>
                <option value="on">فعال</option>
                <option value="off">غیره فعال</option>

            </select>
        </div>
        <button name="send" type="submit" class="btn btn-primary">ثبت</button>
    </form>
