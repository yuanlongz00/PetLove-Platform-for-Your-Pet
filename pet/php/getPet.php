<?php


$page = $_GET['page'];


if($page < 1){
    $page = 1;
}
$pageSize = 20;
$num = ($page - 1) * $pageSize;
if($_GET['p'] == 1){
    $sql = "SELECT * FROM `pets`  ";
}else{
    $sql = "SELECT * FROM `pets` where status = 1  ";
}

 //  LIMIT {$num},{$pageSize}

if($_GET['type']){
    $sql.= "and `type` LIKE '%{$_GET['type']}%'";
}
if($_GET['age']){
    $sql.= " and `age`={$_GET['age']}";
}
if($_GET['sex']){
    $sql.= " and `sex`='{$_GET['sex']}'";
}

$sql.= " LIMIT {$num},{$pageSize}";


require_once '../config/db.php';

$db = new db;

$res = $db->select($sql);



echo json_encode(array('statue' => 1, 'data' => $res));
