<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){


    $type  = $_POST['type'];
    $color = $_POST['color'];
    $sex   = $_POST['sex'];
    $status = $_POST['status'];
    $price = $_POST['price'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $neutered = $_POST['neutered'];
    $age = $_POST['age'];

    $sql = "SELECT * FROM `pets` WHERE ";
    if($type){
        $sql.="`type` LIKE '%{$type}%' ";
    }
    if($color){
        $sql.="and `color` LIKE '%{$color}%' ";
    }

    require_once '../config/db.php';

    $db = new db;

    $res = $db->select($sql);

    if($res){
        $sum = 0;
        $max_weight = -1;
        $min_weight = 1000000000;
        $list_weight = [];
        //echo($sum);
        if((float)$weight > $max_weight){
            $max_weight = (float)$weight;
        }
        if((float)$weight < $min_weight){
            $min_weight = (float)$weight;
        }
        foreach($res as $m){
            $cur_weight = (float)$m['weight'];
            if($cur_weight > $max_weight){
                $max_weight = $cur_weight;
            }
            if($cur_weight < $min_weight){
                $min_weight = $cur_weight;
            }
        }
        //echo($min_weight);
        $weight_range = $max_weight - $min_weight + 0.01;
        //echo($optimized_weight);
        $optimized_weight = ($weight - $min_weight)/($weight_range);
        //echo($optimized_weight);
        $list_weight = [];
        foreach($res as $m2){
            //echo($m2['id']);
            $cur_weight2 = (float)$m2['weight'];
            $num_weight = ($cur_weight2 - $min_weight)/$weight_range;
            array_push($list_weight,$num_weight);
        }
        $w_op_list = [];
        foreach($list_weight as $m3){
            $num_weight2 = $m3/($optimized_weight + 1);
            if($num_weight2 > 1){
                $num_weight2 = $num_weight2 - 1;
            }
            array_push($w_op_list,$num_weight2);
        }
        $list_sex = [];
        if($sex == 'female' || $sex == 'Female'){
            foreach($res as $s){
                if($s['sex'] == 'female'|| $s['sex']== 'Female'){
                    array_push($list_sex, 1);
                }
                else{
                    array_push($list_sex, 0);
                }
            }
        }
        else{
            foreach($res as $s){
                if($s['sex'] == 'male'|| $s['sex']== 'Male'){
                    array_push($list_sex, 1);
                }
                else{
                    array_push($list_sex, 0);
                }
            }
        }

        $list_neutered = [];
        if($neutered == 'true'){
            foreach($res as $e){
                if($e['neutered'] == 'true'){
                    array_push($list_neutered, 1);
                }
                else{
                    array_push($list_neutered, 0);
                }
            }
        }
        else{
            foreach($res as $e){
                if($e['neutered'] == 'false'){
                    array_push($list_sex, 1);
                }
                else{
                    array_push($list_sex, 0);
                }
            }
        }
    
        $max_age = -1;
        $min_age = 100;
        $list_age = [];
        //echo($sum);
        if((float)$age > $max_age){
            $max_age = $age;
        }
        if((float)$age < $min_age){
            $min_age = $age;
        }
        foreach($res as $a){
            $cur_age = (float)$a['age'];
            if($cur_age > (float)$max_age){
                $max_age = $cur_age;
            }
            if($cur_age < (float)$min_age){
                $min_age = $cur_age;
            }
        }
        //echo($min_weight);
        $age_range = $max_age - $min_age + 0.01;
        //echo($optimized_weight);
        $optimized_age = ($age - $min_age)/($age_range);
        //echo($optimized_weight);
        $list_age = [];
        foreach($res as $a2){
            //echo($m2['id']);
            $cur_age2 = (float)$a2['age'];
            $num_age = ($cur_age2 - $min_age)/$age_range;
            array_push($list_age,$num_age);
        }
        $a_op_list = [];
        foreach($list_age as $a3){
            $num_age2 = $a3/($optimized_age + 0.01);
            if($num_age2 > 1){
                $num_age2 = $num_age2 - 1;
            }
            array_push($a_op_list,$num_age2);
        }
            
        $max_height = -1;
        $min_height = 1000;
        $list_height = [];
        //echo($sum);
        if((float)$height > $max_height){
            $max_height = $height;
        }
        if((float)$height < $min_height){
            $min_height = $height;
        }
        foreach($res as $h){
            $cur_height = (float)$h['height'];
            if($cur_height > (float)$max_height){
                $max_height = $cur_height;
            }
            if($cur_height < (float)$min_height){
                $min_height = $cur_height;
            }
        }
        //echo($min_weight);
        $height_range = $max_height - $min_height + 0.01;
        //echo($optimized_weight);
        $optimized_height = ($height - $min_height)/($height_range);
        //echo($optimized_weight);
        $list_height = [];
        foreach($res as $h2){
            //echo($m2['id']);
            $cur_height2 = (float)$h2['height'];
            $num_height = ($cur_height2 - $min_height)/$height_range;
            array_push($list_height,$num_height);
        }
        $h_op_list = [];
        foreach($list_age as $h3){
            $num_height2 = $h3/($optimized_height + 0.01);
            if($num_height2 > 1){
                $num_height2 = $num_height2 - 1;
            }
            array_push($h_op_list,$num_height2);
        }

        $max_price = -1;
        $min_price = 100000000;
        $list_price = [];
        //echo($sum);
        if((float)$price > $max_price){
            $max_price = $price;
        }
        if((float)$price < $min_price){
            $min_price = $price;
        }
        foreach($res as $p){
            $cur_price = (float)$p['price'];
            if($cur_price > (float)$max_price){
                $max_price = $cur_price;
            }
            if($cur_price < (float)$min_price){
                $min_price = $cur_price;
            }
        }
        //echo($min_weight);
        $price_range = $max_price - $min_price + 0.01;
        //echo($optimized_weight);
        $optimized_price = ($price - $min_price)/($price_range);
        //echo($optimized_weight);
        $list_price = [];
        foreach($res as $p2){
            //echo($m2['id']);
            $cur_price2 = (float)$p2['price'];
            $num_price = ($cur_price2 - $min_price)/$price_range;
            array_push($list_price,$num_price);
        }
        $p_op_list = [];
        foreach($list_age as $p3){
            $num_price2 = $p3/($optimized_price + 0.01);
            if($num_price2 > 1){
                $num_price2 = $num_price2 - 1;
            }
            array_push($p_op_list,$num_price2);
        }
        $cur_x = 0;
        $cur_ans = 100;
        //echo($w_op_list[0]);
        //echo($w_op_list[1]);
        $x_list = [];
        for($x = 0; $x < count($w_op_list);$x++){
            $input_value = $w_op_list[$x] + $list_neutered[$x] + $list_sex[$x] + $p_op_list[$x] + $a_op_list[$x] + $h_op_list[$x];
            if($input_value == $cur_ans){
                array_push($x_list,$x);
            }
            else if($input_value < $cur_ans){
                $cur_ans = $input_value;
                $x_list = [];
                array_push($x_list,$x);
            }
        }
        $input_x = $x_list[0];
        $op_id = $res[$input_x];
        echo "<script>location.href=\"./getDetail.php?id={$op_id['id']}\"</script>";
    }
        // foreach($x_list as $input){
        //     $op_id = $res[$input];
        //     echo "<script>location.href=\"./getDetail.php?id={$op_id['id']}\"</script>";
        // }
       // foreach ($res as $i){
           // echo($i['weight']);
       //echo "<script>location.href=\"./getDetail.php?id={$i['id']}\"</script>";
     // }

//        echo json_encode(array('statue' => 1, 'data' => $res));
//        die;
   // }
    else{
        echo "<script>alert('No Pet Found, please add more information');window.history.back(-1);</script>";
    }

    echo json_encode(array('statue' => 1, 'data' => $res));


}

?>


<?php
require_once '../view/conn/head.php';
?>

<body>
<?php
require_once '../view/conn/body.php';
?>


    <form class="form" action="./match.php" method="post">
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Type</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputPassword" name="type" required>
                <input type="hidden" name="status" value="<?php echo $_GET['status']; ?>">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Color</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputPassword" name="color">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Sex</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputPassword" name="sex">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Age</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputPassword" name="age">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Price</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputPassword" name="price">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Height</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputPassword" name="height">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Weight</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputPassword" name="weight">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Neutered</label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name="neutered">
                    <option>SELECT</option>
                    <option selected value="true">true</option>
                    <option value="false">false</option>
                </select>
            </div>
        </div>
        <input type="submit" class="btn btn-primary mb-3 " value="Submit" id="dd">

    </form>
<div id="petlist"></div>

<script src="../templates/ShowDetail.js"></script>
<script src="../templates/ShowPet.js"></script>
<script src="../templates/SearchBar.js"></script>

<script type="text/javascript">
//
//    $(document).ready(function() {
//        $('#dd').click(function (e) {
//            e.preventDefault();
//            var t = $('form').serializeArray();
//            d = {};
//            $.each(t, function () {
//                d[this.name] = this.value;
//            });
//            $.post('./match.php', d, function (res) {
//
//                var cc = JSON.parse(res);
//                console.log(cc.data);
//                $("#petlist").empty();
//
//                $("#petlist").append(`${ShowPet(cc.data)}`);
//            })
//        })
//    })
</script>
</body>
</html>