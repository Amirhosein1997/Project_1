
<div class="content-panel">
    <div class="container-fluid">
        <?php
 if(isset($_SESSION['login_user'])) {
    if (isset($_GET['page'])) {
        switch ($_GET['page']) {
            case 'new-category' :
                include_once 'Category/add_category.php';
                break;
            case 'list-category' :
                include_once 'Category/list_category.php';
                break;
            case 'edit-category' :
                include_once 'Category/edit_category.php';
                break;
            case 'delete-category' :
                include_once 'Category/delete_category.php';
                break;
            case 'new-article' :
                include_once 'article/add_article.php';
                break;
            case 'list-article' :
                include_once 'article/list_article.php';
                break;
            case 'edit-article' :
                include_once 'article/edit_article.php';
                break;
            case 'delete-article' :
                include_once 'article/delete_article.php';
                break;
            case 'list-comment' :
                include_once 'article/list_comment.php';
                break;
            case 'reply-comment' :
                include_once 'article/reply_comment.php';
                break;
            case 'delete-comment' :
                include_once 'article/delete_comment.php';
                break;
            case 'setting-slider' :
                include_once 'slider/setting_slider.php';
                break;
            case 'edit-slideinfo' :
                include_once 'slider/edit_slider_info.php';
                break;
            case 'delete-slideinfo' :
                include_once 'slider/delete_slider_info.php';
                break;
            case 'add-slider' :
                include_once 'slider/add_slider.php';
                break;
            case 'import-slider' :
                include_once 'slider/import_slider.php';
                break;
            case 'delete_slide_info' :
                include_once 'slider/delete_slide_info.php';
                break;
            case 'edit_slide_info' :
                include_once 'slider/edit_slide_info.php';
                break;
            case 'list-slider' :
                include_once 'slider/list_slider.php';
                break;
            case 'setting-widget' :
                include_once 'widget/setting_widget.php';
                break;
            case 'list-widget' :
                include_once 'widget/list_widget.php';
                break;
            case 'edit-widget' :
                include_once 'widget/edit_widget.php';
                break;
            case 'delete-widget' :
                include_once 'widget/delete_widget.php';
                break;
            case 'setting-page' :
                include_once 'page/setting_page.php';
                break;
            case 'single-page' :
                include_once 'page/single_page.php';
                break;
            case 'list-pages' :
                include_once 'page/list_page.php';
                break;
            case 'edit_groupe_page' :
                include_once 'page/edit_groupe_page.php';
                break;
            case 'made_groupe_page' :
                include_once 'page/made_groupe_page.php';
                break;
            case 'delete-groupe-page' :
                include_once 'page/delete_groupe_page.php';
                break;
            case 'delete_page' :
                include_once 'page/delete_page.php';
                break;
            case 'config-access' :
                include_once 'user/config_access.php';
                break;
            case 'delete-access' :
                include_once 'user/delete_access.php';
                break;
            case 'setting-user' :
                include_once 'user/setting_user.php';
                break;
            case 'list-users' :
                include_once 'user/example_client.php';
                break;

            case 'edit-info-user' :
                include_once 'user/setting_edit_user.php';
                break;
            case 'setting-sms' :
                include_once 'sms/setting_sms.php';
                break;
            case 'report-sms' :
                include_once 'sms/setting_report.php';
                break;
            case 'email-setting' :
                include_once 'email/setting_email.php';
                break;
            case 'report_email' :
                header("location: email/inbox.php");
                break;
            case 'report_send_email' :
                include_once 'email/report_send_email.php';
                break;

        }
    } else {
        include_once 'quick_access.php';
    }
  }
        ?>


    </div>
</div>