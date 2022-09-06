<?php
include_once 'connect.php';
include_once 'functions.php';

function categories_callback(){
    $pdo=connect_db();
    $query=$pdo->prepare("select * from category_tbl where parent='0'");
    $query->execute();
    $res=$query->fetchAll(PDO::FETCH_OBJ);
    return $res;

}
function subcategories_callback($id){
    $pdo=connect_db();
    $query=$pdo->prepare("select * from category_tbl where parent='$id'");
    $query->execute();
    $res=$query->fetchAll(PDO::FETCH_OBJ);
    return $res;

}
function publish_article($info,$img,$cats,$status){
    $title=$info['title'];
    $code=getRandomString('6');
    $text=$info['text'];
    $cat_id=implode(',',$cats);
    $articles_loc="../img/articles/$title/";
    if (!is_dir($articles_loc)){mkdir($articles_loc);}
    $image=upload_pics($img,"../img/articles/$title/");
    $author=$_SESSION['login_user'];
    $date=date('Y/M/D');
    $pdo=connect_db();
    $query=$pdo->prepare("insert into article_tbl(code_article, title, text, cat_id, img, author, date, status)values ('$code','$title','$text','$cat_id','$image','$author','$date','$status')");
    $query->execute();

}
    function articles_numbers(){
    $pdo=connect_db();
    $query=$pdo->prepare("select * from article_tbl");
    $query->execute();
    $res=$query->fetchAll(PDO::FETCH_OBJ);
    $res2=count($res);
    return $res2;

    }
    function articles_list(){
    $pdo=connect_db();
    $query=$pdo->prepare("select * from article_tbl order by id desc ");
    $query->execute();
    $res=$query->fetchAll(PDO::FETCH_OBJ);
    return $res;

    }
    function categories_names($ids){
    $pdo=connect_db();
    $query=$pdo->prepare("select * from category_tbl where id in ($ids) ");
    $query->execute();
    $res=$query->fetchAll(PDO::FETCH_OBJ);
    return $res;

    }
function article_callback($id){
    $pdo=connect_db();
    $query=$pdo->prepare("select * from article_tbl where id='$id'");
    $query->execute();
    $res=$query->fetch(PDO::FETCH_OBJ);
    return $res;

}
function update_article($id,$status,$info,$image_loc,$cats){

    $title=$info['title'];
    $text=$info['text'];
    if (is_array($cats)){$cats_ids=implode(',',$cats);
    }else{$cats_ids=$cats;}
    $author=$_SESSION['login_user'];
    $date=date('y/m/d');
    $pdo=connect_db();
    $query=$pdo->prepare("update article_tbl set title='$title',text='$text',cat_id='$cats_ids',img='$image_loc',author='$author',date='$date',status='$status' where id=$id ");
    $query->execute();

}
function delete_article($id){
    $pdo=connect_db();
    $query=$pdo->prepare("delete from article_tbl where id='$id'");
    $query->execute();

}
function count_comments(){
    $pdo=connect_db();
    $query=$pdo->prepare("select * from comment_tbl order by id desc ");
    $query->execute();
    $res=$query->fetchAll(PDO::FETCH_OBJ);
    return $res;
}
function comments_lists(){
    $pdo=connect_db();
    $query=$pdo->prepare("select * from comment_tbl where parent='0'");
    $query->execute();
    $res=$query->fetchAll(PDO::FETCH_OBJ);
    return $res;

}
function reply_list($id){
    $pdo=connect_db();
    $query=$pdo->prepare("select * from comment_tbl where parent='$id'");
    $query->execute();
    $res=$query->fetchAll(PDO::FETCH_OBJ);
    return $res;

}
function delete_comment($id){
    $pdo=connect_db();
    $query=$pdo->prepare("delete from comment_tbl where id='$id'");
    $query->execute();

}
function callback_comment($id){
    $pdo=connect_db();
    $query=$pdo->prepare("select * from comment_tbl where id='$id'");
    $query->execute();
    $res=$query->fetch(PDO::FETCH_OBJ);
    return $res;

}
function publisher($switcher,$id_comment,$id_article,$reply_text,$reply_author){
    switch ($switcher){
        case 'pub_pub':
            $status_comment='publish';
            $status_reply='publish';
            break;
        case 'save_save':
            $status_comment='save';
            $status_reply='save';
            break;
        case 'pub_save':
            $status_comment='publish';
            $status_reply='save';
            break;
    }
    $random_code=getRandomString(6);
    $date=date("y/m/d");
    $pdo=connect_db();
    $query=$pdo->prepare("update comment_tbl set status_comment='$status_comment',status_reply='$status_reply' where id='$id_comment'");
    $query->execute();
    $query2=$pdo->prepare("insert into comment_tbl (code, article_id, parent, author, text, date, status_comment, status_reply) VALUES ('$random_code','$id_article','$id_comment','$reply_author','$reply_text','$date','$status_comment','$status_reply')");
    $query2->execute();

}
function select_bad_word(){
    $pdo=connect_db();
    $query=$pdo->prepare("select * from comment_check");
    $query->execute();
    $res=$query->fetchAll(PDO::FETCH_OBJ);
    return $res;
}
function published_article($id){
    $pdo=connect_db();
    $query=$pdo->prepare("select * from article_tbl where id='$id' and status='publish'");
    $query->execute();
    $res=$query->fetch(PDO::FETCH_OBJ);
    return $res;
}
function on_parent_comments($id){
    $pdo=connect_db();
    $query=$pdo->prepare("select * from comment_tbl where parent='0' and status_comment='publish' and article_id='$id' order by id desc ");
    $query->execute();
    $res=$query->fetchAll(PDO::FETCH_OBJ);
    return $res;
}
function on_reply_comments($id){
    $pdo=connect_db();
    $query=$pdo->prepare("select * from comment_tbl where parent='$id' and status_reply='publish' order by id desc ");
    $query->execute();
    $res=$query->fetchAll(PDO::FETCH_OBJ);
    return $res;
}
function insert_comment($text,$article_id){
    $parent=0;
    $author=$_SESSION['login_user'];
    $code=getRandomString(6);
    $date=jdate('y/m/d');
    $status_comment='publish';
    $status_reply='publish';
    $pdo=connect_db();
    $query=$pdo->prepare("insert into comment_tbl(code, article_id, parent, author, text, date, status_comment, status_reply) VALUES ('$code','$article_id','$parent','$author','$text','$date','$status_comment','$status_reply')");
    $query->execute();
}
function pagination_method($page,$limit){

    $offset=($page-1) * $limit;
    $pdo=connect_db();
    $query=$pdo->prepare("select * from article_tbl limit $limit offset $offset ");
    $query->execute();
    $res=$query->fetchAll(PDO::FETCH_OBJ);
    return $res;
}
function delete_selected($ids){
    $imploded_ids=implode(",",$ids);
    $pdo=connect_db();
    $query=$pdo->prepare("delete from article_tbl where id in ($imploded_ids)");
    $query->execute();

}



?>