<?php
require_once '../view/conn/head.php';
?>

<body>
<?php
require_once '../view/conn/body.php';
?>


<div class="container" style="margin-top:100px;">
    <div class="row">
        <div class="col-md-3">
            <ul class="list-group">
                <li class="list-group-item" aria-disabled="true" id="show-pet">Show Pet Information</li>

                <li class="list-group-item" id="insert-pet">Insert Pet</li>

                <li class="list-group-item" id="delete-pet">Delete Pet</li>

                <li class="list-group-item" id="update-pet">Update Pet Information</li>

            </ul>
        </div>
        <div class="col-md-9" id="content"></div>
    </div>
</div>
<script src="../templates/PetTable.js"></script>
<script src="../templates/InsertForm.js"></script>
<script src="../templates/DeleteForm.js"></script>
<script src="../templates/UpdateForm.js"></script>

<script>
    $(document).ready(function(){
        $.getJSON('./getPet.php?p=1', function(res){
            $('#content').empty();
            $('#content').append(`${PetTable(res.data)}`);
        })

        $('#show-pet').click(function(){
            $.getJSON('./getPet.php?p=1', function(res){

                $('#content').empty();
                $('#content').append(`${PetTable(res.data)}`);
            })
        })
        $('#insert-pet').click(function(){
            $('#content').empty();
            $('#content').append(`${InsertForm()}`)
        })
        $('#delete-pet').click(function(){
            $('#content').empty();
            $('#content').append(`${DeleteForm()}`)
        })
        $('#update-pet').click(function(){
            $('#content').empty();
            $('#content').append(`${UpdateForm()}`)
        })
    })
</script>
</body>
</html>
