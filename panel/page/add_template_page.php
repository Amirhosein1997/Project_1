<?php
include_once "../functions/functions.php";
include_once "../functions/f-page.php";
?>

<?php
if (isset($_POST['create'])){
    $info=$_POST['info'];
    create_template($info);
    header("location:dashboard.php?page=setting-page");
}

?>


<div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
    <div class="accordion-body">
        <div style="border: 1px solid;padding: 10px;box-shadow: 5px 5px blue, 10px 10px red, 15px 15px green;margin: 20px;">
            <form method="post" enctype="multipart/form-data">
                <div class="mb-3 mt-3">
                    <label for="input1" class="form-label">نام فایل:</label>
                    <input name="info[title]" type="text" class="form-control" id="input1" >
                </div>
                <div class="mb-3 mt-3">
                <label for="select">وضعیت فایل:</label>
                <select name="info[status]" id="select" class="form-select">
                    <option selected disabled>__انتخاب</option>
                    <option value="read">__فایل در حالت خواندنی</option>
                    <option value="write">__فایل در حالت نوشتنی</option>
                </select>
                </div>
                <div class="mb-3 mt-3">
                <label for="code">کد های مورد نظر:</label>
                <textarea class="form-control" rows="5" id="code" name="info[code]"></textarea>
                </div>
                <button name="create" type="submit" class="btn btn-primary">ثبت فایل</button>
            </form>



        </div>
    </div>
</div>
