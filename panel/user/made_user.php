<?php
include_once '../functions/f-user.php';
include_once '../functions/functions.php';
  $select_permition=select_user_permition($_SESSION['login_user']);
  if (strpos($select_permition->permition,'made_user.php') !==false):
?>

<?php
if(isset($_POST['submit'])){
    $info=$_POST['info'];
    $img=$_FILES['img'];
    insert_info_user($info,$img);
    last_activity('single_user_form',$_SESSION['login_user']);
    $result='ok_register_user';
    header("location:dashboard.php?page=setting-user&op={$result}");
}

?>

<!DOCTYPE html>
<head>
    <title>پیکربندی تکی کاربر جدید</title>
</head>
<div dir="rtl" style="background-color: #1a798c; padding:50px; ">
    <form  method="post" enctype="multipart/form-data">
        <h5 >اطلاعات شخصی</h5>
        <hr>
        <div class="row">
        <div class="col">
            <label  for="v1" class="form-label">نام و نام خانوادگی</label>
            <input id="v1" name="info[fullname]" type="text" class="form-control" placeholder="لطفا نام و نام خانوادگی را وارد نمایید"  required>
        </div>
        <div class="col">
            <label for="v2" class="form-label">کد ملی</label>
            <input id="v2"  name="info[Mcode]" type="number" class="form-control" placeholder="لطفا کد ملی را وارد نمایید"  required>
        </div>
        <div class="col">
            <label for="v3" class="form-label">نام پدر</label>
            <input id="v3" name="info[father_name]" type="text" class="form-control" placeholder="لطفا نام پدر را وارد نمایید"  >
        </div>
    </div>
        <div class="row">
            <div class="col">
                <label for="v4" class="form-label">تاریخ تولد</label>
                <input id="v4" name="info[birthday]" type="text" class="form-control" placeholder="لطفا تاریخ تولد را وارد نمایید"  >
            </div>
            <div class="col">
                <label for="v5" class="form-label">مدرک تحصیلی</label>
                <select id="v5" name="info[degree]" class="form-select"  >
                    <option selected disabled>__انتخاب کنید</option>
                    <option value="کاردانی">کاردانی</option>
                    <option value="کارشناسی">کارشناسی</option>
                    <option value="ارشد">ارشد</option>
                    <option value="دکترا">دکترا</option>
                </select>
            </div>
            <div class="col">
                <label for="v6" class="form-label">رشته تحصیلی</label>
                <input id="v6" name="info[field]" type="text" class="form-control" placeholder="لطفا مدرک تحصیلی را وارد نمایید"  >
            </div>
        </div>
        <br>
        <h5>اطلاعات تماس</h5>
        <hr>
        <div class="row">
            <div class="col">
                <label for="v7" class="form-label">تلفن تماس</label>
                <input id="v7" name="info[phone]" type="number" class="form-control" placeholder="لطفا تلفن تماس را وارد نمایید"  >
            </div>
            <div class="col">
                <label for="v8" class="form-label">استان</label>
                <select id="v8" name="info[state]" class="form-select" >
                    <option selected disabled>__انتخاب کنید</option>
                    <option value="خراسان">خراسان</option>
                    <option value="تهران">تهران</option>
                    <option value="تهران">شیراز</option>
                    <option value="مرکزی">مرکزی</option>
                </select>
            </div>
            <div class="col">
                <label for="v9" class="form-label">شهر</label>
                <input id="v9" name="info[city]" type="text" class="form-control" placeholder="لطفا شهر را وارد نمایید"  >
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label for="v10" class="form-label">ادرس ایمیل</label>
                <input id="v10" name="info[email]" type="email" class="form-control" placeholder="لطفا ایمیل را وارد نمایید"  required>
            </div>
            <div class="col">
                <label for="v11" class="form-label">لینکدین</label>
                <input id="v11" name="info[linkdin]" type="text" class="form-control" placeholder="لطفا لینکدین را وارد نمایید" >
            </div>
            <div class="col">
                <label for="v12" class="form-label">اینستاگرم</label>
                <input id="v12" name="info[instagram]" type="text" class="form-control" placeholder="لطفا اینستاگرم را وارد نمایید" >
            </div>
            <div class="col">
                <label for="v13" class="form-label">تلگرام</label>
                <input id="v13" name="info[telegram]" type="text" class="form-control" placeholder="لطفا نام تلگرام را وارد نمایید" >
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="v14" class="form-label">ادرس محل زندگی</label>
                <input id="v14" name="info[home_address]" type="text" class="form-control" placeholder="لطفا ادرس محل زندگی را وارد نمایید" >
            </div>

        </div>
        <div class="row">
            <div class="col">
                <label for="v15" class="form-label">ادرس محل کار</label>
                <input id="v15" name="info[work_address]" type="text" class="form-control" placeholder="لطفا ادرس محل کار را وارد نمایید" >
            </div>
        </div>
        <br>
            <h5>اطلاعات مهارتی</h5>
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <label for="v16" class="form-label">مهارت شاخص</label>
                    <select id="v16" name="info[skill]" class="form-select" >
                        <option selected disabled>__انتخاب کنید</option>
                        <option value="مهارت علمی">مهارت علمی</option>
                        <option value="مهارت ورزشی">مهارت ورزشی</option>
                        <option value="مهارت فنی">مهارت فنی</option>
                        <option value="مهارت هنری">مهارت هنری</option>
                    </select>
                </div>
                <div class="col">
                    <label for="v17" class="form-label">شرح مهارت</label>
                    <input id="v17" name="info[skill_desc]" type="text" class="form-control" placeholder="لطفاشرح مهارت را وارد نمایید" >
                </div>
            </div>
<br>
        <h5>تصویر پرسنلی و دسترسی ها</h5>
        <hr>
        <div class="row">
            <div class="col">
                <label for="v18" class="form-label">انتخاب تصویر پرسنلی</label>
                <input id="v18" name="img" type="file" class="form-control"  >
            </div>
            <div class="col">
                <label  class="form-label">مجوز دسترسی</label>
                <select  name="info[permition]" class="form-select" >
                    <option value="" selected disabled>__انتخاب کنید</option>
                <?php
                    $permitions=select_permition_name();
                foreach ($permitions as $access) :
                  ?>
                    <option value="<?php echo $access->id ?>"><?php echo $access->name ?></option>

                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col">
                <label for="v20" class="form-label">وضعیت فعالیت</label>
                <select id="v20" name="info[status]" class="form-select" >
                    <option selected disabled>__انتخاب کنید</option>
                    <option value="active">فعال</option>
                    <option value="inactive">غیر فعال</option>

                </select>
            </div>
        </div>
<br>
        <h5>ارسال پیامک</h5>
        <hr>

        <div class="form-check">
            <input value="yes" id="v21"  class="form-check-input" type="radio" >
            <label class="form-check-label" for="v21">
                ارسال پیامک
            </label>

            <input value="no" id="v22"  class="form-check-input" type="radio"  checked>
            <label class="form-check-label" for="v22">
                عدم ارسال پیامک
            </label>
        </div>
<hr>
        <button name="submit" type="submit" class="btn btn-primary">تایید و ارسال</button>




    </form>

</div>
        <?php  else :?>
      <div class="alert alert-warning" role="alert">
          NO_ACCESS!!!
      </div>
        <?php  endif;?>

