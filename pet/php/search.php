<?php

$key = explode(',', $_GET['keyword']) ;

$sql = "SELECT * FROM `pets` WHERE "   ;


$type = ['dog','Dog','cat','Cat'];
$color = ['black','white','golden','yellow','brown'];
$sex = ['female','Female','Male','male'];
$find = false;
$check = '';
// foreach($key as $m){
//     if(in_array($m,$type)){
//         $sql.= " `type` LIKE '%{$m}%'";
//         $find = true;
//         $check = 'type';
//         break;
//     }
//     else if(in_array($m,$sex)){
//         $sql.= " `sex` LIKE '%{$m}%'";
//         $find = true;
//         $check = 'sex';
//         break;
//     }
//     else if(in_array($m,$color)){
//         $sql.= " `color` LIKE '%{$m}%'";
//         $find = true;
//         $check = 'color';
//         break;
//     }
// }
// if($find == false){
//     //echo "<script>alert(\"invalid input\")</script>";
// }
// echo($find);
// foreach ($key as $i){
//     if($check != 'type' && in_array($i,$type)){
//         $sql.= "and `type` LIKE '%{$i}%'";
//         $find = true;
//     }
//     else if($check != 'sex' && in_array($i,$sex)){
//         $sql.= "and `sex` LIKE '%{$i}%'";
//         $find = true;
//     }
//     else if( $check != 'color' && in_array($i,$color)){
//             $sql.=" and `color` LIKE '%{$i}%'";
//     }
//     else{
//         if(find == false){
//           //  echo "<script>alert(\"invalid input\")</script>";
//         }
//         $sql.=" and `name` LIKE '%{$i}%'";
//         $find = false;
//     }
// }

foreach ($key as $i){
    if(in_array($i,$type)){
        $sql.= " `type` LIKE '%{$i}%'";
        $find = true;
    }
    else if(in_array($i,$sex)){
        $sql.= " `sex` LIKE '%{$i}%'";
        $find = true;
    }
    else if(in_array($i,$color)){
        if($sql == "SELECT * FROM `pets` WHERE  `type` LIKE '%Dog%'" || $sql == "SELECT * FROM `pets` WHERE  `type` LIKE '%dog%'"){
            $sql.=" and `color` LIKE '%{$i}%'";
        }
        else if($sql == "SELECT * FROM `pets` WHERE  `type` LIKE '%Cat%'" || $sql == "SELECT * FROM `pets` WHERE  `type` LIKE '%cat%'"){
            $sql.=" and `color` LIKE '%{$i}%'";
        }
        else{
            $sql.=" `color` LIKE '%{$i}%'";
        }
    }
    else{
        $sql.=" `name` LIKE '%{$i}%' or `type`='{$i}' or `detail` LIKE '%{$i}%' or `color`='{$i}'";
    }

}

require_once '../config/db.php';

$db = new db;

$res = $db->select($sql);
//echo($res);
echo json_encode(array('statue' => 1, 'data' => $res));