<?php

require_once '../view/conn/head.php';

?>
<script src="https://cdn.ckeditor.com/ckeditor5/33.0.0/classic/ckeditor.js"></script>
    <script type="text/javascript" >

        function handleComment(){

            $.post('./postComment.php',{content:window.editor.getData(),id:<?php echo  $_GET['id'];?>},function (e){

                var d = JSON.parse(e);

                if(d.code !== 200){
                    layer.msg(d.msg);
                    return false;
                }else{
                    layer.msg(d.msg);
                    location.reload();
                }

            })
        }
    </script>
<body>
<?php
require_once '../view/conn/body.php';
?>

<div class="post-content">


    <?php

        include '../config/db.php';

        $sql = "SELECT * FROM `posts` WHERE `id`={$_GET['id']}";

        $db = new db;

        $res = $db->find($sql);

        echo "<h1 style=\"text-align:center\">{$res['title']}</h1>
            <hr>
            <p style=\"text-align:center\">Author: {$res['user']}&nbsp;&nbsp;&nbsp;&nbsp;Date: {$res['date']}</p>
            {$res['content']}
        ";

    ?>
    <hr>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="margin-bottom: 20px;">comment</button>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Comment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="editor"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="handleComment()">Comment</button>
                </div>
            </div>
        </div>
    </div>
    <?php

        $sql1 = "SELECT * FROM `postcomments` WHERE `postid`={$_GET['id']}";
        $r = $db->select($sql1);

        if($r){

            foreach ($r as $i){

                echo "<div class=\"card\">
                <div class=\"row\">
                    <div class=\"col-sm-1\">
                        <p style=\"margin-top:10px;color:rgb(90, 200, 255)\">{$i['user']}:</p>
                    </div>
                    <div class=\"col-sm-11\">
                        <div class=\"card-body\">
                            {$i['content']}
                        </div>
                        <div class=\"card-footer text-end\">
                        <p style=\"display:inline-block;font-size:small;color:rgb(117, 117, 117)\">{$i['date']}</p>
                        </div>
                    </div>
                </div>
            </div>";
            }
        }

    ?>
</div>


<script>

    ClassicEditor.create( document.querySelector( '#editor' ),{
            ckfinder: {
                uploadUrl: '../php/upload.php',
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
