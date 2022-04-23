<?php


include_once '../config/db.php';

$id = $_GET['id'];
$sql = "DELETE FROM `pets` WHERE id={$id}";
$db = new db;
if($db->query($sql)){

    echo "<script>alert(\"Delete Successfully!\")</script>";
    echo "<script>location.href=\"./userPet.php\"</script>";
}
