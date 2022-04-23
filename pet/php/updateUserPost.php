<?php


if($_SERVER['REQUEST_METHOD']  === 'POST'){

    include_once '../config/db.php';
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $content = $_POST['content'];
    $user = $_COOKIE['user'];
    $uid = $_COOKIE['uid'];
    $date = date('Y-m-d h:i:s', time());
    $tag = $_POST['tag'];
    $id = $_POST['id'];

    $sql = "UPDATE `posts` SET `user`='{$user}', `title`='{$title}', `date`='{$date}', `content`='{$content}', `discript`='{$desc}', `tag`={$tag} WHERE `id`={$id}";
    $db = new db;
    if($db->query($sql)){

        echo json_encode(array('code'=>200,'msg' => 'Update successful'));
    }else{
        echo json_encode(array('code'=>400,'msg'=>'Update failed Error:'.$sql));
    }

}