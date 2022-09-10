<?php
include_once '../functions/functions.php';
include_once '../functions/f-article.php';
?>

<?php
if (isset($_POST['create'])){
    $info=$_POST['info'];
    $link=word_generator($info);

}
?>

<div style="border: 1px solid;
  padding: 10px;
  box-shadow: 5px 5px 8px blue, 10px 10px 8px red, 15px 15px 8px green;
  margin: 20px;">
    <h5>ساختن فایل word</h5>
    <hr>
    <form method="post" enctype="multipart/form-data">
        <div class="mb-3 mt-3">
            <label  class="form-label">نام فایل:</label>
            <input type="text" class="form-control"  name="info[title]">
        </div>
        <div class="mb-3 mt-3">
        <label for="comment">متن مورد نظر:</label>
        <textarea class="form-control" rows="5" id="comment" name="info[text]"></textarea>
        </div>
        <button name="create" type="submit" class="btn btn-primary">ساختن</button>
    </form>
    <hr>
    <?php include_once 'word_files_list.php' ?>
</div>