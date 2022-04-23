<?php
require_once '../view/conn/head.php';
?>

<script type="text/javascript">

    function handleLike(id){
        $.getJSON(`../php/forumLike.php?id=${id}&type=1`).then((res)=>{
            if(res.code == 300){
                layer.msg(res.msg);
                location.reload();
            }
            if(res.code == 200){
                layer.msg(res.msg);
                location.reload();
            }
            if(res.code == 400){

                layer.msg(res.msg);
                location.reload();
            }
        })

        // if(event.target.style.color == 'rgb(117, 117, 117)'){
        //     event.target.innerHTML = `<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-heart-fill\" viewBox=\"0 0 16 16\">
        //       <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
        //       </svg>&nbsp;like`
        //     event.target.style.color = 'rgb(81, 200, 255)'
        //     $.getJSON(`../php/forumLike.php?id=${id}&type=1`).then((res)=>{
        //         if(res.code == 300){
        //             layer.msg(res.msg);
        //             location.reload();
        //         }
        //         if(res.code == 200){
        //             layer.msg(res.msg);
        //             location.reload();
        //         }
        //         if(res.code == 400){
        //
        //             layer.msg(res.msg);
        //             location.reload();
        //         }
        //     })
        // }else{
        //     event.target.innerHTML = `<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-heart\" viewBox=\"0 0 16 16\">
        //             <path d=\"m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z\"/>
        //           </svg>&nbsp;like`
        //     event.target.style.color = 'rgb(117, 117, 117)'
        //     $.getJSON(`../php/forumLike.php?id=${id}&type=0`).then((res)=>{
        //         if(res.code == 300){
        //             layer.msg(res.msg);
        //             location.reload();
        //         }
        //         if(res.code == 200){
        //             layer.msg(res.msg);
        //             location.reload();
        //         }
        //         if(res.code == 400){
        //
        //             layer.msg(res.msg);
        //             location.reload();
        //         }
        //     })
        // }
    }

    function jumpDetail(id){
        window.location.href = `../php/postDetail.php?id=${id}`
    }

    function jumpUser(id){
        window.location.href = `../php/userInfo.php?id=${id}`
    }
    function handlePost(){
        <?php
            if(!isset($_COOKIE['user'])){
                echo "alert(\"Please Login First!\");";
                echo "window.location.href=\"../php/login.php\";";
            }else{
                echo "window.location.href=\"../php/editPost.php\"";
            }
        ?>
    }

</script>
<body>
<?php
require_once '../view/conn/body.php';
?>

<style>
    .rowWrapper{
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    #sortSelect{
        width: 100px;
    }
</style>

<div class="forum-content">
    <div class="rowWrapper">
        <button class="btn btn-primary" onclick="handlePost()" style="margin-bottom: 20px;">Post My Forum Posts</button>
        <select id="sortSelect">
            <option value="">sort by</option>
            <option value="time">time</option>
            <option value="like">like</option>
        </select>
    </div>

    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">All</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Photo Sharing</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Experience Sharing</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-3" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Trading</button>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <?php

                require '../config/db.php';
                require '../config/common.php';

                $sql = "SELECT * FROM `posts` ";
                $page = isset($_GET['page']) ? $_GET['page'] : 1;
                $sort = $_GET['sort'];

                $arr = getList($sql,$page,$sort);
                $db = new db;
                require '../view/conn/spec.php';
                require '../view/conn/page.php';
            ?>

        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <?php

                $sql1 = "SELECT * FROM `posts` WHERE `tag`=0 ORDER BY `like` DESC ";
                $page = isset($_GET['page']) ? $_GET['page'] : 1;
                $arr = getList($sql1,$page,$sort);

                require '../view/conn/spec.php';
                require '../view/conn/page.php';
            ?>
        </div>
        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
              <?php

                $sql2 = "SELECT * FROM `posts` WHERE `tag`=1 ORDER BY `like` DESC ";
                $arr = getList($sql2,$page,$sort);

                require '../view/conn/spec.php';
                require '../view/conn/page.php';
              ?>
        </div>
        <div class="tab-pane fade" id="pills-3" role="tabpanel" aria-labelledby="pills-contact-tab">
            <?php

                $sql3 = "SELECT * FROM `posts` WHERE `tag`=2 ORDER BY `like` DESC ";
                $arr = getList($sql3,$page,$sort);
                $db = new db;

                require '../view/conn/spec.php';
                require '../view/conn/page.php';
            ?>
        </div>
    </div>

</div>

<script>
    document.getElementById('sortSelect').onchange=function(){
        location.href="?page=<?php echo $page; ?>&sort="+this.value;
    }
</script>


</body>
</html>
