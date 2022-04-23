<?php


if($_SERVER['REQUEST_METHOD'] === 'POST'){


    require_once  '../config/db.php';

    $id = $_POST['id'];
    $name = $_POST['name'];
    $type = $_POST['type'];
    $sex = $_POST['sex'];
    $color = $_POST['color'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];
    $detail = $_POST['detail'];


    $sql = "UPDATE `pets` SET `name`='{$name}', `type`='{$type}', `sex`='{$sex}', `color`='{$color}', `age`={$age}, `phone`='{$phone}', `detail`='{$detail}',`status`= '{$_POST['status']}' WHERE `id`={$id}";

    $db = new db;

    if($db->query($sql)){
        echo "<script>alert(\"Update Successfully!\")</script>";
        echo "<script>location.href=\"./userPet.php\"</script>";
    }else{
        echo $sql;
        // echo $conn->error;
    }

}