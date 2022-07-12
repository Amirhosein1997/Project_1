<?php include_once '../functions/functions.php';
include_once '../functions/f-article.php';?>
<!DOCTYPE html>
<head>
    <title>پاسخ به نظرات</title>
    <script src="https://cdn.tiny.cloud/1/yp32oxam6dc9luldn9u29mvhyo76y09lc3yslstrt7e7xj08/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="../js/tinymce_js.js"></script>
    <link rel="stylesheet" href="../css/tinymce_css.css">
</head>
<h5>مدیریت نظر کاربر</h5>
<hr>
<?php
$id_comment=$_GET['id'];
$comment_record=callback_comment($id_comment);
$reply_author=$_SESSION['login_user'];
$id_article=$comment_record->article_id;
if (isset($_POST['both_publish'])){
    $reply_text=$_POST['reply_text'];
    $switcher='pub_pub';
    publisher($switcher,$id_comment,$id_article,$reply_text,$reply_author);
    header("location:dashboard.php?page=list-comment");
}
if (isset($_POST['both_save'])){
$reply_text=$_POST['reply_text'];
    $switcher='save_save';
    publisher($switcher,$id_comment,$id_article,$reply_text,$reply_author);
    header("location:dashboard.php?page=list-comment");
}
if (isset($_POST['pub_save'])){
$reply_text=$_POST['reply_text'];
    $switcher='pub_save';
    publisher($switcher,$id_comment,$id_article,$reply_text,$reply_author);
    header("location:dashboard.php?page=list-comment");
}







?>
<form method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-5">
            <textarea class="form-control" name="reply_text" id="open-source-plugins"></textarea>

        </div>
        <div class="col-md-4">
            <textarea class="form-control" readonly style="height:600px;"><?php echo $comment_record->text; ?></textarea>

        </div>
        <div class="col-md-3">
            <div class="mb-3">
                <label  class="form-label">زمان ثبت</label>
                <input value="<?php echo $comment_record->date; ?>" readonly type="text" class="form-control"  >
            </div>
            <div class="mb-3">
                <label  class="form-label">کاربر نویسنده نظر</label>
                <input value="<?php echo $comment_record->author; ?>" readonly type="text" class="form-control" >
            </div>
            <div class="mb-3">
                <label  class="form-label">کاربر پاسخ دهنده نظر</label>
                <input value="<?php echo $_SESSION['login_user'] ?>" readonly type="text" class="form-control" >
            </div>

            <button name="both_publish" type="submit" class="btn btn-primary">انتشار نظر و پاسخ</button><br>
            <button name="both_save" type="submit" class="btn btn-primary">ذخیره نظر و پاسخ</button><br>
            <button name="pub_save" type="submit" class="btn btn-primary">انتشار نظر و ذخیره پاسخ</button><br>
            <a class="btn btn-primary" href="dashboard.php?page=list-comment" role="button">بازگشت</a><br>
        </div>
    </div>


</form>