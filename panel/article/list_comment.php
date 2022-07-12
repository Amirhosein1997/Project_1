<?php
include_once '../functions/functions.php';
include_once '../functions/f-article.php';
$all_comments=count_comments();
$comments_nums=count($all_comments)
?>

<!DOCTYPE html>
<head>
    <title>مشاهده همه نظرات</title>
</head>
<div class="alert alert-primary" role="alert">
    تعداد کل:<?php echo $comments_nums ; ?>
</div>

<table class="table table-sm table-dark table-hover">
    <thead>
    <tr>
        <th >پیام</th>
        <th >کد نظر</th>
        <th >عنوان نوشته</th>
        <th >نویسنده نظر</th>
        <th >متن نظر</th>
        <th >وضعیت انتشار</th>
        <th >تاریخ ثبت</th>
        <th >پاسخ به نظر</th>
        <th >حذف</th>
    </tr>
    </thead>
    <tbody>
    <?php $list_comments=comments_lists();

    foreach ($list_comments as $comment):
    ?>
    <tr>
        <td>نظر کاربر</td>
        <td><?php echo $comment->code; ?></td>
        <td><?php $article_reco=article_callback($comment->article_id);
                echo $article_reco->title;
            ?>
        </td>
        <td><?php echo $comment->author; ?></td>
        <td><?php echo $comment->text; ?></td>
        <td><?php echo $comment->status_comment; ?></td>
        <td><?php echo $comment->date; ?></td>
        <td><a class="btn btn-primary" href="dashboard.php?page=reply-comment&id=<?php echo $comment->id; ?>" role="button">پاسخ</a></td>
        <td><a class="btn btn-primary" href="dashboard.php?page=delete-comment&id=<?php echo $comment->id; ?>" role="button">حذف</a></td>
    </tr>
        <?php $list_reply=reply_list($comment->id);
        foreach ($list_reply as $reply):
        ?>
    <tr>

        <td><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
            </svg>
            پاسخ

        </td>
        <td><?php echo $reply->code; ?></td>
        <td><?php $article_reco_rep=article_callback($reply->article_id);
            echo $article_reco_rep->title;
            ?></td>
        <td><?php echo $reply->author; ?></td>
        <td><?php echo $reply->text; ?></td>
        <td><?php echo $reply->status_reply; ?></td>
        <td><?php echo $reply->date; ?></td>
        <td><a class="btn btn-primary" href="#" role="button">X</a></td>
        <td><a class="btn btn-primary" href="#" role="button">X</a></td>
    </tr>
        <?php endforeach; ;?>
<?php endforeach;?>
    </tbody>
</table>