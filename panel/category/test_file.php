<?php
function select_records($parent){
    $pdo=connect_db();
    $query=$pdo->prepare("select * from category_tbl where parent='$parent'");
    $query->execute();
    $res=$query->fetchAll(PDO::FETCH_OBJ);
    return $res;
}

function cat_loop($parent=0){
    $records=select_records($parent);
    foreach ($records as $key=>$record){






    }


}











?>







