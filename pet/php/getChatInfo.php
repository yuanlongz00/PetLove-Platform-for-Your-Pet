<?php




try{
    
    require_once '../config/db.php';

    $db = new db;
    $uid = $_COOKIE['uid'];
    
    $sql = "SELECT * FROM `userfriend` WHERE `user1id`={$uid} ORDER BY `lastContact`";
 
    $r = $db->select($sql);
    
    
    $sql1 = "SELECT * FROM `chats` WHERE `user1id`={$uid} or `user2id`={$uid} ORDER BY `date`";
    $rr = $db->select( $sql1);
    
    echo json_encode(array('code'=>200, 'data'=>array('friends'=>$r, 'chat'=>$rr)));
    
} catch (\Exception $e){
    echo json_encode(array('code'=>400, 'msg'=>$e));
    
}


