<?php


require_once '../config/db.php';

$id = $_GET['id'];
$sql = "DELETE FROM `posts` WHERE `id`={$id}";
$db = new db;
if($db->query($sql)){

    echo "<script>alert(\"Delete Successfully!\")</script>";
    echo "<script>window.location.href=\"./userPost.php\"</script>";

}else{
    echo $sql;
}