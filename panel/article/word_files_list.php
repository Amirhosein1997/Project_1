<?php
include_once '../functions/functions.php';
include_once '../functions/f-article.php';

$word_records=word_records();

?>

<table class="table table-dark table-hover">
    <thead>
    <tr>
        <th>ردیف</th>
        <th>نام فایل</th>
        <th>لینک دانلود</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($word_records as $key=>$val): ?>
    <tr>
        <td><?php echo $key+1; ?></td>
        <td><?php echo $val->title; ?></td>
        <td> <a href="<?php echo $val->link;?>" class="btn btn-success">دانلود فایل</a></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
