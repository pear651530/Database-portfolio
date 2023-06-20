<?php
header('Content-Type:text/html;charset=utf-8');
$check = $_POST;
if ($check) {
    $button = $_POST["submit"];
    if ($button == "登出") {
        session_start();
        if (isset($_POST['submit'])) {
            unset($_SESSION['accout']);
        }
        if (!isset($_SESSION['accout'])) {

            header("Location: login.php");
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>首頁</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Pragma" Content="No-cache">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>
    <style>
        @import url(https://fonts.googleapis.com/earlyaccess/cwtexfangsong.css);

        body {
            font-family: "cwTeXFangSong";
            font-size: 25px;
            width: 100%;
            height: 100vh;
            margin: 0;
            padding: 0;
            background-color: rgb(205, 202, 202);
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }

        #img1 {
            height: 240px;
            width: 260px;
            background: #aaa;
        }

        #e {
            font-family: "cwTeXFangSong";
            font-size: 40px;
            text-align: center;
            color: white;
            display: none;
            position: absolute;
            top: 0%;
            left: 0%;
            width: 100%;
            height: 100%;
            background-color: black;
            z-index: 1001;
        }

        #preloader {
            /*   這是整個會蓋住畫面的底色色塊  */
            position: fixed;
            width: 100%;
            height: 100%;
            left: 0%;
            top: 0%;
            background-color: #fff;
            z-index: 9999;
        }

        #status {
            /*   這是中間loading的gif坐標css,我們盡量讓他畫面置中  */
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        @media only screen and (max-width: 1200px) {
            #img1 {
                height: 120px;
                width: 130px;
            }
    </style>
    <script>
        $(window).load(function () {
            $("#status").delay(4000).fadeOut(1500);
            $("#preloader").delay(4000).fadeOut(1500);
        })

        window.addEventListener("load", readMethod(), false);

        function readMethod() {
            // jquery的 ajax，使用GET方法
            $.ajax({
                url: 'team18_database.php',
                type: "GET",
                // 若成功，執行以下...
                success: function (response) {
                    if (response == "ERROR") {
                        console.log('read 失敗');
                        $("#e").show();
                    }
                    else {
                        console.log('read 成功');
                    }
                },
                // 若失敗，執行以下...
                error: function () {
                    console.log("2");
                    console.log('read 失敗');
                    print();
                }
            });
        }
    </script>
</head>

<body>
    <div id="preloader">
        <div id="status"><img
                src="https://img.pikbest.com/png-images/20190918/cartoon-snail-loading-loading-gif-animation_2734139.png!bw700" />
        </div>
    </div>
    <div id="e">
        404 NOT FOUND!
    </div>
    <div class="jumbotron text-center" style="margin-bottom:0">
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-2">
            </div>
            <div class="col-sm-6">
                <h1>吾愛吾師，但吾更愛電競</h1>
                <p>study is a work but game is my life</p>
            </div>
            <div class="col-sm-2">
                <form method='post'>
                    <input type='submit' name='submit' value='登出' />
                </form>
            </div>
            <div class="col-sm-1"></div>
        </div>
    </div>

    <!--<div class="jumbotron text-center" style="margin-bottom:0">
        <h1>吾愛吾師，但吾更愛電競</h1>
        <p>study is a work but game is my life</p>
    </div>-->
    <div class="container" style="margin-top:30px">
        <?php
        //header("Content-type:text/html;charset=utf-8");
        include_once "team18_database.php";

        $query = ("select * from game");
        $stmt = $db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();

        for ($i = 0; $i < count($result); $i++) {
            echo "<div class='row'>";
            echo "<div class='col-sm-2'></div>";
            echo "<div class='col-sm-3'>";
            echo "<a href='show.php'>";
            echo "<img id='img1' src='" . $result[$i]['logo_link'] . "'>";
            echo "</a>";
            echo "</div>";
            echo "<div class='col-sm-6'>";
            echo "<h2>" . $result[$i]['game_name'] . "</h2>";
            echo "<h4>" . $result[$i]['developer'] . "</br>" . $result[$i]['game_description'] . "</h4>";
            echo "</div>";
            echo "</div>";
            echo "<div class='col-sm-1'></div></br>";
        }
        ?>

        <div class="row">
            <div class="col-sm-5"></div>
            <div class="col-sm-2">
                <a href="insert.php">
                    <button type="button" class="btn btn-default btn-sm">
                        <span class="glyphicon glyphicon-plus-sign"></span> 新增資料
                    </button>
                </a>
                <a href="update.php">
                    <button type="button" class="btn btn-default btn-sm">
                        <span class="glyphicon glyphicon-refresh"></span> 更新資訊
                    </button>
                </a>
                <a href="delete.php">
                    <button type="button" class="btn btn-default btn-sm">
                        <span class="glyphicon glyphicon-scissors"></span> 刪除資料
                    </button>
                </a>
                <a href="show.php">
                    <button type="button" class="btn btn-default btn-sm">
                        <span class="glyphicon glyphicon-search"></span> 顯示資料
                    </button>
                </a>
            </div>
            <div class="col-sm-5"></div>
        </div>
    </div>

</body>

</html>