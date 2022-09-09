<?php
include_once "../functions/functions.php";
include_once "../functions/f-pay.php";

?>
<?php

if (isset($_POST['send'])){
    $info=$_POST['info'];
    $link=pay_the_price($info);
    header("location:{$link}");

}
?>



<div style="border: 1px solid;
  padding: 10px;
  box-shadow: 5px 5px 8px blue, 10px 10px 8px red, 15px 15px 8px green;
  margin: 20px;">
    <h5>بخش پرداخت</h5>
    <hr>
    <form method="post" enctype="multipart/form-data">
        <div class="row">
        <div class="mb-3 mt-3 col">
            <label  class="form-label">کد سفارش:</label>
            <input name="info[order_id]" type="number" class="form-control"  >
        </div>
        <div class="mb-3 mt-3 col">
            <label  class="form-label">مقدار پول:</label>
            <input name="info[money]" type="number" class="form-control"  >
        </div>
        <div class="mb-3 mt-3 col">
            <label  class="form-label">نام:</label>
            <input name="info[name]" type="text" class="form-control"  >
        </div>
        </div>
        <div class="row">
            <div class="mb-3 mt-3 col">
                <label  class="form-label">تلفن:</label>
                <input name="info[phone]" type="number" class="form-control"  >
            </div>
            <div class="mb-3 mt-3 col">
                <label  class="form-label">ایمیل:</label>
                <input name="info[email]" type="email" class="form-control"  >
            </div>
            <div class="mb-3 mt-3 col">
                <label  class="form-label">توضیحات:</label>
                <textarea  class="form-control" rows="5"  name="info[text]"></textarea>
            </div>
        </div>

        <button name="send" type="submit" class="btn btn-primary">پرداخت</button>
    </form>

</div>
