<?php
require_once '../view/conn/head.php';
?>

<body>
<?php
require_once '../view/conn/body.php';
?>

<style>
    .wrapper {
        position: relative;

    }

    .wrapper .filterContainer {
        position: absolute;
        top: 0;
        right: 100%;
        width: 140px;
        transform: translateX(-30px);
    }

    .rangeBox .texts {
        display: flex;
        justify-content: space-between;
        margin-top: -4px;
    }

    .rangeBox input {
        width: 100%;
    }

    .filterContainer .label {
        font-size: 16px;
        color: black;
        margin-bottom: 10px;
    }

    .filterContainer .formItem {
        padding-bottom: 20px;
    }

    .filterContainer input[type=radio] {
        margin-right: 4px;
    }
</style>


<div class="container main-board" id="petInfoShow">
    <div class="input-group mb-3 search">
        <input type="text" id="keyword" class="form-control"
               placeholder="Input Keyword for Search. keywords split with , " aria-label="Recipient's username"
               aria-describedby="basic-addon2">
        <div id="search-btn">
          <span class="input-group-text" id="basic-addon2 search">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search"
                 viewBox="0 0 16 16">
              <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
          </span>
        </div>
    </div>
    <div class="wrapper">
        <div class="filterContainer">
            <form id="filterForm">
                <div class="formItem">
                    <div class="label">
                        Type
                    </div>
                    <div class="value">
                        <label>
                            <input type="radio" name="type" value="cat">cat
                        </label>
                        <br>
                        <label>
                            <input type="radio" name="type" value="dog">dog
                        </label>
                    </div>
                </div>
                <div class="formItem">
                    <div class="label">
                        Age: <span id="ageFilterValue">0</span>
                    </div>
                    <div class="value">
                        <div class="rangeBox">
                            <input value="0" type="range" min="0" max="20" name="age">
                            <div class="texts">
                                <div class="start">0</div>
                                <div class="end">20</div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="formItem">
                    <div class="label">
                        Sex
                    </div>
                    <div class="value">
                        <label>
                            <input type="radio" name="sex" value="male">Male
                        </label>
                        <br>
                        <label>
                            <input type="radio" name="sex" value="female">Female
                        </label>
                    </div>
                </div>
            </form>


        </div>
        <div id="petlist"></div>
    </div>

</div>


<script src="../templates/ShowDetail.js"></script>
<script src="../templates/ShowPet.js"></script>
<script src="../templates/SearchBar.js"></script>


<script>
    $(document).ready(function () {

        var url = '../php/getPet.php';
        var pageNum = 1; // 当前页码
        $(function () {
            $(window).scroll(function () {
                var scrollTop = $(this).scrollTop();
                var scrollHeight = $(document).height();
                var windowHeight = $(this).height();
                if (scrollTop + windowHeight == scrollHeight) {
                    pageNum++
                    $.getJSON(url, {page: pageNum}, function (res) {

                        console.log('222222222222', res);
                        $("#petlist").append(`${ShowPet(res.data)}`);

                    })
                }
            });
            $.getJSON(url, {page: pageNum}, function (res) {

                console.log('111111111111111111111', res);
                $("#petlist").append(`${ShowPet(res.data)}`);

            })
        })


        $("#search-btn").click(function () {
            var keyword = $("#keyword").val();
            var url = '../php/search.php?keyword=' + keyword;


            $("#petlist").empty();

            $.getJSON(url, function (res) {
                console.log(res);
                // $("#petInfoShow").append(`${SearchBar()}`);
                $("#petlist").empty();
                $("#petlist").append(`${ShowPet(res.data)}`);
            })
        })

        $("#match").click(function () {
            location.href = "../php/match.php?status=1";
        })

        $('#filterForm').change(function (e) {
            e.preventDefault();
            var type = this.type.value;
            var age  = this.age.value;
            var sex  = this.sex.value;
            $('#ageFilterValue').text(age);
            pageNum = 1;
            $("#petlist").empty();
            $(window).scroll(function () {
                var scrollTop = $(this).scrollTop();
                var scrollHeight = $(document).height();
                var windowHeight = $(this).height();
                if (scrollTop + windowHeight == scrollHeight) {
                    pageNum++
                    $.getJSON(url, {page: pageNum,type:type,age:age,sex:sex}, function (res) {

                        $("#petlist").append(`${ShowPet(res.data)}`);

                    })
                }
            });
            $.getJSON(url, {page: pageNum,type:type,age:age,sex:sex}, function (res) {

                $("#petlist").append(`${ShowPet(res.data)}`);

            })

        }).submit(function (e) {
            e.preventDefault();
        })
    })

</script>
</body>
</html>