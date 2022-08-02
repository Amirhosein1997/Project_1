<!DOCTYPE html>
<head>
    <title>پیکربندی تک صفحه</title>
</head>
<?php
include_once '../functions/functions.php';
include_once '../functions/f-page.php';
$select_perm=select_user_permition($_SESSION['login_user']);
if (strpos($select_perm->permition,'single_page.php') !==false):
if (isset($_POST['send'])){
    $info=$_POST['info'];
    $btn_title=$_POST['btn_title'];
    $page=$_POST['page'];
    insert_single_page($info,$btn_title,$page);
    header("location:dashboard.php?page=single-page");

}

$single_page_records=single_page_callback();
$single_page_nums=count($single_page_records);
if($single_page_nums!==0){
    $single_page_reco=single_record();
    $btns=$single_page_reco->btn_title;
    $exploded_btn=explode(',',$btns);
    $page_links=$single_page_reco->page_link;
    $exploded_page=explode(',',$page_links);
}
?>
<div class="alert alert-success" role="alert">
    <h4 class="alert-heading">تنظیمات تک صفحه</h4>
    <p>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pin-angle-fill" viewBox="0 0 16 16">
            <path d="M9.828.722a.5.5 0 0 1 .354.146l4.95 4.95a.5.5 0 0 1 0 .707c-.48.48-1.072.588-1.503.588-.177 0-.335-.018-.46-.039l-3.134 3.134a5.927 5.927 0 0 1 .16 1.013c.046.702-.032 1.687-.72 2.375a.5.5 0 0 1-.707 0l-2.829-2.828-3.182 3.182c-.195.195-1.219.902-1.414.707-.195-.195.512-1.22.707-1.414l3.182-3.182-2.828-2.829a.5.5 0 0 1 0-.707c.688-.688 1.673-.767 2.375-.72a5.922 5.922 0 0 1 1.013.16l3.134-3.133a2.772 2.772 0 0 1-.04-.461c0-.43.108-1.022.589-1.503a.5.5 0 0 1 .353-.146z"/>
        </svg>برای افزودن ابزارک جدید به سایت به دو ورودی نیاز است .<br>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pin-angle-fill" viewBox="0 0 16 16">
            <path d="M9.828.722a.5.5 0 0 1 .354.146l4.95 4.95a.5.5 0 0 1 0 .707c-.48.48-1.072.588-1.503.588-.177 0-.335-.018-.46-.039l-3.134 3.134a5.927 5.927 0 0 1 .16 1.013c.046.702-.032 1.687-.72 2.375a.5.5 0 0 1-.707 0l-2.829-2.828-3.182 3.182c-.195.195-1.219.902-1.414.707-.195-.195.512-1.22.707-1.414l3.182-3.182-2.828-2.829a.5.5 0 0 1 0-.707c.688-.688 1.673-.767 2.375-.72a5.922 5.922 0 0 1 1.013.16l3.134-3.133a2.772 2.772 0 0 1-.04-.461c0-.43.108-1.022.589-1.503a.5.5 0 0 1 .353-.146z"/>
        </svg>در بخش اول شما محتوی لازم برای نمایش ابزارک را مشخص می کنید .<br>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pin-angle-fill" viewBox="0 0 16 16">
            <path d="M9.828.722a.5.5 0 0 1 .354.146l4.95 4.95a.5.5 0 0 1 0 .707c-.48.48-1.072.588-1.503.588-.177 0-.335-.018-.46-.039l-3.134 3.134a5.927 5.927 0 0 1 .16 1.013c.046.702-.032 1.687-.72 2.375a.5.5 0 0 1-.707 0l-2.829-2.828-3.182 3.182c-.195.195-1.219.902-1.414.707-.195-.195.512-1.22.707-1.414l3.182-3.182-2.828-2.829a.5.5 0 0 1 0-.707c.688-.688 1.673-.767 2.375-.72a5.922 5.922 0 0 1 1.013.16l3.134-3.133a2.772 2.772 0 0 1-.04-.461c0-.43.108-1.022.589-1.503a.5.5 0 0 1 .353-.146z"/>
        </svg>در بخش دوم کد svg تصویر مربوط به ابزارک مورد نظر را قرار دهید.<br>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pin-angle-fill" viewBox="0 0 16 16">
            <path d="M9.828.722a.5.5 0 0 1 .354.146l4.95 4.95a.5.5 0 0 1 0 .707c-.48.48-1.072.588-1.503.588-.177 0-.335-.018-.46-.039l-3.134 3.134a5.927 5.927 0 0 1 .16 1.013c.046.702-.032 1.687-.72 2.375a.5.5 0 0 1-.707 0l-2.829-2.828-3.182 3.182c-.195.195-1.219.902-1.414.707-.195-.195.512-1.22.707-1.414l3.182-3.182-2.828-2.829a.5.5 0 0 1 0-.707c.688-.688 1.673-.767 2.375-.72a5.922 5.922 0 0 1 1.013.16l3.134-3.133a2.772 2.772 0 0 1-.04-.461c0-.43.108-1.022.589-1.503a.5.5 0 0 1 .353-.146z"/>
        </svg>لطفا در هنگام قرار دادن کد svg ، ویژگی طول (Height) و عرض (Width) آن را حذف نمایید.<br>
    </p>
    <hr>
    <p class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pin-angle-fill" viewBox="0 0 16 16">
            <path d="M9.828.722a.5.5 0 0 1 .354.146l4.95 4.95a.5.5 0 0 1 0 .707c-.48.48-1.072.588-1.503.588-.177 0-.335-.018-.46-.039l-3.134 3.134a5.927 5.927 0 0 1 .16 1.013c.046.702-.032 1.687-.72 2.375a.5.5 0 0 1-.707 0l-2.829-2.828-3.182 3.182c-.195.195-1.219.902-1.414.707-.195-.195.512-1.22.707-1.414l3.182-3.182-2.828-2.829a.5.5 0 0 1 0-.707c.688-.688 1.673-.767 2.375-.72a5.922 5.922 0 0 1 1.013.16l3.134-3.133a2.772 2.772 0 0 1-.04-.461c0-.43.108-1.022.589-1.503a.5.5 0 0 1 .353-.146z"/>
        </svg> اگر نیاز به افزودن بیش از یک ابزارک دارید لطفا روی " + افزودن ابزارک " کلیک کنید.</p>
</div>
<hr>

<form method="post" enctype="multipart/form-data" style="background-color: #4d4460;padding: 30px;">
    <div class="mb-3">
        <label for="exampleInput1" class="form-label">عنوان تک صفحه</label>
        <input value="<?php if ($single_page_nums!==0){echo $single_page_reco->title;} ?>" name="info[title]" type="text" class="form-control" id="exampleInput1" >
    </div>
    <div class="mb-3">
        <label for="exampleInput2" class="form-label">محتوای قابل نمایش</label>
        <textarea name="info[description]" class="form-control" id="exampleInput2" rows="1" ><?php if ($single_page_nums!==0){ echo $single_page_reco->description;} ?></textarea>
    </div>
    <div class="mb-3">
        <label for="exampleInput3" class="form-label">کد امبد ویدیو</label>
        <textarea name="info[vid_link]" class="form-control" id="exampleInput3" rows="1"><?php if($single_page_nums!==0){ echo $single_page_reco->video_code;} ?></textarea>
    </div>
    <div class="row">
        <div class="col">
            <label for="exampleInput4" class="form-label">عنوان کلید اول</label>
            <input value="<?php if($single_page_nums!==0){echo $exploded_btn[0];} ?>" name="btn_title[btn1]" type="text" class="form-control" >
        </div>
        <div class="col">
            <label for="exampleInput5" class="form-label">لینک کلید اول</label>
            <select name="page[btn1]" class="form-select" aria-label="Default select example" id="exampleInput3">
                <option selected disabled>__صفحه را انتخاب کنید</option>
                <?php $template_links=links();
                foreach ($template_links as $link):?>
                    <option <?php if($single_page_nums!==0){ if ($link->link==$exploded_page[0]){echo 'selected';}} ?> value="<?php echo $link->link; ?>"><?php echo $link->name; ?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="col">
            <label for="exampleInput6" class="form-label">وضعیت کلید اول</label>
            <select class="form-select" aria-label="Default select example">
                <option selected disabled>انتخاب وضعیت</option>
                <option value="on">on</option>
                <option value="off">off</option>

            </select>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <label for="exampleInput7" class="form-label">عنوان کلید دوم</label>
            <input value="<?php if($single_page_nums!==0){ echo $exploded_btn[1];} ?>" name="btn_title[btn2]" type="text" class="form-control" >
        </div>
        <div class="col">
            <label for="exampleInput8" class="form-label">لینک کلید دوم</label>
            <select name="page[btn2]" class="form-select" aria-label="Default select example" id="exampleInput3">
                <option selected disabled>__صفحه را انتخاب کنید</option>
                <?php $template_links=links();
                foreach ($template_links as $link):?>
                    <option <?php if($single_page_nums!==0){ if ($link->link==$exploded_page[1]){echo 'selected';}} ?> value="<?php echo $link->link; ?>"><?php echo $link->name; ?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="col">
            <label for="exampleInput9" class="form-label">وضعیت کلید دوم</label>
            <select class="form-select" aria-label="Default select example">
                <option selected disabled>انتخاب وضعیت</option>
                <option value="on">on</option>
                <option value="off">off</option>
            </select>
        </div>
    </div>
    <div class="mb-3">
        <label for="exampleInput10" class="form-label">وضعیت صفحه</label>
        <select name="info[status]" class="form-select" aria-label="Default select example">
            <option selected disabled>انتخاب وضعیت</option>
            <option <?php if($single_page_nums!==0){ if ($single_page_reco->status=='on'){echo 'selected';}} ?> value="on">on</option>
            <option <?php if($single_page_nums!==0){ if ($single_page_reco->status=='off'){echo 'selected';}} ?> value="off">off</option>
        </select>
    </div>

    <button name="send" type="submit" class="btn btn-primary">ثبت</button>
</form>


<?php else:?>
    <div class="alert alert-warning" role="alert">
        NO_ACCESS!!!
    </div>
<?php endif;?>