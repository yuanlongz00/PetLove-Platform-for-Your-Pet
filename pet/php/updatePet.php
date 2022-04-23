<?php
require_once '../view/conn/head.php';
?>
    <body>
<?php
require_once '../view/conn/body.php';
?>

<?php

    include_once '../config/db.php';
    $id = (int)$_GET['id'];
    $sql = "SELECT * FROM `pets` WHERE `id`={$id}";
    $db = new db;
    $r = $db->find($sql);
    if($r){
        $name = $r['name'];
        $type = $r['type'];
        $age = $r['age'];
        $color = $r['color'];
        $phone = $r['phone'];
        $detail = $r['detail'];
    }

?>
<form action="./update.php" method="POST" class="form-pet" enctype="multipart/form-data">
    <div class="row mb-3">
        <label for="inputEmail3" class="col-sm-3 col-form-label">Name</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="inputEmail3" name="name" value="<?php echo $name;?>">
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputPassword3" class="col-sm-3 col-form-label">Type</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="inputPassword3" name="type" value="<?php echo $type;?>">
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputPassword3" class="col-sm-3 col-form-label">Sex</label>
        <div class="col-sm-9">
            <select class="form-select" aria-label="Default select example" name="sex">
                <option selected value="Male">Male</option>
                <option value="Female">Female</option>

            </select>
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputPassword3" class="col-sm-3 col-form-label">age</label>
        <div class="col-sm-9">

            <input type="text" class="form-control" id="inputPassword3" name="age" value="<?php echo $age;?>">
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputPassword3" class="col-sm-3 col-form-label">color</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="inputPassword3" name="color" value="<?php echo $color;?>">
        </div>
    </div>
    <?php

    require_once '../config/db.php';


    $user =  $_COOKIE['user'];
    $sql = "select * from users where username='{$user}'";
    $db = new db;
    $r = $db->find($sql);
    if($r){

        if($r['flag'] == 1){
            echo "<div class=\"row mb-3\">
                        <label for=\"inputPassword3\" class=\"col-sm-3 col-form-label\">Owner</label>
                        <div class=\"col-sm-9\">
                            <input type=\"text\" class=\"form-control\" id=\"inputPassword3\" value=\"{$user}\" name=\"owner\" >
                        </div>
                    </div>";
        }else{
            echo "<div class=\"row mb-3\">
                    <label for=\"inputPassword3\" class=\"col-sm-3 col-form-label\">Owner</label>
                    <div class=\"col-sm-9\">
                        <input type=\"text\" class=\"form-control\" id=\"inputPassword3\" value=\"{$user}\" name=\"owner\" disabled readonly>
                    </div>
                </div>";
        }
    }
    ?>

    <div class="row mb-3">
        <label for="inputPassword3" class="col-sm-3 col-form-label">Phone</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="inputPassword3" name="phone" value="<?php echo $phone;?>">
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputPassword3" class="col-sm-3 col-form-label">Description</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="inputPassword3" name="detail" value="<?php echo $detail;?>">
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputPassword3" class="col-sm-3 col-form-label">shop/dating</label>
        <div class="col-sm-9">
            <select class="form-select" aria-label="Default select example" name="status">
                <option selected value="1">shop</option>
                <option value="2">dating</option>

            </select>
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputPassword3" class="col-sm-3 col-form-label">image</label>
        <div class="col-sm-9">
            <input type="file" class="form-control" id="inputPassword3" name="img">
        </div>
    </div>
    <input type="text" value="<?php echo $id;?>" name="id" style="display:none">
    <button type="submit" class="btn btn-primary">Update</button>
</form>


</body>
</html>
