<?php
require_once '../view/conn/head.php';
?>
<body>
<?php
require_once '../view/conn/body.php';
?>

<?php

    require_once  '../config/db.php';
    $id  = $_GET['id'];
    $sql = "SELECT * FROM `posts` WHERE `id`={$id}";
    $db = new db;
    $res = $db->find($sql);
    $title = $res['title'];
    $des = $res['discript'];
    $content = $res['content'];

?>
<div class="post-form" >
    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Title</label>
        <div class="col-sm-10">
            <input type="text" class="form-control"  name="title" id="title" value="<?php echo $title;?>">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="desc" name="desc" value="<?php echo $des;?>">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Type</label>
        <div class="col-sm-10">
            <select class="form-select" aria-label="Default select example" id="tag">
                <option value="0" selected>Photo Sharing</option>
                <option value="1">Experience Sharing</option>
                <option value="2">Trading</option>
            </select>
        </div>
    </div>
    <div class="row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Content</label>
        <div class="col-sm-10">
            <textarea name="content" id="editor">
                <?php echo $content;?>
            </textarea>
        </div>
    </div>
    <button class="btn btn-primary mb-3" onclick="handleSubmit()" >Submit</button>
</div>
<script type="text/javascript">

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

    function handleSubmit(){

        let title = document.getElementById("title").value;
        let desc = document.getElementById("desc").value;
        let tag = document.getElementById("tag").value;
        // console.log(title, desc);
        console.log(window.editor.getData());
        $.post('./updateUserPost.php',{title:title,desc:desc,content:window.editor.getData(),tag:tag,id:<?php echo $id;?>},function (e){
            var d = JSON.parse(e);
            if(d.code === 200){
                layer.msg(d.msg);
                window.location.href = './userPost.php';
            }else{
                layer.msg(d.msg);
            }
        })
        //$.getJSON(`./updateUserPost.php?title=${title}&desc=${desc}&content=${window.editor.getData()}&tag=${tag}&id=<?php //echo $id;?>//`).then((res)=>{
        //    if(res.code == 200){
        //        window.location.href = "./userPost.php"
        //    }
        //})
    }

</script>
</body>
</html>
