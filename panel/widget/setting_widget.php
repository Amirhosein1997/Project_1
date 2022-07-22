<!DOCTYPE html>
<head>
    <title>تنظیمات پیکربندی ابزارک ها</title>
</head>
<?php
include_once '../functions/functions.php';
include_once '../functions/f-widget.php';
?>
<?php
if (isset($_POST['send'])){
    $titles=$_POST['title'];
    $sorts=$_POST['sort'];
    $svgs=$_POST['icon'];
    $status=$_POST['status'];
    insert_widget($titles,$sorts,$svgs,$status);
    header("location:dashboard.php?page=setting-widget");
}
?>
<div class="alert alert-success" role="alert">
    <h4 class="alert-heading">تنطیمات پیکربندی ابزارک</h4>
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
<br>
<div class="alert alert-primary" role="alert">
    <form>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">تعداد ویجت های فعال در سایت :</label>
            <input type="number" class="form-control" id="exampleInputEmail1" >
        </div>
        <button type="submit" class="btn btn-primary">ثبت</button>
    </form>
</div>
<hr>
<form method="post" enctype="multipart/form-data">
    <h5>ابزارک شماره 1</h5><br>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">عنوان ابزارک</label>
        <input name="title[0]" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">ترتیب نمایش</label>
        <input name="sort[0]" type="text" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">کد svg ابزارک</label>
        <textarea name="icon[0]"  class="form-control" id="exampleInputPassword1"></textarea>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">وضعیت ابزارک</label>
        <select name="status[0]" class="form-select">
            <option selected disabled></option>
            <option value="on">__فعال</option>
            <option value="off">__غیره فعال</option>
        </select>
    </div>
    <div id="main_widget">

    </div>
    <span class="btn btn-danger" onclick="add_widget()" >+ افزودن ابزارک </span>
    <br>
    <button name="send" type="submit" class="btn btn-primary">ثبت</button>
    <br>
    <a class="btn btn-primary" href="dashboard.php?page=setting-widget" role="button">بازگشت</a>
</form>
<br>
<hr>
<br>
<?php include_once 'widget/list_widget.php'?>

<script>
    function add_widget(){
        var count=document.getElementsByClassName('count-widget').length+1;
        var count_plus=count+1;
        var widget =
            '<div class=count-widget>'+
            '<h5>ابزارک شماره '+count_plus+'</h5><br>'+
            '<div class="mb-3">'+
                '<label for="exampleInputEmail1" class="form-label">عنوان ابزارک</label>'+
                '<input name="title['+count+']" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">'+
            '</div>'+
            '<div class="mb-3">'+
                '<label for="exampleInputPassword1" class="form-label">ترتیب نمایش</label>'+
                '<input name="sort['+count+']" type="text" class="form-control" id="exampleInputPassword1">'+
           ' </div>'+
            '<div class="mb-3">'+
               '<label for="exampleInputPassword1" class="form-label">کد svg ابزارک</label>'+
                '<input name="icon['+count+']" type="text" class="form-control" id="exampleInputPassword1">'+
            '</div>'+
            '<div class="mb-3">'+
                '<label for="exampleInputPassword1" class="form-label">وضعیت ابزارک</label>'+
                '<select class="form-select" name="status['+count+']">'+
                    '<option selected disabled></option>'+
                    '<option value="on">__فعال</option>'+
                    '<option value="off">__غیره فعال</option>'+
                '</select>'+
            '</div>'+
            '</div>';

        $('#main_widget').append(widget);
    }






</script>
