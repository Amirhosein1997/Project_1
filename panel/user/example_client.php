<?php include_once '../functions/f-user.php';
$result_search="";
$result_search_permition="";
$count_search=0;

if (isset($_POST['search_permition'])){
    $code_permition=$_POST['permition_id'];
    $info_item=search_with_permition($code_permition);
    if (count($info_item)){
        $result_search_permition='yes';
        $count_result_search_permition=count($info_item);
    }else{
        $result_search_permition='no';
    }
}
if (isset($_POST['search'])){
    $info=$_POST['inspect'];
    $info_id=select_search_info($info);
    if (count($info_id)){
        $result_search='yes';
        $count_search=count($info_id);
    }else{
        $result_search='no';
    }

}




?>
<!DOCTYPE html>
<head>
    <title>مشاهده لیست کاربران</title>
</head>
<?php $users=select_bulk_user();
if (count($users)==0):
?>
<div class="alert alert-primary" role="alert">
    NO USERS!
</div>
<?php endif;?>
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
    <?php include_once 'search_user_permition.php'?>
<br>
    <?php include_once 'search_user_info.php'?>
</div>
<hr>
<br>
<?php if ($result_search=='yes'): ?>
    <div class="alert alert-primary" role="alert">
        نتایج: <?php echo $count_search ?>
        <a href="dashboard.php?page=list-users&count_search=0">بازگشت</a>
    </div>
<?php endif;?>
<?php if ($result_search_permition=='yes'): ?>
    <div class="alert alert-primary" role="alert">
        نتایج:<?php echo $count_result_search_permition ?>
        <a href="dashboard.php?page=list-users&count_search=0">بازگشت</a>
    </div>
<?php endif;?>
   <div class="row">
    <?php
    if ($result_search=="yes"):
    foreach ($info_id as $val):
    ?>
    <div class="col-3">
        <div class="card" style="width:250px;height:400px;">
           <a  href="dashboard.php?page=edit-info-user&id=<?php echo $val->id; ?>">
            <div style="background-color: #9e9ec2;text-align: center;" class="card-body">
                <img style="width:200px;height:100px;" src="<?php echo $val->image ?>" class="card-img-top" alt="image">
                <hr>
                <h5 class="card-title"><?php echo $val->full_name ?></h5>
                <div class="card-text">
                    <div>
                    <?php $permition_name=show_permition_name($val->permition);
                    echo $permition_name->name;
                    ?>
                </div>
                    <div>
                        <?php echo $val->birthday; ?><br>
                        <?php echo $val->skills; ?><br>
                        <?php echo $val->email; ?><br>
                        <?php echo $val->status; ?><br>

                    </div>
                </div>
           </a>
            </div>
        </div>
        </div>
        <?php endforeach;?>
        <?php endif;?>

    </div>
<div class="row">
    <?php
    if ($result_search_permition=="yes"):
    foreach ($info_item as $vers=>$item):
    ?>
    <div class="col-3">
        <div class="card" style="width:250px;height:400px;">
            <a  href="dashboard.php?page=edit-info-user&id=<?php echo $item->id; ?>">
                <div style="background-color: #9e9ec2;text-align: center;" class="card-body">
                    <img style="width:200px;height:100px;" src="<?php echo $item->image ?>" class="card-img-top" alt="image">
                    <hr>
                    <h5 class="card-title"><?php echo $item->full_name ?></h5>
                    <div class="card-text">
                        <div>
                            <?php $permition_name=show_permition_name($item->permition);
                            echo $permition_name->name;
                            ?>
                        </div>
                        <div>
                            <?php echo $item->birthday;?> <br>
                            <?php echo $item->skills; ?><br>
                            <?php echo $item->email; ?><br>
                            <?php echo $item->status; ?><br>

                        </div>
                    </div>
            </a>
        </div>
    </div>
</div>
<?php endforeach;?>
<?php endif;?>

</div>
<div class="row">
    <?php
    if ($result_search==""):
    if ($result_search_permition==""):
    foreach ($users as $index=>$user):
    ?>
    <div class="col-3">
        <div class="card" style="width:250px;height:400px;">
            <a  href="dashboard.php?page=edit-info-user&id=<?php echo $user->id; ?>">
                <div style="background-color: #9e9ec2;text-align: center;" class="card-body">
                    <img style="width:200px;height:100px;" src="<?php echo $user->image ?>" class="card-img-top" alt="image">
                    <hr>
                    <h5 class="card-title"><?php echo $user->full_name ?></h5>
                    <div class="card-text">
                        <div>
                            <?php $permition_name=show_permition_name($user->permition);
                            echo $permition_name->name;
                            ?>
                        </div>
                        <div>
                            <?php echo $user->birthday; ?><br>
                            <?php echo $user->skills; ?><br>
                            <?php echo $user->email; ?><br>
                            <?php echo $user->status; ?><br>

                        </div>
                    </div>
            </a>
        </div>
    </div>
</div>
<?php endforeach;?>
<?php endif;?>
<?php endif;?>

</div>
