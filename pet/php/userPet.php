<?php
require_once '../view/conn/head.php';
?>
<script>
    function handleAdd(){
        window.location.href="../php/insertPet.php"
    }

    function handleUpdate(id){
        window.location.href=`./updatePet.php?id=${id}`
    }
    function handleDel(id){
        window.location.href=`./delete.php?id=${id}`
    }
</script>
<body>
<?php
require_once '../view/conn/body.php';
?>

<div class="content">
    <div class="row">
        <div class="col-sm-2">
            <?php
                require '../config/db.php';
                $id  = $_COOKIE['uid'];
                $sql = "SELECT * FROM `users` WHERE `id`={$_COOKIE['uid']}";
                $db = new db;
                $r = $db->find($sql);

                $portrait = $r['portrait'];
                $tel = $r['tel'];

            ?>
            <img src="../images/<?php echo $portrait;?>" alt="" class="card-portrait">
        </div>
        <div class="col-sm-10">
            <h1><?php echo $_COOKIE['user'];?></h1>
            <p>Tel: <?php echo $tel;?></p>
        </div>
    </div>
    <h2>My Pets:</h2>
    <table class="table">
        <tr>
            <th>Name</th>
            <th>Type</th>
            <th>Age</th>
            <th>Detail</th>
            <th>Operate</th>
        </tr>
        <?php

            $user =  $_COOKIE['user'];
            $sql1 = "SELECT * FROM `pets` WHERE `owner`='{$user}'";
            $res = $db->select($sql1);
            if($res){

                foreach ($res as $i){
                    echo "<tr>
                        <td>{$i['name']}</td>
                        <td>{$i['type']}</td>
                        <td>{$i['age']}</td>
                        <td><a href=\"./getDetail.php?id={$i['id']}\">{$i['name']}</a></td>
                        <td><button class=\"btn btn-outline-primary btn-sm\" onclick=\"handleUpdate({$i['id']})\"style=\"margin-right:20px\" >Update</button><button class=\"btn btn-sm btn-outline-danger\" onclick=\"handleDel({$i['id']})\">Delete</button></td>
                    </tr>";
                }

            }
        ?>
    </table>
    <button class="btn btn-primary" onclick="handleAdd()">Add pet</button>
</div>


</body>
</html>