<?php
include_once '../functions/functions.php';
include_once '../functions/f-category.php' ;
$select_permitions=select_user_permition($_SESSION['login_user']);
if (strpos($select_permitions->permition,'edit_category.php') !==false):
    if (isset($_GET['id'])){
        $id=$_GET['id'];
        $current_cat=call_back_cat($id);
    }
    if (isset($_POST['update'])){
        $info=$_POST['info'];
        update_category($id,$info);
        header("location:dashboard.php?page=list-category");

    }

?>

<!DOCTYPE html>
<head>
    <title>ویرایش دسته بندی</title>
</head>

    <h5>ویرایش دسته </h5>
    <br><hr>
    <form method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">عنوان</label>
            <input value="<?php echo $current_cat->title ?>" type="text" name="info[title]" class="form-control" id="exampleInputEmail1" >
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">ترتیب نمایش</label>
            <input value="<?php echo $current_cat->sort ?>" type="text" name="info[sort]" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">سرگروه یا زیرگروه</label>
            <select class="form-select" aria-label="Default select example" name="info[parent]">
                <option <?php if ($current_cat->parent==0){echo 'selected';} ?> selected value="0">سرگروه</option>
                <?php
                $res=list_category();
                foreach ($res as $val):?>

                    <option <?php if ($current_cat->parent==$val->id){echo 'selected';} ?> value="<?php echo $val->id; ?>" ><?php echo $val->title; ?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="form-check form-switch">
            <label class="form-check-label" for="flexSwitchCheckDefault">فعال یا غیرفعال</label>
            <input <?php if ($current_cat->status=='on'){echo 'checked';} ?>  name="info[status]" class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" >
        </div>
        <br>
        <button type="submit" name="update" class="btn btn-primary">ویرایش</button>

        <a class="btn btn-primary" href="dashboard.php?page=list-category" role="button">بازگشت</a>
    </form>




<?php else:?>
<div class="alert alert-primary" role="alert">
    SORRY NO ACCESS
</div>
<?php endif;?>