<?php


if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $user = $_COOKIE['user'];
    if(!$_POST['content']){

        echo json_encode(array('code'=>400,'msg' => 'content cannot be empty'));
        die;
    }
    $time = date('Y-m-d h:i:s', time());
    $sql = "INSERT INTO `postcomments`(`user`, `content`, `postid`, `reply_id`, `date`)VALUES('{$user}', '{$_POST['content']}', {$_POST['id']}, -1, '{$time}')";
  
    require_once '../config/db.php';

    $db = new db;

    if($db->query($sql)){

        echo json_encode(array('code'=>200,'msg'=>'Published successfully'));
    }else{
        echo json_encode(array('code'=>400,'msg' => 'Publishing failed'));
    }

}

