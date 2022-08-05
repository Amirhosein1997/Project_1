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
?>
<br>
<div class="alert alert-warning">
    از بین 3 گروه متون پیش فرض زیر فقط یکی را انتخاب کنید.
</div>
<hr>
<br>
<form method="post" enctype="multipart/form-data">
    <div class="row">
    <div class="col">
        <label for="sel1" class="form-label">متن های پیش فرض مشتریان:</label>
        <select class="form-select" id="sel1" name="info[preset_text]">
            <option selected>__مشتریان</option>
            <?php foreach ($preset_sms_records as $val):
               if ($val->cat=='مشتریان'):  ?>
            <option value="<?php echo $val->text; ?>"><?php  echo $val->text; ?></option>
            <?php endif;?>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="col">
        <label for="sel2" class="form-label">متن های پیش فرض همکاران:</label>
        <select class="form-select" id="sel2" name="info[preset_text]">
            <option selected>__همکاران</option>
           <?php foreach ($preset_sms_records as $val):
           if ($val->cat=='همکاران'):?>
            <option value="<?php echo $val->text; ?>"><?php echo $val->text; ?></option>
             <?php endif;?>
             <?php endforeach;?>
        </select>
    </div>
    <div class="col">
        <label for="sel3" class="form-label">متن های پیش فرض مدیران:</label>
        <select class="form-select" id="sel3" name="info[preset_text]">
            <option selected>__مدیران</option>
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
        <input type="text" class="form-control" id="in1" >
    </div>
    <div class="mb-3 mt-3">
        <label for="in2" class="form-label">شماره همراه مبدا:</label>
        <input type="text" class="form-control" id="in2" >
    </div>
    <div class="mb-3 mt-3">
        <label for="comment">متن مورد نظر:</label>
        <textarea class="form-control" rows="3" id="comment" ></textarea>
    </div>

    <button type="submit" class="btn btn-primary">ارسال</button>
</form>
