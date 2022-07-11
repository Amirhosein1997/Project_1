<?php include_once '../functions/f-user.php';
$update=false;
if (isset($_GET['id'])){
    $id=$_GET['id'];
    $res=select_user_info($id);
    $update=true;
}
?>



    <div style="background-color: #1b1e21;padding:20px;text-align: center" >
    <img style="width: 30%;"  src="<?php if ($update){echo $res->image;}; ?>">
    </div>
    <div style="background-color: #5a6268 ;padding: 30px;">
        <h5>ویرایش کاربران</h5>
    <hr>
        <div class="row">
        <div class="col" >
            <label>کد ملی</label>
            <input class="form-control" type="number" name="info[Mcode]" value="<?php echo $res->National_code; ?>" <?php if ($res->National_code!==""){echo 'readonly';} ?>>
        </div>
        <div class="col"><label>نام و نام خانوادگی</label>
            <input class="form-control" type="text" name="info[fullname]" value="<?php echo $res->full_name; ?>" <?php if ($res->full_name!==""){echo 'readonly';} ?>>
        </div>
        <div class="col"><label>نام پدر</label>
            <input class="form-control" type="text" name="info[father_name]" value="<?php echo $res->father_name; ?>" <?php if ($res->father_name!==""){echo 'readonly';} ?>>
        </div>
        </div>
        <div class="row">
        <div class="col"><label>تاریخ تولد</label>
            <input class="form-control" type="text" name="info[birthday]" value="<?php echo $res->birthday; ?>" <?php if ($res->birthday!==""){echo 'readonly';} ?>>
        </div>
        <div class="col"><label>تاریخ پیکربندی</label>
            <input class="form-control" type="text"  value="<?php echo $res->register_date; ?>" <?php if ($res->register_date!==""){echo 'readonly';} ?>>
        </div>
        <div class="col"><label>مجوز دسترسی</label>
            <input class="form-control" type="text"  value="<?php  $pr=show_permition_name($res->permition);echo $pr->name; ?>" <?php if ($res->permition!==""){echo 'readonly';} ?>>
        </div>
        </div>

    </div>

<br>
<?php include_once 'edit_info_user.php';?>