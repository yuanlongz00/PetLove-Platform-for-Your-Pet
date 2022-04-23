<?php

require_once 'view/conn/head.php';

?>
<body>
<?php
require_once 'view/conn/body.php';
?>
<div style="background-image: url('/images/download.jpg');">
<div class="content">
    <h1 style="text-align: center; font-size:70px;">Welcome to Pet Love</h1>
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/images/slide2.jpg" class="d-block w-100" style="height: 50vh;">
            </div>
            <div class="carousel-item">
                <img src="/images/slide1.jpeg" class="d-block w-100" style="height: 50vh;">
            </div>
            <div class="carousel-item">
                <img src="/images/slide3.jpg" class="d-block w-100" style="height: 50vh;">
            </div>
            <div class="carousel-item">
                <img src="/images/slide4.jpg" class="d-block w-100" style="height: 50vh;">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<div class="container">
  <div style="text-align:center">
    <h2></h2>
    <p></p>
  </div>
  <div class="row">
    <div class="column">
      <img src="/w3images/map.jpg" style="width:100%">
    </div>
    <div class="column">
        <h1 style="text-align: center; font-size:30px;">Contact US</h1>
            <div class="address">
                <h1 style="text-align: center; font-size:20px;">
                <p style="font-family:courier;">
                Visit us at:petlove.com<br>
                10001 Chester Ave<br>
                Cleveland, OH<br>
                </p>
            </h1>
</div>


</body>
</html>

