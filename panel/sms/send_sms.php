<?php
include_once '../functions/functions.php';
include_once '../functions/f-sms.php';
?>
<head>
    <title>
        ارسال پیامک
    </title>
</head>
<?php
$preset_sms_records=preset_sms_callback();
if (isset($_POST['send_sms'])){
    $info=$_POST['info'];
    send_sms($info);
    $result='sms_sended';
    header("location:dashboard.php?page=setting-sms&op={$result}");
}
?>
<br>
<div class="alert alert-warning">
    از بین 3 گروه متون پیش فرض زیر فقط یکی را انتخاب کنید.
</div>
<hr>
<br>
<div style="border: 1px solid;padding: 10px;box-shadow: 5px 10px 8px 10px #888888;" class="rounded">
<form method="post" enctype="multipart/form-data">
    <div class="row">
    <div class="col">
        <label for="sel1" class="form-label">متن های پیش فرض مشتریان:</label>
        <select  class="form-select" id="sel1" name="info[preset_text]">
            <option selected disabled>__مشتریان</option>
            <?php foreach ($preset_sms_records as $val):
               if ($val->cat=='مشتریان'):  ?>
            <option value="<?php echo $val->text; ?>"><?php  echo $val->text; ?></option>
            <?php endif;?>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="col">
        <label for="sel2" class="form-label">متن های پیش فرض همکاران:</label>
        <select  class="form-select" id="sel2" name="info[preset_text]">
            <option selected disabled>__همکاران</option>
           <?php foreach ($preset_sms_records as $val):
           if ($val->cat=='همکاران'):?>
            <option value="<?php echo $val->text; ?>"><?php echo $val->text; ?></option>
             <?php endif;?>
             <?php endforeach;?>
        </select>
    </div>
    <div class="col">
        <label for="sel3" class="form-label">متن های پیش فرض مدیران:</label>
        <select  class="form-select" id="sel3" name="info[preset_text]">
            <option selected disabled>__مدیران</option>
            <?php foreach ($preset_sms_records as $val):
            if ($val->cat=='مدیران'): ?>
            <option value="<?php echo $val->text; ?>"><?php echo $val->text; ?></option>
            <?php endif;?>
            <?php endforeach;?>
        </select>
    </div>
    </div>
    <hr>
    <div class="mb-3 mt-3">
        <label for="in1" class="form-label"> شماره همراه مقصد:</label>
        <input name="info[to]" value="<?php if (isset($_GET['phone'])){echo $_GET['phone'];} ?>" type="text" class="form-control" id="in1" <?php if (isset($_GET['phone'])){echo 'readonly';} ?> >
    </div>
    <div class="mb-3 mt-3">
        <label for="in2" class="form-label">شماره همراه مبدا:</label>
        <select  class="form-select" id="in2" name="info[from]">
            <option>__انتخاب کنید</option>
           <?php $service_numbers=serv_numbers();
           foreach ($service_numbers as $number):
               $exploded_record=explode(',',$number);
                $pure_number=substr($exploded_record[0],11,-1);
           ?>
            <option value="<?php echo $pure_number; ?>"><?php echo $pure_number; ?></option>
            <?php endforeach;?>
        </select>

    </div>
    <div class="mb-3 mt-3">
        <label for="comment">متن مورد نظر:</label>
        <textarea name="info[text]" class="form-control" rows="3" id="comment" ></textarea>
    </div>

    <button name="send_sms" type="submit" class="btn btn-primary">ارسال</button>
</form>
</div>