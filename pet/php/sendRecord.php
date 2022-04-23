<?php



if($_SERVER['REQUEST_METHOD'] === 'POST'){



    require_once '../config/db.php';
    $user1id = $_COOKIE['uid'];
    $user1name = $_COOKIE['user'];
    $user2id = $_POST['user2id'];
    $user2name = $_POST['user2name'];
    $content = $_POST['content'];
    $date = date('Y-m-d h:i:s', time());
    $sql1 = "UPDATE `userFriend` SET `lastContact`='{$date}' WHERE `user1id`={$user1id} and `user2id`={$user2id}";
    $sql2 = "UPDATE `userFriend` SET `lastContact`='{$date}' WHERE `user1id`={$user2id} and `user2id`={$user1id}";
    $sql3 = "INSERT INTO `chats`(`user1id`, `user1name`, `user2id`, `user2name`, `content`, `date`)
        VALUES({$user1id}, '{$user1name}', {$user2id}, '{$user2name}', '{$content}', '{$date}')";
    $db = new db;
    $db->query($sql1);
    $db->query($sql2);

    if($db->query($sql3)){
        echo json_encode(array('code'=>200));
    }else{
        echo json_encode(array('code'=>400));
    }


}


