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
    <title>مقاله</title>
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<?php
include_once 'functions/f-article.php';
$article_id=$_GET['id'];
$article_record=published_article($article_id);
$mod_img=substr($article_record->img,3);

?>
<body>

<?php include_once 'index_header.php';?>
<br>
<br>

<div class="container">
    <div class="row">
        <div class="col-md-12">


            <div class="post-single">
                <div class="post-title-single"><h1><?php echo $article_record->title; ?></h1>
                    <div class="clearfix"></div>
                    <div class="entry-meta">
                        <div class="view">
                            دسته بندی :
                            <ul class="post-categories">
                                <?php $cat_records=categories_names($article_record->cat_id);
                                foreach ($cat_records as $cat_record):?>

                                <li><a href="" rel="category tag"><?php echo $cat_record->title.'/'; ?></a></li>

                                <?php endforeach;?>
                            </ul>
                        </div>

                        <div class="view"><i class="fa fa-comment"></i>
                            منتشر شده در :
                        <?php echo $article_record->date; ?>
                        </div>
                        <div class="view"><i class="fa fa-user"></i><span>
                                نویسنده :
                            <?php echo $article_record->author; ?>
                            </span>

                        </div>
                        <div class="view"><i class="fa fa-user"></i><span>
                                آیدی مقاله :
                            <?php echo $article_id; ?>

                            </span>
                        </div>
                    </div>

                </div>


                <div class="clearfix"></div>
                <div class="thumb-single-product"><img src="<?php echo $mod_img; ?>" width="50%" class="attachment-medium size-medium wp-post-image" alt=""></div>

                <div class="post-txt-single">
                    <?php
                      echo $article_record->text;
                    ?>
                </div>
            </div>
            <?php if (isset($_SESSION['login_user'])):?>
            <div>
            </div>
            <?php else: ?>
            <div class="box-comment">
                <h3>نظر خود را در رابطه با این مقاله وارد کنید</h3>
                <h3>برای ثبت نظر ابتدا باید
                    <a class="btn btn-warning" href="login.php">وارد شوید</a>
                    یا
                    <a class="btn btn-primary" href="register.php"> ثبت نام کنید </a>
                    کنید
                </h3>
                <?php endif;?>



                <div class="comment">
                    <?php $parent_comments=on_parent_comments($article_id);
                    foreach ($parent_comments as $parent_comment): ?>

                    <img src="img/user.png">
                    <h5><?php echo $parent_comment->author; ?></h5>
                    <p><?php echo $parent_comment->text; ?></p>
                        <?php $reply_comments=on_reply_comments($parent_comment->id);
                        foreach ($reply_comments as $reply_comment): ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-left-square-fill" viewBox="0 0 16 16">
                                <path d="M2 16a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2zm8.096-10.803L6 9.293V6.525a.5.5 0 0 0-1 0V10.5a.5.5 0 0 0 .5.5h3.975a.5.5 0 0 0 0-1H6.707l4.096-4.096a.5.5 0 1 0-.707-.707z"/>
                            </svg>
                            <img src="img/uuser.png">
                            <h5><?php echo $reply_comment->author; ?></h5>
                            <p><?php echo $reply_comment->text; ?></p>
                        <?php endforeach; ?>


                    <?php endforeach;?>
                </div>
                <?php
                if (isset($_POST['send'])){
                $text=$_POST['text'];
                $exploded_text=explode(" ",$text);
                    $bad_words=select_bad_word();
                    foreach ($exploded_text as $word ){

                        foreach ($bad_words as $bad_word){
                            if ($bad_word->name==$word){
                                echo "bad_words";
                                break;
                            }else{
                                insert_comment($text,$article_id,);
                                header("location:single.php?id={$article_id}");
                                break;
                            }
                        }
                    }

                }
                ?>

                <div class="clearfix"></div>
                <br>
                <br>
                <form enctype="multipart/form-data" method="post">
                    <span>متن نظر شما</span>
                    <textarea name="text"></textarea>
                    <input type="hidden" name="article_id" value="{{$single->id}}">
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <input type="hidden" name="user_name" value="{{Auth::user()->name}}">
                    <input type="submit" name="send" class="btn btn-success" value="ثبت نظر">
                </form>
            </div>
        </div>
    </div>
</div>

<br>
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