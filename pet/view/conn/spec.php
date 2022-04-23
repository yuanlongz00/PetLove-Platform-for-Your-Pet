<?php

//echo "<div class=\"card\">
//                    <div class=\"row\">
//                        <div class=\"col-sm-1\">
//                          <img src=\"../images/{$dr['portrait']}\" onclick=\"jumpUser({$i['uid']})\" class=\"card-portrait\" />
//                        </div>
//                        <div class=\"col-sm-11\">
//                            <div class=\"card-body\">
//                                <h3 class=\"card-title\" onclick=\"jumpDetail({$i['id']})\">{$i['title']}</h3>
//                                <p class=\"card-text\" onclick=\"jumpDetail({$i['id']})\">{$i['discript']}</p>";
//if($dr['flag'] > 0){
//    echo "<img src=\"../images/{$dr['portrait']}\" onclick=\"jumpDetail({$i['id']})\" style=\"height:200px\" \>";
//}
//echo "</div>
//                            <div class=\"card-footer text-end\">
//                                <p onclick=\"handleLike({$i['id']})\" style=\"display:inline-block;margin-right:30px;color:rgb(117, 117, 117)\"><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-heart\" viewBox=\"0 0 16 16\">
//                                <path d=\"m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z\"/>
//                              </svg>&nbsp;like</p>
//                                <p style=\"display:inline-block;font-size:small;color:rgb(117, 117, 117)\">{$i['date']}</p>
//                            </div>
//                        </div>
//                    </div>
//     </div>";
foreach ($arr['data'] as $i){
    $d = "select * from users where username= '{$i['user']}'";
    $dr = $db->find($d);
    $f = "select * from `like` where `uid`={$i['id']} and `user_id`={$_COOKIE['uid']} ";;

    $g = $db->find($f);

    echo "<div class=\"card\">
            <div class=\"row\">
                <div class=\"col-sm-1\">
                  <img src=\"../images/{$dr['portrait']}\" onclick=\"jumpUser({$i['uid']})\" class=\"card-portrait\" />
                </div>
                <div class=\"col-sm-11\">
                    <div class=\"card-body\">
                        <h3 class=\"card-title\" onclick=\"jumpDetail({$i['id']})\">{$i['title']}</h3>
                        <p class=\"card-text\" onclick=\"jumpDetail({$i['id']})\">{$i['discript']}</p>";
    if($dr['flag'] > 0){
        echo "<img src=\"../images/{$dr['portrait']}\" onclick=\"jumpDetail({$i['id']})\" style=\"height:200px\" \>";
    }
    if($g){
        if($g['spot'] == 1){
            echo "</div>
            <div class=\"card-footer text-end\">
                <p onclick=\"handleLike({$i['id']})\" style=\"display:inline-block;margin-right:30px;color:rgb(81, 200, 255)\">
                <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-heart-fill\" viewBox=\"0 0 16 16\">
                  <path fill-rule=\"evenodd\" d=\"M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z\"/>
                  </svg>&nbsp;like   {$i['like']}</p>
                <p style=\"display:inline-block;font-size:small;color:rgb(81, 200, 255)\">{$i['date']}</p>
            </div>
        </div>
    </div>
</div>";

        }else{
            echo "</div>
            <div class=\"card-footer text-end\">
                <p onclick=\"handleLike({$i['id']})\" style=\"display:inline-block;margin-right:30px;color:rgb(117, 117, 117)\">
                <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-heart\" viewBox=\"0 0 16 16\">
                <path d=\"m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z\"/>
              </svg>&nbsp;like</p>
                <p style=\"display:inline-block;font-size:small;color:rgb(117, 117, 117)\">{$i['date']}</p>
            </div>
        </div>
    </div>
</div>";
        }
    }else{
        echo "</div>
            <div class=\"card-footer text-end\">
                <p onclick=\"handleLike({$i['id']})\" style=\"display:inline-block;margin-right:30px;color:rgb(117, 117, 117)\">
                <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-heart\" viewBox=\"0 0 16 16\">
                <path d=\"m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z\"/>
              </svg>&nbsp;like</p>
                <p style=\"display:inline-block;font-size:small;color:rgb(117, 117, 117)\">{$i['date']}</p>
            </div>
        </div>
    </div>
</div>";
    }

}