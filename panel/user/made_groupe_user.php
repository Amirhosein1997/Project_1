<?php include_once '../functions/functions.php';
$select_permition=select_user_permition($_SESSION['login_user']);
if (strpos($select_permition->permition,'made_groupe_user.php') !==false):
?>
<!DOCTYPE html>
<head>
    <title>پیکربندی گروهی کاربران</title>
</head>

<?php
if (isset($_POST['send'])){
    if (isset($_FILES['excel']['name'])){
     $items=$_POST['item'];
     $xlsxfile=$_FILES['excel'];
     $location='upload/group_register_excel/';
     $pdo=connect_db();
     include_once 'user/xlsx.php';
if($pdo){
    $excel=simpleXLSX::parse($_FILES['excel']['tmp_name']);
    $excel->rows();
    $i=0;
    foreach ($excel->rows() as $index=>$row){
        $q="";
        foreach ($row as $key=>$cell){
            if ($i==0){
                $q.="'".$cell."'varchar(50),";
            }else{
                $q.="'".$cell."',";
            }
        }
        if ($i !==0){
            $query=$pdo->prepare("insert into users_tbl(user_name, password, full_name, National_code, father_name, birthday, degree, field, phone, state, city, email, linkdin, instagram, telegram, home_address, work_address, skills, skills_desc, image, permition, author, register_date, status) values(".rtrim($q,",").");");
            $query->execute();
        }
        $i++;
    }
}
     insert_info_file($items,$xlsxfile,$location);
     update_info_bulk_user();
    $result='ok_register_bulk_users';
    header("location:dashboard.php?page=setting-user&op={$result}");
    }
}

?>


<div class="alert alert-success" role="alert">
    <h4 class="alert-heading">تنطیمات کاربران</h4>
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
    <hr>
    <p class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pin-angle-fill" viewBox="0 0 16 16">
            <path d="M9.828.722a.5.5 0 0 1 .354.146l4.95 4.95a.5.5 0 0 1 0 .707c-.48.48-1.072.588-1.503.588-.177 0-.335-.018-.46-.039l-3.134 3.134a5.927 5.927 0 0 1 .16 1.013c.046.702-.032 1.687-.72 2.375a.5.5 0 0 1-.707 0l-2.829-2.828-3.182 3.182c-.195.195-1.219.902-1.414.707-.195-.195.512-1.22.707-1.414l3.182-3.182-2.828-2.829a.5.5 0 0 1 0-.707c.688-.688 1.673-.767 2.375-.72a5.922 5.922 0 0 1 1.013.16l3.134-3.133a2.772 2.772 0 0 1-.04-.461c0-.43.108-1.022.589-1.503a.5.5 0 0 1 .353-.146z"/>
        </svg> برای دریافت قالب فایل پیکربندی گروهی کاربران <a href="templates/excel_templates/group_register_excel.xlsx">اینجا</a> کلیک کنید.</p>

</div>

<div dir="rtl" style="background-color: #1a798c; padding:33px; ">
<form method="post" enctype="multipart/form-data" action="#" >
    <h5>ارسال فایل به سرور سیستم</h5>
    <hr>
<div class="row">
    <div class="col">
        <label class="form-label" for="v23">عنوان فایل</label>
        <input id="v23" name="item[title]" type="text" class="form-control" placeholder="لطفا عنوان فایل ارسالی را وارد کنید" >
    </div>
    <div class="col">
        <label class="form-label" for="v24">توضیحات فایل </label>
        <input id="v24" name="item[desc]" type="text" class="form-control" placeholder="توضیحات فایل ارسالی" >
    </div>
    <div class="col">
        <label class="form-label" for="v25">ارسال فایل پیکربندی</label>
        <input id="v25" name="excel" type="file" class="form-control" >
    </div>
</div>
    <div class="row">
        <div class="col mt-4">
            <button style="float: left;" type="submit" name="send" class="btn btn-primary">ایجاد کاربر</button>
        </div>
    </div>
</form>
</div>
<?php else:?>
    <div class="alert alert-warning" role="alert">
        NO_ACCESS!!!
    </div>
<?php endif;?>