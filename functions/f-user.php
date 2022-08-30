<?php
include_once 'connect.php';
include_once 'functions.php';
?>
<?php

function insert_info_user($info,$img){
$fullname=$info['fullname'];$Mcode=$info['Mcode'];$father_name=$info['father_name'];$birthday=$info['birthday'];
$degree=$info['degree'];$field=$info['field'];$phone=$info['phone'];$state=$info['state'];$city=$info['city'];
$email=$info['email'];$linkdin=$info['linkdin'];$instagram=$info['instagram'];$telegram=$info['telegram'];
$home_address=$info['home_address'];$work_address=$info['work_address'];$skill=$info['skill'];
$skill_desc=$info['skill_desc'];$permition=$info['permition'];$status=$info['status'];$author=$_SESSION['login_user'];
$date_register=date("Y/m/d");$main_dir="../img/users/$fullname/";
 mkdir($main_dir);
 if($img['name'] !== ""){
 $dir_pics=upload_pics($img, "../img/users/$fullname/" );
}
$password=sha1($Mcode);
$pdo=connect_db();
$query=$pdo->prepare("insert into users_tbl (user_name,password,full_name,National_code,father_name,birthday,degree,field,phone,state,city,email,linkdin,instagram,telegram,home_address,work_address,skills,skills_desc,image,permition,author,register_date,status) values('$email','$password','$fullname','$Mcode','$father_name','$birthday','$degree','$field','$phone','$state','$city','$email','$linkdin','$instagram','$telegram','$home_address','$work_address','$skill','$skill_desc','$dir_pics','$permition','$author','$date_register','$status') ");
$query->execute();

}

function login_user($user,$pass){

$pdo=connect_db();
$query=$pdo->prepare("select * from users_tbl where user_name='$user' ");
$query->execute();
$res=$query->fetch(PDO::FETCH_OBJ);
$date=date("Y/m/d");
$status='online';
if($res){
    $pas=sha1($pass);
    if($pas == $res->password){
        $_SESSION['login_user']=$res->user_name;
        $sess_record=sess_checking($res->user_name);
        if ($sess_record){
            $query=$pdo->prepare("update session_start set status='online', login_date='$date' where title='$res->user_name'");
            $query->execute();
        }else{
            $query2=$pdo->prepare("insert into session_start(title, login_date, status ) VALUES ('$res->user_name','$date','$status')");
            $query2->execute();
        }

        header("location:panel/dashboard.php?page=welcome-page");

    echo "you are logged in";
    }
else{
    echo "wrong password";
}
}
else{echo "wrong username";
}
}

function page_title($url) {
    $fp = file_get_contents($url);
    if (!$fp) return null;
    $res = preg_match("/<title>(.*)<\/title>/siU", $fp, $title_matches);
    if (!$res) return null;
    // Clean up title: remove EOL's and excessive whitespace.
    $title = preg_replace('/\s+/', ' ', $title_matches[1]);
    $title = trim($title);
    return $title;
}

function insert_permition($title,$status,$page){
    $code=getRandomString(6);
    $author=$_SESSION['login_user'];
    $date=date('Y,M,D');
    $pdo=connect_db();
    $query=$pdo->prepare("insert into permition_tbl(code,name,permition,author,date,status) values ('$code','$title','$page','$author','$date','$status')");
    $query->execute();

}

function select_permition_name(){
$pdo=connect_db();
$query=$pdo->prepare("SELECT * FROM permition_tbl WHERE status='ON' ");
$query->execute();
$res=$query->fetchAll(PDO::FETCH_OBJ);
return $res;

}

function list_permition(){
    $pdo=connect_db();
    $query=$pdo->prepare("select * from permition_tbl order by id desc ");
    $query->execute();
    $res=$query->fetchAll(PDO::FETCH_OBJ);
    return $res;

}

function list_access($id){
    $pdo=connect_db();
    $query=$pdo->prepare("select * from permition_tbl where id='$id'");
    $query->execute();
    $res=$query->fetch(PDO::FETCH_OBJ);
    return $res;

}
function list_name_permition($id){
$result=array();
$res=list_access($id);
$permitions=explode(',',$res->permition);
foreach ($permitions as $key=>$permition){
$pdo=connect_db();
$query=$pdo->prepare("select * from name_page where page='$permition'");
$query->execute();
$res1=$query->fetch(PDO::FETCH_OBJ);
$result[$key]=$res1->name;
    }
return $result;

}

function select_permition_url($id){
    $pdo=connect_db();
    $query=$pdo->prepare("select * from permition_tbl where id=$id");
    $query->execute();
    $res=$query->fetch(PDO::FETCH_OBJ);
    return $res;

}
function update_permition($id,$title,$status,$page){
$author=$_SESSION['login_user'];
$date=date('Y/M/D');
$pdo=connect_db();
$query=$pdo->prepare("update permition_tbl set name='$title',permition='$page',author='$author',date='$date',status='$status' where id='$id'");
$query->execute();

}
function delete_access($id){
    $pdo=connect_db();
    $query=$pdo->prepare("delete from permition_tbl where id='$id'");
    $query->execute();
}

function insert_info_file($items,$xlsxfile,$location){
    $new_location=upload_pics($xlsxfile,$location);
    $title=$items['title'];
    $description=$items['desc'];
    $code = getRandomString(6);
    $type='excel';
    $author=$_SESSION['login_user'];
    $date=date('Y/M/D');
    $part='group_user_register';
     $pdo=connect_db();
     $query=$pdo->prepare("insert into upload_file_tbl(code, name, description, type, path, author, date, part)values('$code','$title','$description','$type','$new_location','$author','$date','$part');");
     $query->execute();


}
function update_info_bulk_user(){
$author=$_SESSION['login_user'];
$date=date('Y/M/d');
$pdo=connect_db();
$query=$pdo->prepare("select * from users_tbl where author='system'");
$query->execute();
$res=$query->fetchAll(PDO::FETCH_OBJ);
foreach ($res as $user){
    $username=$user->email;
    $password=sha1($user->phone);
    $query1=$pdo->prepare("UPDATE users_tbl SET user_name='$username',password='$password',author='$author',register_date='$date' where id='$user->id'");
$query1->execute();

    }
}
function remember($user,$pass){
    setcookie('user',$user,time()+(86400*30));
    setcookie('pass',$pass,time()+(86400*30));

}

function register_user($info){
    $username=$info['username'];
    $password=sha1($info['password']);
    $email=$info['email'];
    $pdo=connect_db();
    $query=$pdo->prepare("insert into users_tbl (user_name,password,email) values ('$username','$password','$email')");
    $query->execute();

}

function list_upload_file(){
    $pdo=connect_db();
    $query=$pdo->prepare("select * from upload_file_tbl where part='group_user_register'");
    $query->execute();
    $res=$query->fetchAll(PDO::FETCH_OBJ);
    return $res;

}
function select_bulk_user(){
    $pdo=connect_db();
    $query=$pdo->prepare("select * from users_tbl");
    $query->execute();
    $res=$query->fetchAll(PDO::FETCH_OBJ);
    return $res;

}
function show_permition_name($code_permition){
$pdo=connect_db();
$query=$pdo->prepare("select * from permition_tbl where id='$code_permition'");
$query->execute();
$res=$query->fetch(PDO::FETCH_OBJ);
    return $res;
}
function select_user_info($id){
    $pdo=connect_db();
    $query=$pdo->prepare("select * from users_tbl where id='$id'");
    $query->execute();
    $res=$query->fetch(PDO::FETCH_OBJ);
    return $res;

}
function update_info_user($id,$info,$img){
    $fullname=$info['fullname'];$Mcode=$info['Mcode'];$father_name=$info['father_name'];$birthday=$info['birthday'];
    $degree=$info['degree'];$field=$info['field'];$phone=$info['phone'];$state=$info['state'];$city=$info['city'];
    $email=$info['email'];$linkdin=$info['linkdin'];$instagram=$info['instagram'];$telegram=$info['telegram'];
    $home_address=$info['home_address'];$work_address=$info['work_address'];$skill=$info['skill'];
    $skill_desc=$info['skill_desc'];$permition=$info['permition'];$status=$info['status'];$author=$_SESSION['login_user'];
    $date_register=date('Y/M/D');
    $last_info=select_user_info($id);
    if ($img['name']!==""){
        $main_dir="../img/users/$fullname/";
        mkdir($main_dir);
        unlink($last_info->image);
        $dir_pics=upload_pics($img,$main_dir);
    }else{
        $dir_pics=$last_info->image;
    }
    $password=sha1($Mcode);
    $pdo=connect_db();
    $query=$pdo->prepare("update users_tbl set user_name='$email',password='$password',full_name='$fullname',National_code='$Mcode',father_name='$father_name',birthday='$birthday',degree='$degree',field='$field',phone='$phone',state='$state',city='$city',email='$email',linkdin='$linkdin',instagram='$instagram',telegram='$telegram',home_address='$home_address',work_address='$work_address',skills='$skill',skills_desc='$skill_desc',image='$dir_pics',permition='$permition',author='$author',register_date='$date_register',status='$status' where id=$id");
    $query->execute();


}

function delete_info_user($id){
    $pdo=connect_db();
    $query=$pdo->prepare("delete from users_tbl where id='$id'");
    $query->execute();
}
function search_with_permition($id){
    $pdo=connect_db();
    $query=$pdo->prepare("select * from users_tbl where permition='$id'");
    $query->execute();
    $res=$query->fetchAll(PDO::FETCH_OBJ);
    return $res;

}
function select_search_info($info){
    $pdo=connect_db();
    $query=$pdo->prepare("select * from users_tbl where full_name like '%$info%' or National_code like '%$info%'");
    $query->execute();
    $res=$query->fetchAll(PDO::FETCH_OBJ);
    return $res;

}
function user_reco($user_name){
    $pdo=connect_db();
    $query=$pdo->prepare("select * from users_tbl where user_name='$user_name'");
    $query->execute();
    $res=$query->fetch(PDO::FETCH_OBJ);
    return $res;
}
function users_records(){
    $pdo=connect_db();
    $query=$pdo->prepare("select * from users_tbl where status='active'");
    $query->execute();
    $res=$query->fetchAll(PDO::FETCH_OBJ);
    return $res;
}
function recent_users(){
    $pdo=connect_db();
    $query=$pdo->prepare("select * from users_tbl where register_date > DATE_SUB(now(), INTERVAL 1 DAY) " );
    $query->execute();
    $res=$query->fetchAll(PDO::FETCH_OBJ);
    return $res;
}
function online_users(){
    $pdo=connect_db();
    $query=$pdo->prepare("select * from session_start where status='online'");
    $query->execute();
    $res=$query->fetchAll(PDO::FETCH_OBJ);
    return $res;
}
function offline_users(){
    $pdo=connect_db();
    $query=$pdo->prepare("select * from session_start where status='offline'");
    $query->execute();
    $res=$query->fetchAll(PDO::FETCH_OBJ);
    return $res;
}
function log_out($session){
    $pdo=connect_db();
    $date=date("Y/m/d");
    $query=$pdo->prepare("update session_start set status='offline', logout_date='$date'  where title='$session'");
    $query->execute();
}
function sess_checking($sess){
    $pdo=connect_db();
    $query=$pdo->prepare("select * from session_start where title='$sess'");
    $query->execute();
    $res=$query->fetch(PDO::FETCH_OBJ);
    return $res;
}
function sess_to_usertbl($sess){
    $pdo=connect_db();
    $query=$pdo->prepare("select * from users_tbl where user_name='$sess'");
    $query->execute();
    $res=$query->fetch(PDO::FETCH_OBJ);
    return $res;
}
function onedayago_users(){
    $pdo=connect_db();
    $query=$pdo->prepare("select * from session_start where login_date > DATE_SUB(now(), INTERVAL 1 DAY)");
    $query->execute();
    $res=$query->fetchAll(PDO::FETCH_OBJ);
    return $res;
}
function sess_id_call($id){
    $pdo=connect_db();
    $query=$pdo->prepare("select * from session_start where id='$id'");
    $query->execute();
    $res=$query->fetch(PDO::FETCH_OBJ);
    return $res;
}
function title_record($file){
    $pdo=connect_db();
    $query=$pdo->prepare("select * from title_tag where file_name='$file'");
    $query->execute();
    $res=$query->fetch(PDO::FETCH_OBJ);
    return $res;
}

function insert_into_tag_tbl($dir,$file,$title){
    $pdo=connect_db();
    if ($title==''){$status='off';}else{$status='on';}
    if (title_record($file)=="") {
        $query = $pdo->prepare("insert into title_tag(file_name, title, dir, title_status) VALUES ('$file','$title','$dir','$status')");
        $query->execute();
    }elseif (title_record($file)){
      /*  $pdo=connect_db();
        $query=$pdo->prepare("update title_tag set file_name='$file',title='$title',dir='$dir',title_status='$status' where file_name='$file'");
        $query->execute();   */
    }
}
function title_records(){
    $pdo=connect_db();
    $query=$pdo->prepare("select * from title_tag order by id desc ");
    $query->execute();
    $res=$query->fetchAll(PDO::FETCH_OBJ);
    return $res;
}
function insert_tag($title,$file){
    $pdo=connect_db();
    $query=$pdo->prepare("update title_tag set title='$title',title_status='on'  where file_name='$file' ");
    $query->execute();
}

?>