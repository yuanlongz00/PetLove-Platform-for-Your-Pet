<?php
require_once '../view/conn/head.php';
?>
<body>
<?php
require_once '../view/conn/body.php';
?>
<form action="./insert.php" method="POST" class="form-pet" enctype="multipart/form-data">
    <div class="row mb-3">
        <label for="inputEmail3" class="col-sm-3 col-form-label">Name</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="inputEmail3" name="name">
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputPassword3" class="col-sm-3 col-form-label">Type</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="inputPassword3" name="type">
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputPassword3" class="col-sm-3 col-form-label">Sex</label>
        <div class="col-sm-9">
            <select class="form-select" aria-label="Default select example" name="sex">
                <option selected value="Male">male</option>
                <option value="Female">female</option>
            </select>
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputPassword3" class="col-sm-3 col-form-label">age</label>
        <div class="col-sm-9">

            <input type="text" class="form-control" id="inputPassword3" name="age">
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputPassword3" class="col-sm-3 col-form-label">color</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="inputPassword3" name="color">
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
            <input type="text" class="form-control" id="inputPassword3" name="phone">
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputPassword3" class="col-sm-3 col-form-label">Description</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="inputPassword3" name="detail">
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
        <label for="inputPassword3" class="col-sm-3 col-form-label">Price</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="price" name="price">
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputPassword3" class="col-sm-3 col-form-label">Height</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="height" name="height">
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputPassword3" class="col-sm-3 col-form-label">Weight</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="weight" name="weight">
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputPassword3" class="col-sm-3 col-form-label">neutered/spayed</label>
        <div class="col-sm-9">
            <select class="form-select" aria-label="Default select example" name="neutered">
                <option selected value="true">true</option>
                <option value="false">false</option>
            </select>
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputPassword3" class="col-sm-3 col-form-label">image</label>
        <div class="col-sm-9">
            <input type="file" class="form-control" id="inputPassword3" name="img">
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Insert</button>
</form>
</body>
</html>