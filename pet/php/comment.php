<?php


if($_SERVER['REQUEST_METHOD'] === 'POST'){


    require_once '../config/db.php';

    if(!$_POST['comment']){
        echo "<script>location.href=\"./getDetail.php?id=\"+{$_POST['pid']}</script>";
        die;
    }
    $user = $_COOKIE['user'];
    $time = date('Y-m-d h:m:s');

    $sql = "INSERT INTO `comments`(`user`, `content`, `date`, `pid`, `reply_id`)VALUES('{$user}', '{$_POST['comment']}', '{$time}', {$_POST['pid']}, -1)";


    $db = new db;

    if($db->query($sql)){

        echo "<script>alert(\"Comment successfully!\")</script>";
        echo "<script>location.href=\"./getDetail.php?id=\"+{$_POST['pid']}</script>";

    }else{

        echo "fail";

    }



}