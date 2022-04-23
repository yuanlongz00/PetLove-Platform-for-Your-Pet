INSERT INTO comments (cid, user, content, date, pid, reply_id)
VALUES (
    cid:int,
    'user:varchar',
    'content:varchar',
    'date:datetime',
    pid:int,
    reply_id:int
  );<?php

require_once '../view/conn/head.php';

?>
<link rel="stylesheet" href="/templates/main.css">
<script type="text/javascript">
    window.onload = function(){

        var btn = document.getElementById('bt');
        var form = document.getElementsByTagName('form')[0];

        btn.onclick = function (){
            form.submit();
        }
    }

</script>
<body>
<?php
require_once '../view/conn/body.php';
?>

<div class="hero-bg">
    <section class="top">
        <header>
            <a href="#">Pet Love</a>
        </header>

        <h1>Find Your Furry Friend</h1>

        <p>Log in or Register to Meet our Friends!</p>

        <div class="form-container" >
            <form action="../doLogin.php" method="post">
                <div class="form1">
                    <label for="Username">Username:</label>
                    <input type="text" name="Username" id="Username">
                </div>
                <div class="form2">
                    <label for="Password">Password:</label>
                    <input type="text" name="Password" id="Password">
                </div>
                <input id="bt" type="button" value="Submit" >
            </form>
        </div>
    </section>
</div>

<section class="benefits">
    <div class="right-col">
        <h2>Companionship, understanding, devotion </h2>
        <p>Find your best-matching furry friend today!</p>
    </div>
    <img src="/images/Register1.jpg" alt="Picture of dog and owner">
</section>

</body>
</html>





