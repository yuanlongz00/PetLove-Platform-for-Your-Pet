<?php


$id = $_GET['id'];

$uid = $_COOKIE['uid'];

if(!$uid){
    echo json_encode(array('code'=>300,'msg' => 'Not logged in'));
    die;
}

$sql = "select * from `like` where `uid`={$id} and `user_id`={$uid} ";

$sql4 = "SELECT * FROM `posts` WHERE `id`={$id}";


require_once '../config/db.php';

$db = new db;

$res = $db->find($sql);
$post = $db->find($sql4);
$sql1 = '';
$sql2 = '';
if($res){
    if($res['spot'] == 1){
        $sql1 = "UPDATE `like` SET `spot`=0 WHERE `id`={$res['id']}";
        $m = $post['like'] - 1;
        $sql2 = "UPDATE `posts` SET `like`='{$m}' WHERE `id`={$post['id']}";

    }
    if($res['spot'] == 0){
        $n = $post['like'] + 1;
        $sql1 = "UPDATE `like` SET `spot`=1 WHERE `id`={$res['id']}";
        $sql2 = "UPDATE `posts` SET `like`='{$n}' WHERE `id`={$post['id']}";

    }
}else{

    $num = $post['like'] + 1;
    $time = date('Y-m-d h:i:s', time());
    $sql1 = "INSERT INTO `like`(`uid`, `user_id`, `spot`, `time`)VALUES('{$id}', '{$uid}', 1, '{$time}')";
    $sql2 = "UPDATE `posts` SET `like`='{$num}' WHERE `id`={$post['id']}";

}
$db->query($sql2);

if($db->query($sql1)){
    echo json_encode(array('code'=>200,'msg' => 'Operation successful'));
}else{
    echo json_encode(array('code'=>400,'msg' => 'Operation failed'));
}
