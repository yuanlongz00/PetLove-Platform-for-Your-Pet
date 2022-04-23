<?php



require_once '../config/db.php';



$sql = "SELECT * FROM `comments` WHERE `cid`={$_GET['id']}";
$db = new db;

$res = $db->find( $sql);

$sql2 = "DELETE FROM `comments` WHERE `cid`={$res['cid']}";

if($db->query($sql2)){

    echo "<script>alert(\"Comment successfully!\")</script>";
    echo "<script>location.href=\"./getDetail.php?id=\"+{$res['pid']}</script>";

}