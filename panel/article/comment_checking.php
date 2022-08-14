<?php
include_once '../../functions/f-article.php';
include_once '../../functions/functions.php';
if (isset($_GET['id'])){
    $id=$_GET['id'];
    $comment=callback_comment($id);
    $text=$comment->text;
    $exploded_text=explode(" ",$text);
}
    $bad_words=select_bad_word();
    foreach ($exploded_text as $word ){

    foreach ($bad_words as $bad_word){
        if ($bad_word->name==$word){
            delete_comment($id);
            break;
        }
    }
}





?>