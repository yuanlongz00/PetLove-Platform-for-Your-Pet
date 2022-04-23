<?php

require_once '../view/conn/head.php';

?>
<script src="https://cdn.ckeditor.com/ckeditor5/33.0.0/classic/ckeditor.js"></script>
<script type="text/javascript">

    function handleSubmit(){
        let title = document.getElementById("title").value;
        let desc = document.getElementById("desc").value;
        let tag = document.getElementById("tag").value;
        // console.log(title, desc);
        console.log(window.editor.getData());
        $.post('./insertPost.php',{title:title,desc:desc,content:window.editor.getData(),tag:tag},function (e){
            var d = JSON.parse(e);
            if(d.code !== 200){

                layer.msg(d.msg);
            }else{
                window.location.href = './forum.php'
            }

        })
    }

</script>
<body>
<?php
require_once '../view/conn/body.php';
?>

<div class="post-form" >
    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Title</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="title" name="title">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="desc" name="desc">
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
            <textarea name="content" id="editor"></textarea>
        </div>
    </div>
    <button class="btn btn-primary mb-3" onclick="handleSubmit()" >Submit</button>
</div>

<script type="text/javascript">

    ClassicEditor.create( document.querySelector( '#editor' ),{
            ckfinder: {
                uploadUrl: '../php/upload.php',
            }
        }).then((editor)=>{
        window.editor = editor
    })
        .catch( error => {
            console.error( error );
        });
</script>

</body>
</html>
