
<div class="container-fluid header">
    <div class="container">
        <div class="row">
            <div class="col-md-6 logo">
                <a href="index.php"><img src="img/logo.png" width="160" height="50"></a>
            </div>
            <div class="col-md-6 link">



                <?php
                if (isset($_SESSION['login_user'])){
                    echo '<a href="panel/dashboard.php?page=welcome-page" class="login">ورود به پنل کاربری</a>';
                    echo '<a href="panel/exit_file.php" class="sabtnam">خروج</a>';
                }else{
                    echo '<a href="login.php" class="login">ورود به سایت</a>';
                    echo '<a href="register.php" class="sabtnam">ثبت نام کنید</a>';
                }
                ?>

            </div>


            <aside class="menu-bar">
                <nav id="menu_item">
                    <ul class="menu">
                        <?php include_once 'functions/f-category.php';
                        $cats=cat_callback();
                        foreach ($cats as $cat):?>
                            <li>
                                <a href="#"><?php echo $cat->title; ?></a>
                                <?php $subcats=subcat_callback($cat->id);
                                if ($subcats):?>
                                    <ul class="sub-menu">
                                        <?php

                                        foreach ($subcats as $subcat):
                                            ?>
                                            <li>
                                                <a href="#"><?php echo $subcat->title; ?></a>

                                            </li>
                                        <?php endforeach;?>
                                    </ul>
                                <?php endif;?>
                            </li>
                        <?php endforeach;?>
                    </ul>
                </nav>
            </aside>
        </div>
    </div>
</div>