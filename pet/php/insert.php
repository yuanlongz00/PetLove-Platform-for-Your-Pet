<?php


if($_SERVER['REQUEST_METHOD'] === 'POST'){

    try{
        require_once '../config/db.php';

        ini_set('display_errors', 'On');
        error_reporting(E_ALL | E_STRICT);

        $name = $_POST['name'];
        $type = $_POST['type'];
        $sex = $_POST['sex'];
        $age = $_POST['age'];
        $color = $_POST['color'];
        $owner = $_COOKIE['user'];
        $phone = $_POST['phone'];
        $detail = $_POST['detail'];
        $status = $_POST['status'];
        $price = (int)$_POST['price'];
        $height = $_POST['height'];
        $weight = $_POST['weight'];
        $neutered = $_POST['neutered'];


        if($_FILES['img']['name']){
            $png = '../images/'.date('Ymd',time()).'_'.rand(1111,9999).'.png';
            if(!move_uploaded_file($_FILES['img']['tmp_name'],  $png)){
                echo "fail";
            }
            $sql = "INSERT INTO `pets`(`name`, `type`, `color`, `age`, `sex`, `owner`, `phone`, `detail`,`img_url`,`status`,`price`,`height`,`weight`,`neutered`)
        VALUES('{$name}','{$type}','{$color}',{$age}, '{$sex}','{$owner}','{$phone}','{$detail}','{$png}','{$status}','{$price}','{$height}','{$weight}','{$neutered}')";
        }else{

            $url = $_FILES['img']['name'];

            $sql = "INSERT INTO `pets`(`name`, `type`, `color`, `age`, `sex`, `owner`, `phone`, `detail`, `img_url`,`status`,`price`,`height`,`weight`,`neutered`)
        VALUES('{$name}', '{$type}', '{$color}', {$age}, '{$sex}', '{$owner}', '{$phone}', '{$detail}', '{$url}',{$status},'{$price}','{$height}','{$weight}','{$neutered}')";
        }

        $db = new db;
        if($db->query($sql)){

            echo "<script>alert(\"Insert Successfully!\")</script>";
            echo "<script>location.href = \"./userPet.php\"</script>";
        }
    } catch (\Exception $e) {
        echo $e;
    }


}