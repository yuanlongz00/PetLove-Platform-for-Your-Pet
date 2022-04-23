<?php


if($_SERVER['REQUEST_METHOD'] === 'POST'){


    if(!$_POST['Username']){
        echo "<script>alert(\"Username is wrong\")</script>";
        echo "<script>location.href=\"../php/login.php\"</script>";
        die;
    }
    if(!$_POST['Password']){
        echo "<script>alert(\"Password is wrong\")</script>";
        echo "<script>location.href=\"../php/login.php\"</script>";
        die;
    }

    require_once 'config/db.php';

    $db = new db;
    $sql = "SELECT * FROM `users` WHERE `username`='{$_POST['Username']}' and `psd`='{$_POST['Password']}'";

    $res = $db->find($sql);

    $flag = $res['flag'] == 1 ? 1 : 2;

    if(!$res){

        echo "<script>alert(\"Username or password is wrong\")</script>";
        echo "<script>location.href=\"php/login.php\"</script>";
        die;
    }else{
        setcookie('user', $res['username']);
        setcookie('uid', $res['id']);
        setcookie('flag',$flag);
        if($res['flag'] == 1){
            echo "<script>alert(\"Manager login successfully!\")</script>";
            echo "<script>location.href=\"php/manager.php\"</script>";
        }else{
            echo "<script>alert(\"Login successfully!\")</script>";
            echo "<script>location.href=\"/index.php\"</script>";
        }

    }
}

