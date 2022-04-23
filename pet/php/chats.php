<?php


if(count($_GET) !=0 && $_GET['id']!=-1){

    require_once '../config/db.php';
    $user1id = $_COOKIE['uid'];
    $user2id = $_GET['uid'];
    $sql = "SELECT * FROM `userFriend` WHERE `user1id`={$user1id} and `user2id`={$user2id}";
    $time = date('Y-m-d h:i:s', time());
    $db = new db;
    $r = $db->select($sql);
    if(!$r){
        $user1name = $_COOKIE['user'];
        $sql1 = "SELECT * FROM `users` WHERE `id`=$user2id";
        $rr = $db->find( $sql1);
        $user2name = $rr['username'];
        $sql2 = "INSERT INTO `userFriend`(`user1id`, `user2id`, `user1name`, `user2name`, `lastContact`)VALUES
                  ({$user1id}, {$user2id}, '{$user1name}','{$user2name}','{$time}'),
                  ({$user2id}, {$user1id}, '{$user2name}','{$user1name}','{$time}')";
        $db->query($sql2);
    }else{
        $sql3 = "UPDATE `userFriend` SET `lastContact`='{$time}' WHERE `user1id`={$user1id} and `user2id`={$user2id}";
        $sql4 = "UPDATE `userFriend` SET `lastContact`='{$time}' WHERE `user1id`={$user2id} and `user2id`={$user1id}";
        $db->query($sql3);
        $db->query($sql4);
    }
}
?>

<?php
require_once '../view/conn/head.php';
?>
<style>
    .ck-content{
        height: 100px;
        overflow-y: scroll;
    }
</style>

<script type="text/javascript">

    var friends = []
    var chats = []
    var textList = []
    var chatUser = {}

    $.getJSON('./getChatInfo.php').then((res)=>{
        console.log('11111111111111111',res);
        friends = res.data.friends;
        chats = res.data.chat;
        renderList(friends)
        if(friends.length !== 0){
            chatUser = friends[0];
            renderText(chats, chatUser);
        }

    })

    function renderList(friends){
        let str = ''
        friends.map((item)=>{
            str += `<div class=\"userList\" onclick="changeText(${item.user2id})">
        ${item.user2name}
        <p class=\"contact\">${item.lastContact}</p></div>`})
        document.getElementById("left-bar").innerHTML = str;
    }

    function renderText(chat, user){
        str = ''
        if(chat.length !== 0){
            chat.map((item)=>{
                if(item.user1name == "<?php echo $_COOKIE['user'];?>" && item.user2name == chatUser.user2name){
                    str+=`<div class="user1text">
                  <span style="font-size:smaller;">${item.user1name}</span>
                  <span style="font-size:smaller;color:rgb(175, 175, 175)">${item.date}</span>
                  <div class="cart-content">${item.content}</div>
                  </div>`;
                }else if(item.user2name == "<?php echo $_COOKIE['user'];?>" && item.user1name == chatUser.user2name){
                    str+=`<div class="user2text">
                  <span style="font-size:smaller">${item.user1name}</span>
                  <span style="font-size:smaller;color:rgb(175, 175, 175)">${item.date}</span>
                  <div class="cart-content">${item.content}</div>
                  </div>`;
                }
            })
        }
        console.log(str);

        document.getElementById("record").innerHTML = str;
    }

    function sendRecord(){

        $.post('./sendRecord.php',{user2id:chatUser.user2id,user2name:chatUser.user2name,content:window.editor.getData()},function (e){

            var d = JSON.parse(e);
            if(d.code === 200){
                location.reload()
            }
            return false;
        })
    }

    function changeText(id){
        console.log("change");
        let obj = {}
        friends.map((item)=>{
            if(item.user2id == id){
                chatUser = item
            }
        })
        renderText(chats, chatUser)
    }

</script>

<body>
<?php
require_once '../view/conn/body.php';
?>

<h1 style="text-align: center;">Chats</h1>
<div class="window">
    <div class="left-bar" id="left-bar"></div>
    <div class="right">
        <div class="record" id="record"></div>
        <div class="text-area" id="editor"></div>
        <button class="btn btn-primary" onclick="sendRecord()">Send</button>
    </div>
</div>
<script type="text/javascript">

    ClassicEditor .create( document.querySelector( '#editor' ),{
            ckfinder: {
                uploadUrl: './upload.php',
            }
        } ).then((editor)=>{
        window.editor = editor
    })
        .catch( error => {
            console.error( error );
        } );
</script>


</body>
</html>
