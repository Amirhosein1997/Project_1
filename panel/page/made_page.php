<!DOCTYPE html>
<head>
    <title>مدیریت صفحات ایجاد شده</title>
</head>
<?php
include_once '../functions/functions.php';
include_once '../functions/f-page.php';
?>
<?php
$on_grp_records=on_grp_page_callback();

if (isset($_POST['send_page'])){
    $info=$_POST['info'];
    insert_page($info);
    header("location:dashboard.php?page=setting-page");
}
?>

<form style="background-color: #1c7430;padding: 30px;" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="exampleInput1" class="form-label">عنوان صفحه</label>
        <input name="info[title]" type="text" class="form-control" id="exampleInput1" >
    </div>
    <div class="mb-3">
        <label for="exampleInput2" class="form-label">گروه صفحه</label>
        <select name="info[parent]" class="form-select" aria-label="Default select example" id="exampleInput3">
            <option selected disabled>__ گروه را انتخاب کنید</option>
           <?php foreach ($on_grp_records as $record): ?>
            <option value="<?php echo $record->id;?>"><?php echo $record->title; ?></option>
            <?php endforeach;?>
        </select>
    </div>
    <div class="mb-3">
        <label for="exampleInput3" class="form-label">لینک صفحه</label>
        <select name="info[link]" class="form-select" aria-label="Default select example" id="exampleInput3">
            <option selected disabled>__صفحه را انتخاب کنید</option>
            <?php $template_links=links();
            foreach ($template_links as $link):?>
            <option value="<?php echo $link->link; ?>"><?php echo $link->name; ?></option>
            <?php endforeach;?>
        </select>
    </div>
    <div class="mb-3">
        <label for="exampleInput4" class="form-label">وضعیت صفحه</label>
        <select name="info[status]" class="form-select" aria-label="Default select example" id="exampleInput4">
            <option selected disabled>__وضعیت گروه را انتخاب کنید</option>
            <option value="on">__on</option>
            <option value="off">__off</option>
        </select>
    </div>

    <button name="send_page" type="submit" class="btn btn-primary">ثبت</button>
</form>
