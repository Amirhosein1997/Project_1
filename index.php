<?php
session_start();
ob_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Project_1</title>
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">


</head>
<body>

<?php include_once 'index_header.php';?>
<div class="main">
    <div class="main-slider">
        <div class="owl-carousel owl-theme">
            <?php  include_once 'functions/f-slider.php';
            $subslids=slide_show();
            foreach ($subslids as $key=>$subslid):
                $exploded_loc=explode('/',$subslid->dir);
                $mod_loc=$exploded_loc[1].'/'.$exploded_loc[2].'/'.$exploded_loc[3].'/'.$exploded_loc[4];
                ?>
            <div class="item">
                <a target="_blank" href="#"><img src="<?php echo $mod_loc; ?>" alt="sample"/></a>
                <span><a href="#"><?php echo $key+1; ?></a> </span>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php include_once 'functions/f-widget.php';
            $widgets=widgets_back();
            foreach ($widgets as $widget):
            ?>
            <div class="col-md-2 widget">
                <?php echo $widget->svg_code; ?>
                <span><?php echo $widget->title; ?></span>
            </div>
            <?php endforeach;?>

        </div>
    </div>
</div>

<br>
<br>
<?php include_once 'functions/f-page.php';
        $single_page_record=single_record();
        $exploded_btn=explode(',',$single_page_record->btn_title);
        $exploded_link=explode(',',$single_page_record->page_link);
?>
<div class="container-fluid post-tak">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-5 video-box">
                    <?php echo $single_page_record->video_code; ?>
                </div>
                <div class="col-md-7 content-box">
                    <h3><?php echo $single_page_record->title; ?></h3>
                    <p><?php echo $single_page_record->description; ?></p>
                    <div class="link-single">
                        <a href="<?php echo $exploded_link[0]; ?>" class="login"><?php echo $exploded_btn[0]; ?></a>
                        <a href="<?php echo $exploded_link[1]; ?>" class="sabtnam"><?php echo $exploded_btn[1]; ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<div class="title-main">
    <h4>آخرین مطالب آموزشی</h4>
</div>

<div class="container-fluid post-container">
    <div class="row">
        <div class="col-md-12">
            <div class="container">
                <?php include_once 'functions/f-article.php';
                $articles=articles_list();
                foreach ($articles as $article):
                    $img_src=substr($article->img,3);
                ?>
                  <!--  width="260" height="150" -->
                <article class="post">
                    <div class="thumb">
                        <img src="<?php echo $img_src; ?>" style="padding: 50px;" >
                    </div>
                    <div class="post-title">
                        <h2><a target="_blank" href="single.php?id=<?php echo $article->id; ?>" dideo-checked="true"><?php echo $article->title; ?></a></h2>
                    </div>
                    <div class="clearfix"></div>
                    <div class="post-txt">
                        <h6><?php if (strlen($article->text)>10){$mod_text=substr($article->text,0,10);echo $mod_text.'...';}else{echo $article->text;} ?></h6>
                    </div>
                    <div class="post-foot-container">
                        <div class="line-border"></div>
                        <div class="p-c-view"><i class="fa fa-eye"></i><?php echo $article->date; ?></div>
                        <div class="p-c-comment"><i class="fa fa-comment"></i></div>
                        <div class="p-c-view"><i class="fa fa-comment"></i> نویسنده : <?php echo $article->author; ?></div>
                    </div>
                </article>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</div>

<br>
<hr>
<?php
include_once 'functions/f-article.php';
if (isset($_POST['send'])){
    $article_email=$_POST['email_article'];
    add_to_news($article_email);

}
?>
<h6 >عضویت در خبرنامه سایت</h6>
<form  method="post" enctype="multipart/form-data">
    <div class="col-md-4" >
        <label for="email" class="form-label">ایمیل:</label>
        <input size="20" type="email" class="form-control" id="email" placeholder="Enter email" name="email_article">
    </div>
    <button name="send" type="submit" class="btn btn-primary">ثبت ایمیل</button>
</form>
<br>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4 box-footer">
                <h5>دسترسی سریع</h5>
                <div class="top-bar">
                    <div class="right-top-bar">
                        <ul>
                            <li id="menu-item-69" class="menu-item"><a title="وبسافت3" href="http://websoft3.com"
                                                                       dideo-checked="true">صفحه اصلی</a></li>
                            <li class="menu-item"><a href="#">درباره ما</a></li>
                            <li class="menu-item"><a href="#">تماس با ما</a></li>
                            <li class="menu-item"><a href="#">پرداخت آنلاین</a></li>
                            <li class="menu-item"><a href="#">حساب کاربری من</a></li>
                            <li class="menu-item"><a href="#">همکاری با ما</a></li>
                        </ul>
                    </div>

                </div>
            </div>
            <div class="col-md-8 box-footer">
                <h5>درباره وبسافت3</h5>
                <div class="top-bar">
                    <div class="right-top-bar">
                        <div class="textwidget">وبسافت3 فعالیت خود را در تاریخ 1393/10/7 در زمینه تولید فیلم های آموزش
                            طراحی سایت و و وردپرس آغاز کرده.
                            یکی از دغدغه های بیشتر افراد محصل در رشته های مختلف و به خصوص رشته کامپیوتر، ترس از بیکاری و
                            بدست نیاوردن شغل مورد علاقه شان بعد از فارق التحصیلی هست. ما با در نظر گرفتن این موضوع و
                            تلاش برای پوشش دادن این نوع دغدغه ها در حد توان به عنوان یک مرجع آموزشی سعی میکنیم به اهداف
                            شغلی خود دست پیدا کنند.
                        </div>
                    </div>
                </div>

            </div>


            <div class="col-md-12 copy-right">
                تمامی حقوق و مطالب سایت برای وبسافت3 محفوظ می باشد و کپی برداری از مطالب رایگان باذکر منبع آزاد است.
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</footer>


<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>