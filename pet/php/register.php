<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){


    $data = $_POST;
    if(!$data['uname']){
        echo "<script>alert(\"Username is wrong\")</script>";
        echo "<script>location.href=\"../php/register.php\"</script>";
        die;
    }
    if(!$data['psd']){
        echo "<script>alert(\"Password is wrong\")</script>";
        echo "<script>location.href=\"../php/register.php\"</script>";
        die;
    }

    require_once '../config/db.php';

    $db = new db;
    $sql = "SELECT * FROM `users` where username='{$data['uname']}'";
    $r = $db->find($sql);
    if($r){
        echo "<script>alert(\"User name already exists\")</script>";
        echo "<script>location.href=\"../php/register.php\"</script>";
        die;
    }

    $png = '../images/'.date('Ymd',time()).'_'.rand(1111,9999).'.png';

    if(!move_uploaded_file($_FILES['img']['tmp_name'],  $png)){
        echo "fail";
    }

    $sql1 = "INSERT INTO `users`(`username`, `psd`, `flag`, `tel`, `portrait`)VALUES('{$data['uname']}', '{$data['psd']}', 0, '{$data['tel']}', '{$png}')";

    if($db->query($sql1)){
        echo "<script>alert(\"Register successfully!\")</script>";
        echo "<script>location.href=\"/index.php\"</script>";
    }else{
        echo "<script>alert(\"Register Failed!\")</script>";
        echo "<script>location.href=\"../php/register.php\"</script>";
    }

}

?>



<?php

require_once '../view/conn/head.php';

?>

<body>
<?php
require_once '../view/conn/body.php';
?>
<form action="../php/register.php" method="post" class="form" enctype="multipart/form-data">

    <div class="mb-3 row">
        <label for="uname" class="col-sm-2 col-form-label">Username</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="uname" name="uname">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="psd" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="psd" name="psd">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="tel" class="col-sm-2 col-form-label">Tel</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="tel" name="tel">
        </div>
    </div>
    <div class="row mb-3">
        <label for="img" class="col-sm-3 col-form-label">Portrait</label>
        <div class="col-sm-9">
            <input type="file" class="form-control" id="img" name="img">
        </div>
    </div>
    <input type="submit" class="btn btn-primary mb-3" value="Submit">

</form>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>