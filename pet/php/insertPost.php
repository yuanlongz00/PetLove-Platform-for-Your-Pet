<?php


if($_SERVER['REQUEST_METHOD'] === 'POST'){



    if(!$_POST['title']){
        echo json_encode(array('code'=>400,'msg' =>'title cannot be empty'));
        die;
    }
    if(!$_POST['desc']){
        echo json_encode(array('code'=>400,'msg' =>'desc cannot be empty'));
        die;
    }
    if(!$_POST['tag']){
        echo json_encode(array('code'=>400,'msg' =>'tag cannot be empty'));
        die;
    }
    $user = $_COOKIE['user'];
    $uid = $_COOKIE['uid'];
    $time = date('Y-m-d h:i:s', time());

    $sql = "INSERT INTO `posts`(`user`, `title`, `date`, `content`, `like`, `uid`, `discript`, `tag`)VALUES
    ('{$user}', '{$_POST['title']}', '{$time}', '{$_POST['content']}', 0, {$uid}, '{$_POST['desc']}', {$_POST['tag']})";
    require_once '../config/db.php';

    $db = new db;
    if($db->query($sql)){
        echo json_encode(array('code'=>200,'msg' => 'Published successfully'));
    }else{
        echo json_encode(array('code'=>400,'msg' => 'Publishing failed'));
    }

}


