<?php
require_once '../view/conn/head.php';
?>

<body>
<?php
require_once '../view/conn/body.php';
?>

<script>
    function handleChat(id){
        window.location.href = `./chats.php?id=${id}`
    }
</script>

<?php

$id = $_GET['id'];
$sql = "SELECT * FROM `pets` WHERE `id`={$id}";

require_once '../config/db.php';

$db = new db;

$res = $db->find($sql);

if($res){
    $owner = $res['owner'];
    $sql = "SELECT * FROM `users` WHERE `username`='{$owner}'";
    $user = $db->find($sql);
    if(!$user){
        $oid = -1;
    }else{
        $oid = $user['id'];
    }
}else{
    $oid = -1;
}
echo "<div class=\"detail-content\">
<div class=\"row\">
<div class=\"col-md-6\">
    <img src=\"../images/{$res['img_url']}\" alt=\"\" style=\"width:100%;\" />
</div>
<div class=\"col-md-6 detail\">
    <h2>{$res['name']}</h2>
    <p>Type:  {$res['type']}</p>
    <p>Color:  {$res['color']}</p>
    <p>Age:  {$res['age']}</p>
    <p>Sex:  {$res['sex']}</p>
    <p>Owner:  {$res['owner']}</p>
    <p>Phone:  {$res['phone']}</p>
</div>
</div>
<p style=\"font-size:larger;margin-top:10px;\">&nbsp;&nbsp;&nbsp;&nbsp;{$res['detail']}</p>
<button class=\"btn btn-primary\" onclick=\"handleChat({$oid})\">Chat</button>
<hr>";

if(isset($_COOKIE['user'])){


    echo "<form action=\"../php/comment.php\" method=\"POST\">
        <div class=\"row\">
              <div class=\"col-md-8\">
                 <input type=\"text\" name=\"comment\" placeholder=\"Comments here\" class=\"form-control\"/>
              </div>
              <input type=\"hidden\" name=\"pid\" value=\"{$id}\" />
              
              <div class=\"col-md-4\">
                <input type=\"submit\"  value=\"Comment\" class=\"btn btn-primary\" />
              </div>
        </div>

</form>
<hr>
";
}else{
    echo "<form action=\"\">
          <div class=\"row\">
                <div class=\"col-md-8\">
                      <input type=\"text\" name=\"comment\" placeholder=\"Place Login First for comment\" class=\"form-control\"/>
                </div>

                <div class=\"col-md-4\">
                      <input type=\"submit\"  value=\"Comment\" class=\"btn btn-primary\" disabled />
                </div>
          </div>

</form>
<hr>
";
}


$sql = "SELECT * FROM `comments` WHERE `pid`={$id}";
$r = $db->select($sql);
if($r){
    foreach ($r as $i){
        if($_COOKIE['user'] == $i['user']){
            $cid = $i['cid'];
            echo " <div class=\"row\" style=\"margin-top:20px;\">
                    <div class=\"col-md-2\">
                              <p class=\"comment-user\">{$i['user']}:</p>
                    </div>
                    <div class=\"col-md-7\">
                              <p class=\"comment-content\">{$i['content']}</p>
                    </div>
                    <div class=\"col-md-3\">
                              <p class=\"comment-date\">{$i['date']}</p>
                              <a class=\"delete-comment\" href=\"./deleteComment.php?id={$cid}\">Delete</a>
                    </div>
            </div>
          
            <form action=\"\" class=\"hidden\">
                <div class=\"row\">
                      <div class=\"col-md-8\">
                                <input type=\"text\" name=\"comment\" placeholder=\"Comments here\" class=\"form-control\"/>
                      </div>
    
                      <div class=\"col-md-4\">
                                <input type=\"submit\" value=\"Comment\" class=\"btn btn-primary\" />
                      </div>
                </div>

            </form>
            <hr>";
        }else{
            echo "<div class=\"row\" style=\"margin-top:20px;\">
                    <div class=\"col-md-2\">
                              <p class=\"comment-user\">{$i['user']}:</p>
                    </div>
                    <div class=\"col-md-7\">
                              <p class=\"comment-content\">{$i['content']}</p>
                    </div>
                    <div class=\"col-md-3\">
                              <p class=\"comment-date\">{$i['date']}</p>
        
                    </div>
            </div>
            <form action=\"\" class=\"hidden\">
                <div class=\"row\">
                      <div class=\"col-md-8\">
                                <input type=\"text\" name=\"comment\" placeholder=\"Comments here\" class=\"form-control\"/>
                      </div>

                      <div class=\"col-md-4\">
                                <input type=\"submit\" value=\"Comment\" class=\"btn btn-primary\" />
                      </div>
                </div>
    
            </form>
            <hr>";
        }
    }
}
echo "</div>";


?>




</body>
</html>
