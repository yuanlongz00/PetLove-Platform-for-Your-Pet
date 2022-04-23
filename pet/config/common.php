<?php



function getList($sql,$page,$sort)
{


    require_once 'db.php';

    $db = new db;
    $res = $db->select($sql);

    $total = count($res);
    $num = 5;
    $pageNum = ceil($total/$num);

    if($page < 1){
        $page = 1;
    }

    if($page > $pageNum){
        $page = $pageNum;
    }
    if($sort == 'time'){

        $sql.= 'ORDER BY `date` DESC ';
    }

    if($sort == 'like'){
        $sql.= 'ORDER BY `like` DESC ';
    }
    $limit = 'limit  ' . ($page -1) * $num .",$num";
    $s = $sql . $limit;



    return [
        'total' => $total,
        'pageNum' => $pageNum,
        'data' => $db->select($s)
    ];
}

function getSpec()
{


}