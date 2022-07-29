<!DOCTYPE html>
<head>
    <title>ویرایش صفحات ایجاد شده</title>
</head>
<?php
include_once '../functions/functions.php';
include_once '../functions/f-page.php';
$grp_records=on_grp_page_callback();
$id=$_GET['id'];
$page_reco=page_record($id);
if (isset($_POST['update_page'])){
    $info=$_POST['info'];
    update_page($id,$info);
    header("location:dashboard.php?page=setting-page");
}
?>

<form style="background-color: #1c7430;padding: 30px;" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="exampleInput1" class="form-label">عنوان صفحه</label>
        <input value="<?php echo $page_reco->title; ?>" name="info[title]" type="text" class="form-control" id="exampleInput1" >
    </div>
    <div class="mb-3">
        <label for="exampleInput2" class="form-label">گروه صفحه</label>
        <select name="info[parent]" class="form-select" aria-label="Default select example" id="exampleInput3">
            <option selected disabled>__ گروه را انتخاب کنید</option>
            <?php foreach ($grp_records as $record): ?>
                <option <?php if ($record->id==$page_reco->parent){echo 'selected';} ?> value="<?php echo $record->id;?>">__<?php echo $record->title; ?></option>
            <?php endforeach;?>
        </select>
    </div>
    <div class="mb-3">
        <label for="exampleInput3" class="form-label">لینک صفحه</label>
        <select name="info[link]" class="form-select" aria-label="Default select example" id="exampleInput3">
            <option selected disabled>__وضعیت گروه را انتخاب کنید</option>
            <?php $template_links=links();
            foreach ($template_links as $link):?>
                <option <?php if ($link->link==$page_reco->page_link){echo 'selected';} ?> value="<?php echo $link->link; ?>"><?php echo $link->name; ?></option>
            <?php endforeach;?>
        </select>
    </div>
    <div class="mb-3">
        <label for="exampleInput3" class="form-label">وضعیت صفحه</label>
        <select name="info[status]" class="form-select" aria-label="Default select example" id="exampleInput3">
            <option selected disabled>__وضعیت گروه را انتخاب کنید</option>
            <option <?php if ($page_reco->status=='on'){echo 'selected';} ?> value="on">__on</option>
            <option <?php if ($page_reco->status=='off'){echo 'selected';} ?> value="off">__off</option>
        </select>
    </div>

    <button name="update_page" type="submit" class="btn btn-primary">ثبت</button>
</form>
