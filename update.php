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
    <title>更新資訊</title>
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
    <?php
    header("Content-type:text/html;charset=utf-8"); ?>
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

        #fade {
            display: none;
            position: absolute;
            top: 0%;
            left: 0%;
            width: 100%;
            height: 100%;
            background-color: black;
            z-index: 1001;
            -moz-opacity: 0.8;
            opacity: .80;
            filter: alpha(opacity=80);
        }

        #err1,
        #err2 {
            display: none;
            position: absolute;
            top: 200px;
            left: 20%;
            width: 60%;
            height: 150px;
            padding: 16px;
            border: 3px solid orange;
            background-color: white;
            z-index: 1002;
            overflow: auto;
            text-align: center;
            line-height: 100px;
            font-weight: bolder;
            font-size: 40px;
        }
    </style>
    <script type="text/javascript">

        function start() {
        }

        function print1() {
            $(document).ready(() => {
                $("#err1").show();
                $("#fade").show();
                setTimeout(function () {
                    $("#err1").hide();
                    $("#fade").hide();
                }, 1500);
            });
        }

        function print2() {
            $(document).ready(() => {
                $("#err2").show();
                $("#fade").show();
                setTimeout(function () {
                    $("#err2").hide();
                    $("#fade").hide();
                }, 1500);
            });
        }

        window.addEventListener("load", start, false);
    </script>

</head>

<body>

    <div class="jumbotron text-center" style="margin-bottom:0">
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-2">
                <a href="home.php">
                    <button type="button" class="button1">
                        <span class="glyphicon glyphicon-home"></span> 首頁
                    </button>
                </a>
            </div>
            <div class="col-sm-6">
                <h1>更新資訊</h1>
            </div>
            <div class="col-sm-2">
                <form method='post'>
                    <input type='submit' name='submit' value='登出' />
                </form>
            </div>
            <div class="col-sm-1"></div>
        </div>
    </div>
    <div class="container" style="margin-top:30px">
        <form action="update.php" method="post">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-2">要更改的資訊:</div>
                <div class="col-sm-4">
                    <select name="attributes_name" id="attributes_name">
                        <option value="game_name">遊戲名稱</option>
                        <option value="developer">開發商</option>
                        <option value="logo_link">logo圖片連結</option>
                        <option value="game_description">遊戲簡介</option>
                        <option value="name">選手名稱</option>
                        <option value="country">選手國籍</option>
                        <option value="player_team">選手隊伍名稱</option>
                        <option value="region">賽區</option>
                        <option value="season">賽季</option>
                        <option value="begin_month">賽季開始月份</option>
                        <option value="begin_date">賽季開始日期</option>
                        <option value="end_month">賽季結束月份</option>
                        <option value="end_date">賽季結束日期</option>
                        <option value="team">隊伍名稱</option>
                        <option value="location">隊伍的所在國家</option>
                        <option value="month">比賽月份</option>
                        <option value="date">比賽日期</option>
                        <option value="time">比賽時間</option>
                        <option value="team1">參賽隊伍1</option>
                        <option value="team2">參賽隊伍2</option>
                        <option value="win_team">勝利隊伍</option>
                    </select>
                    <input type="submit" name="submit" value="確定">
                    <script type="text/javascript">
                        document.getElementById('attributes_name').value = "<?php echo $_POST['attributes_name']; ?>";
                    </script>
                </div>
                <div class="col-sm-3"></div>
            </div>
            <?php

            include_once "team18_database.php";
            $check = $_POST;
            if ($check) {
                $attributes_name = $_POST["attributes_name"];
                if ($attributes_name == "game_name") {
                    $query = ("select distinct game_name from game");
                    $stmt = $db->prepare($query);
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>原本的內容: </div><div class='col-sm-4'><select name='ori_data'>";
                    for ($i = 0; $i < count($result); $i++) {
                        echo "<option value='" . $result[$i]['game_name'] . "'>" . $result[$i]['game_name'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                } else if ($attributes_name == "developer") {
                    $query = ("select distinct game_name from game");
                    $stmt = $db->prepare($query);
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>哪款遊戲: </div><div class='col-sm-4'><select name='lim'>";
                    for ($i = 0; $i < count($result); $i++) {
                        echo "<option value='" . $result[$i]['game_name'] . "'>" . $result[$i]['game_name'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query1 = ("select distinct developer from game");
                    $stmt = $db->prepare($query1);
                    $stmt->execute();
                    $result1 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>原本的內容: </div><div class='col-sm-4'><select name='ori_data'>";
                    for ($i = 0; $i < count($result1); $i++) {
                        echo "<option value='" . $result1[$i]['developer'] . "'>" . $result1[$i]['developer'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                } else if ($attributes_name == "logo_link") {
                    $query = ("select  distinct game_name from game");
                    $stmt = $db->prepare($query);
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>哪款遊戲: </div><div class='col-sm-4'><select name='lim'>";
                    for ($i = 0; $i < count($result); $i++) {
                        echo "<option value='" . $result[$i]['game_name'] . "'>" . $result[$i]['game_name'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query1 = ("select  distinct logo_link from game");
                    $stmt = $db->prepare($query1);
                    $stmt->execute();
                    $result1 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>原本的內容: </div><div class='col-sm-4'><select name='ori_data'>";
                    for ($i = 0; $i < count($result1); $i++) {
                        echo "<option value='" . $result1[$i]['logo_link'] . "'>" . $result1[$i]['logo_link'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                } else if ($attributes_name == "game_description") {
                    $query = ("select  distinct game_name from game");
                    $stmt = $db->prepare($query);
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>哪款遊戲: </div><div class='col-sm-4'><select name='lim'>";
                    for ($i = 0; $i < count($result); $i++) {
                        echo "<option value='" . $result[$i]['game_name'] . "'>" . $result[$i]['game_name'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query1 = ("select  distinct game_description from game");
                    $stmt = $db->prepare($query1);
                    $stmt->execute();
                    $result1 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>原本的內容: </div><div class='col-sm-4'><select name='ori_data'>";
                    for ($i = 0; $i < count($result1); $i++) {
                        echo "<option value='" . $result1[$i]['game_description'] . "'>" . $result1[$i]['game_description'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                } else if ($attributes_name == "name") {
                    $query = ("select distinct game_name from player");
                    $stmt = $db->prepare($query);
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>哪款遊戲: </div><div class='col-sm-4'><select name='lim'>";
                    for ($i = 0; $i < count($result); $i++) {
                        echo "<option value='" . $result[$i]['game_name'] . "'>" . $result[$i]['game_name'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query1 = ("select distinct name from player");
                    $stmt = $db->prepare($query1);
                    $stmt->execute();
                    $result1 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>原本的內容: </div><div class='col-sm-4'><select name='ori_data'>";
                    for ($i = 0; $i < count($result1); $i++) {
                        echo "<option value='" . $result1[$i]['name'] . "'>" . $result1[$i]['name'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                } else if ($attributes_name == "country") {
                    $query = ("select distinct game_name from player");
                    $stmt = $db->prepare($query);
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>哪款遊戲: </div><div class='col-sm-4'><select name='lim1'>";
                    for ($i = 0; $i < count($result); $i++) {
                        echo "<option value='" . $result[$i]['game_name'] . "'>" . $result[$i]['game_name'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query1 = ("select distinct name from player");
                    $stmt = $db->prepare($query1);
                    $stmt->execute();
                    $result1 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>哪位選手: </div><div class='col-sm-4'><select name='lim2'>";
                    for ($i = 0; $i < count($result1); $i++) {
                        echo "<option value='" . $result1[$i]['name'] . "'>" . $result1[$i]['name'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query2 = ("select distinct country from player");
                    $stmt = $db->prepare($query2);
                    $stmt->execute();
                    $result2 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>原本的內容: </div><div class='col-sm-4'><select name='ori_data'>";
                    for ($i = 0; $i < count($result2); $i++) {
                        echo "<option value='" . $result2[$i]['country'] . "'>" . $result2[$i]['country'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                } else if ($attributes_name == "player_team") {
                    $query = ("select distinct game_name from player");
                    $stmt = $db->prepare($query);
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>哪款遊戲: </div><div class='col-sm-4'><select name='lim1'>";
                    for ($i = 0; $i < count($result); $i++) {
                        echo "<option value='" . $result[$i]['game_name'] . "'>" . $result[$i]['game_name'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query1 = ("select distinct name from player");
                    $stmt = $db->prepare($query1);
                    $stmt->execute();
                    $result1 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>哪位選手: </div><div class='col-sm-4'><select name='lim2'>";
                    for ($i = 0; $i < count($result1); $i++) {
                        echo "<option value='" . $result1[$i]['name'] . "'>" . $result1[$i]['name'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query2 = ("select distinct team from player");
                    $stmt = $db->prepare($query2);
                    $stmt->execute();
                    $result2 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>原本的內容: </div><div class='col-sm-4'><select name='ori_data'>";
                    for ($i = 0; $i < count($result2); $i++) {
                        echo "<option value='" . $result2[$i]['team'] . "'>" . $result2[$i]['team'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                } else if ($attributes_name == "region") {
                    $query = ("select distinct game_name from region_name");
                    $stmt = $db->prepare($query);
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>哪款遊戲: </div><div class='col-sm-4'><select name='lim'>";
                    for ($i = 0; $i < count($result); $i++) {
                        echo "<option value='" . $result[$i]['game_name'] . "'>" . $result[$i]['game_name'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query1 = ("select distinct region from region_name");
                    $stmt = $db->prepare($query1);
                    $stmt->execute();
                    $result1 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>原本的內容: </div><div class='col-sm-4'><select name='ori_data'>";
                    for ($i = 0; $i < count($result1); $i++) {
                        echo "<option value='" . $result1[$i]['region'] . "'>" . $result1[$i]['region'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                } else if ($attributes_name == "season") {
                    $query = ("select distinct game_name from region_name");
                    $stmt = $db->prepare($query);
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>哪款遊戲: </div><div class='col-sm-4'><select name='lim1'>";
                    for ($i = 0; $i < count($result); $i++) {
                        echo "<option value='" . $result[$i]['game_name'] . "'>" . $result[$i]['game_name'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query1 = ("select distinct region from region_name");
                    $stmt = $db->prepare($query1);
                    $stmt->execute();
                    $result1 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>哪個賽區: </div><div class='col-sm-4'><select name='lim2'>";
                    for ($i = 0; $i < count($result1); $i++) {
                        echo "<option value='" . $result1[$i]['region'] . "'>" . $result1[$i]['region'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query2 = ("select distinct season from region_name");
                    $stmt = $db->prepare($query2);
                    $stmt->execute();
                    $result2 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>原本的內容: </div><div class='col-sm-4'><select name='ori_data'>";
                    for ($i = 0; $i < count($result2); $i++) {
                        echo "<option value='" . $result2[$i]['season'] . "'>" . $result2[$i]['season'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                } else if ($attributes_name == "begin_month") {
                    $query = ("select distinct game_name from region_name");
                    $stmt = $db->prepare($query);
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>哪款遊戲: </div><div class='col-sm-4'><select name='lim1'>";
                    for ($i = 0; $i < count($result); $i++) {
                        echo "<option value='" . $result[$i]['game_name'] . "'>" . $result[$i]['game_name'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query1 = ("select distinct region from region_name");
                    $stmt = $db->prepare($query1);
                    $stmt->execute();
                    $result1 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>哪個賽區: </div><div class='col-sm-4'><select name='lim2'>";
                    for ($i = 0; $i < count($result1); $i++) {
                        echo "<option value='" . $result1[$i]['region'] . "'>" . $result1[$i]['region'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query2 = ("select distinct season from region_name");
                    $stmt = $db->prepare($query2);
                    $stmt->execute();
                    $result2 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>哪個賽季: </div><div class='col-sm-4'><select name='lim3'>";
                    for ($i = 0; $i < count($result2); $i++) {
                        echo "<option value='" . $result2[$i]['season'] . "'>" . $result2[$i]['season'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query3 = ("select distinct begin_month from region_name");
                    $stmt = $db->prepare($query3);
                    $stmt->execute();
                    $result3 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>原本的內容: </div><div class='col-sm-4'><select name='ori_data'>";
                    for ($i = 0; $i < count($result3); $i++) {
                        echo "<option value='" . $result3[$i]['begin_month'] . "'>" . $result3[$i]['begin_month'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                } else if ($attributes_name == "begin_date") {
                    $query = ("select distinct game_name from region_name");
                    $stmt = $db->prepare($query);
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>哪款遊戲: </div><div class='col-sm-4'><select name='lim1'>";
                    for ($i = 0; $i < count($result); $i++) {
                        echo "<option value='" . $result[$i]['game_name'] . "'>" . $result[$i]['game_name'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query1 = ("select distinct region from region_name");
                    $stmt = $db->prepare($query1);
                    $stmt->execute();
                    $result1 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>哪個賽區: </div><div class='col-sm-4'><select name='lim2'>";
                    for ($i = 0; $i < count($result1); $i++) {
                        echo "<option value='" . $result1[$i]['region'] . "'>" . $result1[$i]['region'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query2 = ("select distinct season from region_name");
                    $stmt = $db->prepare($query2);
                    $stmt->execute();
                    $result2 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>哪個賽季: </div><div class='col-sm-4'><select name='lim3'>";
                    for ($i = 0; $i < count($result2); $i++) {
                        echo "<option value='" . $result2[$i]['season'] . "'>" . $result2[$i]['season'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query3 = ("select distinct begin_date from region_name");
                    $stmt = $db->prepare($query3);
                    $stmt->execute();
                    $result3 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>原本的內容: </div><div class='col-sm-4'><select name='ori_data'>";
                    for ($i = 0; $i < count($result3); $i++) {
                        echo "<option value='" . $result3[$i]['begin_date'] . "'>" . $result3[$i]['begin_date'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                } else if ($attributes_name == "end_month") {
                    $query = ("select distinct game_name from region_name");
                    $stmt = $db->prepare($query);
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>哪款遊戲: </div><div class='col-sm-4'><select name='lim1'>";
                    for ($i = 0; $i < count($result); $i++) {
                        echo "<option value='" . $result[$i]['game_name'] . "'>" . $result[$i]['game_name'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query1 = ("select distinct region from region_name");
                    $stmt = $db->prepare($query1);
                    $stmt->execute();
                    $result1 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>哪個賽區: </div><div class='col-sm-4'><select name='lim2'>";
                    for ($i = 0; $i < count($result1); $i++) {
                        echo "<option value='" . $result1[$i]['region'] . "'>" . $result1[$i]['region'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query2 = ("select distinct season from region_name");
                    $stmt = $db->prepare($query2);
                    $stmt->execute();
                    $result2 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>哪個賽季: </div><div class='col-sm-4'><select name='lim3'>";
                    for ($i = 0; $i < count($result2); $i++) {
                        echo "<option value='" . $result2[$i]['season'] . "'>" . $result2[$i]['season'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query3 = ("select distinct end_month from region_name");
                    $stmt = $db->prepare($query3);
                    $stmt->execute();
                    $result3 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>原本的內容: </div><div class='col-sm-4'><select name='ori_data'>";
                    for ($i = 0; $i < count($result3); $i++) {
                        echo "<option value='" . $result3[$i]['end_month'] . "'>" . $result3[$i]['end_month'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                } else if ($attributes_name == "end_date") {
                    $query = ("select distinct game_name from region_name");
                    $stmt = $db->prepare($query);
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>哪款遊戲: </div><div class='col-sm-4'><select name='lim1'>";
                    for ($i = 0; $i < count($result); $i++) {
                        echo "<option value='" . $result[$i]['game_name'] . "'>" . $result[$i]['game_name'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query1 = ("select distinct region from region_name");
                    $stmt = $db->prepare($query1);
                    $stmt->execute();
                    $result1 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>哪個賽區: </div><div class='col-sm-4'><select name='lim2'>";
                    for ($i = 0; $i < count($result1); $i++) {
                        echo "<option value='" . $result1[$i]['region'] . "'>" . $result1[$i]['region'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query2 = ("select distinct season from region_name");
                    $stmt = $db->prepare($query2);
                    $stmt->execute();
                    $result2 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>哪個賽季: </div><div class='col-sm-4'><select name='lim3'>";
                    for ($i = 0; $i < count($result2); $i++) {
                        echo "<option value='" . $result2[$i]['season'] . "'>" . $result2[$i]['season'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query3 = ("select distinct end_date from region_name");
                    $stmt = $db->prepare($query3);
                    $stmt->execute();
                    $result3 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>原本的內容: </div><div class='col-sm-4'><select name='ori_data'>";
                    for ($i = 0; $i < count($result3); $i++) {
                        echo "<option value='" . $result3[$i]['end_date'] . "'>" . $result3[$i]['end_date'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                } else if ($attributes_name == "team") {
                    $query = ("select distinct game_name from team_info");
                    $stmt = $db->prepare($query);
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>哪款遊戲: </div><div class='col-sm-4'><select name='lim'>";
                    for ($i = 0; $i < count($result); $i++) {
                        echo "<option value='" . $result[$i]['game_name'] . "'>" . $result[$i]['game_name'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query1 = ("select distinct team from team_info");
                    $stmt = $db->prepare($query1);
                    $stmt->execute();
                    $result1 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>原本的內容: </div><div class='col-sm-4'><select name='ori_data'>";
                    for ($i = 0; $i < count($result1); $i++) {
                        echo "<option value='" . $result1[$i]['team'] . "'>" . $result1[$i]['team'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                } else if ($attributes_name == "location") {
                    $query = ("select distinct game_name from team_info");
                    $stmt = $db->prepare($query);
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>哪款遊戲: </div><div class='col-sm-4'><select name='lim1'>";
                    for ($i = 0; $i < count($result); $i++) {
                        echo "<option value='" . $result[$i]['game_name'] . "'>" . $result[$i]['game_name'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query1 = ("select distinct team from team_info");
                    $stmt = $db->prepare($query1);
                    $stmt->execute();
                    $result1 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>哪個隊伍: </div><div class='col-sm-4'><select name='lim2'>";
                    for ($i = 0; $i < count($result1); $i++) {
                        echo "<option value='" . $result1[$i]['team'] . "'>" . $result1[$i]['team'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query2 = ("select distinct location from team_info");
                    $stmt = $db->prepare($query2);
                    $stmt->execute();
                    $result2 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>原本的內容: </div><div class='col-sm-4'><select name='ori_data'>";
                    for ($i = 0; $i < count($result2); $i++) {
                        echo "<option value='" . $result2[$i]['location'] . "'>" . $result2[$i]['location'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                } else if ($attributes_name == "month") {
                    $query = ("select distinct game_name from contest");
                    $stmt = $db->prepare($query);
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>哪款遊戲: </div><div class='col-sm-4'><select name='lim1'>";
                    for ($i = 0; $i < count($result); $i++) {
                        echo "<option value='" . $result[$i]['game_name'] . "'>" . $result[$i]['game_name'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query1 = ("select distinct region from contest");
                    $stmt = $db->prepare($query1);
                    $stmt->execute();
                    $result1 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>哪個賽區: </div><div class='col-sm-4'><select name='lim2'>";
                    for ($i = 0; $i < count($result1); $i++) {
                        echo "<option value='" . $result1[$i]['region'] . "'>" . $result1[$i]['region'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query2 = ("select distinct date from contest");
                    $stmt = $db->prepare($query2);
                    $stmt->execute();
                    $result2 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>哪個日期: </div><div class='col-sm-4'><select name='lim3'>";
                    for ($i = 0; $i < count($result2); $i++) {
                        echo "<option value='" . $result2[$i]['date'] . "'>" . $result2[$i]['date'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query3 = ("select distinct time from contest");
                    $stmt = $db->prepare($query3);
                    $stmt->execute();
                    $result3 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>哪個時間: </div><div class='col-sm-4'><select name='lim4'>";
                    for ($i = 0; $i < count($result3); $i++) {
                        echo "<option value='" . $result3[$i]['time'] . "'>" . $result3[$i]['time'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query4 = ("select distinct team1 from contest");
                    $stmt = $db->prepare($query4);
                    $stmt->execute();
                    $result4 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>team1: </div><div class='col-sm-4'><select name='lim5'>";
                    for ($i = 0; $i < count($result4); $i++) {
                        echo "<option value='" . $result4[$i]['team1'] . "'>" . $result4[$i]['team1'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query5 = ("select distinct team2 from contest");
                    $stmt = $db->prepare($query5);
                    $stmt->execute();
                    $result5 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>team2: </div><div class='col-sm-4'><select name='lim6'>";
                    for ($i = 0; $i < count($result5); $i++) {
                        echo "<option value='" . $result5[$i]['team2'] . "'>" . $result5[$i]['team2'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query6 = ("select distinct month from contest");
                    $stmt = $db->prepare($query6);
                    $stmt->execute();
                    $result6 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>原本的內容: </div><div class='col-sm-4'><select name='ori_data'>";
                    for ($i = 0; $i < count($result6); $i++) {
                        echo "<option value='" . $result6[$i]['month'] . "'>" . $result6[$i]['month'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                } else if ($attributes_name == "date") {
                    $query = ("select distinct game_name from contest");
                    $stmt = $db->prepare($query);
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>哪款遊戲: </div><div class='col-sm-4'><select name='lim1'>";
                    for ($i = 0; $i < count($result); $i++) {
                        echo "<option value='" . $result[$i]['game_name'] . "'>" . $result[$i]['game_name'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query1 = ("select distinct region from contest");
                    $stmt = $db->prepare($query1);
                    $stmt->execute();
                    $result1 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>哪個賽區: </div><div class='col-sm-4'><select name='lim2'>";
                    for ($i = 0; $i < count($result1); $i++) {
                        echo "<option value='" . $result1[$i]['region'] . "'>" . $result1[$i]['region'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query2 = ("select distinct month from contest");
                    $stmt = $db->prepare($query2);
                    $stmt->execute();
                    $result2 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>哪個月份: </div><div class='col-sm-4'><select name='lim3'>";
                    for ($i = 0; $i < count($result2); $i++) {
                        echo "<option value='" . $result2[$i]['month'] . "'>" . $result2[$i]['month'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query3 = ("select distinct time from contest");
                    $stmt = $db->prepare($query3);
                    $stmt->execute();
                    $result3 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>哪個時間: </div><div class='col-sm-4'><select name='lim4'>";
                    for ($i = 0; $i < count($result3); $i++) {
                        echo "<option value='" . $result3[$i]['time'] . "'>" . $result3[$i]['time'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query4 = ("select distinct team1 from contest");
                    $stmt = $db->prepare($query4);
                    $stmt->execute();
                    $result4 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>team1: </div><div class='col-sm-4'><select name='lim5'>";
                    for ($i = 0; $i < count($result4); $i++) {
                        echo "<option value='" . $result4[$i]['team1'] . "'>" . $result4[$i]['team1'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query5 = ("select distinct team2 from contest");
                    $stmt = $db->prepare($query5);
                    $stmt->execute();
                    $result5 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>team2: </div><div class='col-sm-4'><select name='lim6'>";
                    for ($i = 0; $i < count($result5); $i++) {
                        echo "<option value='" . $result5[$i]['team2'] . "'>" . $result5[$i]['team2'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query6 = ("select distinct date from contest");
                    $stmt = $db->prepare($query6);
                    $stmt->execute();
                    $result6 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>原本的內容: </div><div class='col-sm-4'><select name='ori_data'>";
                    for ($i = 0; $i < count($result6); $i++) {
                        echo "<option value='" . $result6[$i]['date'] . "'>" . $result6[$i]['date'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                } else if ($attributes_name == "time") {
                    $query = ("select distinct game_name from contest");
                    $stmt = $db->prepare($query);
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>哪款遊戲: </div><div class='col-sm-4'><select name='lim1'>";
                    for ($i = 0; $i < count($result); $i++) {
                        echo "<option value='" . $result[$i]['game_name'] . "'>" . $result[$i]['game_name'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query1 = ("select distinct region from contest");
                    $stmt = $db->prepare($query1);
                    $stmt->execute();
                    $result1 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>哪個賽區: </div><div class='col-sm-4'><select name='lim2'>";
                    for ($i = 0; $i < count($result1); $i++) {
                        echo "<option value='" . $result1[$i]['region'] . "'>" . $result1[$i]['region'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query2 = ("select distinct month from contest");
                    $stmt = $db->prepare($query2);
                    $stmt->execute();
                    $result2 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>哪個月份: </div><div class='col-sm-4'><select name='lim3'>";
                    for ($i = 0; $i < count($result2); $i++) {
                        echo "<option value='" . $result2[$i]['month'] . "'>" . $result2[$i]['month'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query3 = ("select distinct date from contest");
                    $stmt = $db->prepare($query3);
                    $stmt->execute();
                    $result3 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>哪個日期: </div><div class='col-sm-4'><select name='lim4'>";
                    for ($i = 0; $i < count($result3); $i++) {
                        echo "<option value='" . $result3[$i]['date'] . "'>" . $result3[$i]['date'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query4 = ("select distinct team1 from contest");
                    $stmt = $db->prepare($query4);
                    $stmt->execute();
                    $result4 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>team1: </div><div class='col-sm-4'><select name='lim5'>";
                    for ($i = 0; $i < count($result4); $i++) {
                        echo "<option value='" . $result4[$i]['team1'] . "'>" . $result4[$i]['team1'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query5 = ("select distinct team2 from contest");
                    $stmt = $db->prepare($query5);
                    $stmt->execute();
                    $result5 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>team2: </div><div class='col-sm-4'><select name='lim6'>";
                    for ($i = 0; $i < count($result5); $i++) {
                        echo "<option value='" . $result5[$i]['team2'] . "'>" . $result5[$i]['team2'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query6 = ("select distinct time from contest");
                    $stmt = $db->prepare($query6);
                    $stmt->execute();
                    $result6 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>原本的內容: </div><div class='col-sm-4'><select name='ori_data'>";
                    for ($i = 0; $i < count($result6); $i++) {
                        echo "<option value='" . $result6[$i]['time'] . "'>" . $result6[$i]['time'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                } else if ($attributes_name == "team1") {
                    $query = ("select distinct game_name from contest");
                    $stmt = $db->prepare($query);
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>哪款遊戲: </div><div class='col-sm-4'><select name='lim1'>";
                    for ($i = 0; $i < count($result); $i++) {
                        echo "<option value='" . $result[$i]['game_name'] . "'>" . $result[$i]['game_name'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query1 = ("select distinct region from contest");
                    $stmt = $db->prepare($query1);
                    $stmt->execute();
                    $result1 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>哪個賽區: </div><div class='col-sm-4'><select name='lim2'>";
                    for ($i = 0; $i < count($result1); $i++) {
                        echo "<option value='" . $result1[$i]['region'] . "'>" . $result1[$i]['region'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query2 = ("select distinct month from contest");
                    $stmt = $db->prepare($query2);
                    $stmt->execute();
                    $result2 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>哪個月份: </div><div class='col-sm-4'><select name='lim3'>";
                    for ($i = 0; $i < count($result2); $i++) {
                        echo "<option value='" . $result2[$i]['month'] . "'>" . $result2[$i]['month'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query3 = ("select distinct date from contest");
                    $stmt = $db->prepare($query3);
                    $stmt->execute();
                    $result3 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>哪個日期: </div><div class='col-sm-4'><select name='lim4'>";
                    for ($i = 0; $i < count($result3); $i++) {
                        echo "<option value='" . $result3[$i]['date'] . "'>" . $result3[$i]['date'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query4 = ("select distinct time from contest");
                    $stmt = $db->prepare($query4);
                    $stmt->execute();
                    $result4 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>哪個時間: </div><div class='col-sm-4'><select name='lim5'>";
                    for ($i = 0; $i < count($result4); $i++) {
                        echo "<option value='" . $result4[$i]['time'] . "'>" . $result4[$i]['time'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query5 = ("select distinct team2 from contest");
                    $stmt = $db->prepare($query5);
                    $stmt->execute();
                    $result5 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>team2: </div><div class='col-sm-4'><select name='lim6'>";
                    for ($i = 0; $i < count($result5); $i++) {
                        echo "<option value='" . $result5[$i]['team2'] . "'>" . $result5[$i]['team2'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query6 = ("select distinct team1 from contest");
                    $stmt = $db->prepare($query6);
                    $stmt->execute();
                    $result6 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>原本的內容: </div><div class='col-sm-4'><select name='ori_data'>";
                    for ($i = 0; $i < count($result6); $i++) {
                        echo "<option value='" . $result6[$i]['team1'] . "'>" . $result6[$i]['team1'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                } else if ($attributes_name == "team2") {
                    $query = ("select distinct game_name from contest");
                    $stmt = $db->prepare($query);
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>哪款遊戲: </div><div class='col-sm-4'><select name='lim1'>";
                    for ($i = 0; $i < count($result); $i++) {
                        echo "<option value='" . $result[$i]['game_name'] . "'>" . $result[$i]['game_name'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query1 = ("select distinct region from contest");
                    $stmt = $db->prepare($query1);
                    $stmt->execute();
                    $result1 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>哪個賽區: </div><div class='col-sm-4'><select name='lim2'>";
                    for ($i = 0; $i < count($result1); $i++) {
                        echo "<option value='" . $result1[$i]['region'] . "'>" . $result1[$i]['region'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query2 = ("select distinct month from contest");
                    $stmt = $db->prepare($query2);
                    $stmt->execute();
                    $result2 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>哪個月份: </div><div class='col-sm-4'><select name='lim3'>";
                    for ($i = 0; $i < count($result2); $i++) {
                        echo "<option value='" . $result2[$i]['month'] . "'>" . $result2[$i]['month'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query3 = ("select distinct date from contest");
                    $stmt = $db->prepare($query3);
                    $stmt->execute();
                    $result3 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>哪個日期: </div><div class='col-sm-4'><select name='lim4'>";
                    for ($i = 0; $i < count($result3); $i++) {
                        echo "<option value='" . $result3[$i]['date'] . "'>" . $result3[$i]['date'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query4 = ("select distinct time from contest");
                    $stmt = $db->prepare($query4);
                    $stmt->execute();
                    $result4 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>哪個時間: </div><div class='col-sm-4'><select name='lim5'>";
                    for ($i = 0; $i < count($result4); $i++) {
                        echo "<option value='" . $result4[$i]['time'] . "'>" . $result4[$i]['time'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query5 = ("select distinct team1 from contest");
                    $stmt = $db->prepare($query5);
                    $stmt->execute();
                    $result5 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>team1: </div><div class='col-sm-4'><select name='lim6'>";
                    for ($i = 0; $i < count($result5); $i++) {
                        echo "<option value='" . $result5[$i]['team1'] . "'>" . $result5[$i]['team1'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query6 = ("select distinct team2 from contest");
                    $stmt = $db->prepare($query6);
                    $stmt->execute();
                    $result6 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>原本的內容: </div><div class='col-sm-4'><select name='ori_data'>";
                    for ($i = 0; $i < count($result6); $i++) {
                        echo "<option value='" . $result6[$i]['team2'] . "'>" . $result6[$i]['team2'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                } else if ($attributes_name == "win_team") {
                    $query = ("select distinct game_name from contest");
                    $stmt = $db->prepare($query);
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>哪款遊戲: </div><div class='col-sm-4'><select name='lim1'>";
                    for ($i = 0; $i < count($result); $i++) {
                        echo "<option value='" . $result[$i]['game_name'] . "'>" . $result[$i]['game_name'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query1 = ("select distinct region from contest");
                    $stmt = $db->prepare($query1);
                    $stmt->execute();
                    $result1 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>哪個賽區: </div><div class='col-sm-4'><select name='lim2'>";
                    for ($i = 0; $i < count($result1); $i++) {
                        echo "<option value='" . $result1[$i]['region'] . "'>" . $result1[$i]['region'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query2 = ("select distinct month from contest");
                    $stmt = $db->prepare($query2);
                    $stmt->execute();
                    $result2 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>哪個月份: </div><div class='col-sm-4'><select name='lim3'>";
                    for ($i = 0; $i < count($result2); $i++) {
                        echo "<option value='" . $result2[$i]['month'] . "'>" . $result2[$i]['month'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query3 = ("select distinct date from contest");
                    $stmt = $db->prepare($query3);
                    $stmt->execute();
                    $result3 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>哪個日期: </div><div class='col-sm-4'><select name='lim4'>";
                    for ($i = 0; $i < count($result3); $i++) {
                        echo "<option value='" . $result3[$i]['date'] . "'>" . $result3[$i]['date'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query4 = ("select distinct time from contest");
                    $stmt = $db->prepare($query4);
                    $stmt->execute();
                    $result4 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>哪個時間: </div><div class='col-sm-4'><select name='lim5'>";
                    for ($i = 0; $i < count($result4); $i++) {
                        echo "<option value='" . $result4[$i]['time'] . "'>" . $result4[$i]['time'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query5 = ("select distinct team1 from contest");
                    $stmt = $db->prepare($query5);
                    $stmt->execute();
                    $result5 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>team1: </div><div class='col-sm-4'><select name='lim6'>";
                    for ($i = 0; $i < count($result5); $i++) {
                        echo "<option value='" . $result5[$i]['team1'] . "'>" . $result5[$i]['team1'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query6 = ("select distinct team2 from contest");
                    $stmt = $db->prepare($query6);
                    $stmt->execute();
                    $result6 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>team2: </div><div class='col-sm-4'><select name='lim7'>";
                    for ($i = 0; $i < count($result6); $i++) {
                        echo "<option value='" . $result6[$i]['team2'] . "'>" . $result6[$i]['team2'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query7 = ("select distinct win_team from contest");
                    $stmt = $db->prepare($query7);
                    $stmt->execute();
                    $result7 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>原本的內容: </div><div class='col-sm-4'><select name='ori_data'>";
                    for ($i = 0; $i < count($result7); $i++) {
                        echo "<option value='" . $result7[$i]['win_team'] . "'>" . $result7[$i]['win_team'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                }
            }
            ?>

            <?php
            include_once "team18_database.php";
            $check = $_POST;
            if ($check) {
                echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>更新後內容:</div><div class='col-sm-4'>";
                $attributes_name = $_POST["attributes_name"];
                if ($attributes_name == "player_team" || $attributes_name == "team1" || $attributes_name == "team2" || $attributes_name == "win_team") {
                    $query = ("select distinct team from team_info");
                    $stmt = $db->prepare($query);
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    echo "<select name='up_data'>";
                    for ($i = 0; $i < count($result); $i++) {
                        echo "<option value='" . $result[$i]['team'] . "'>" . $result[$i]['team'] . "</option>";
                    }
                    echo "</select>";
                } else {
                    echo "<input type='text' placeholder='輸入要更新內容' name='up_data'
                                style='border: 2px solid black; background-color: white; width: 300px;'></div><div class='col-sm-3'></div></div>";
                }
                echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-6'><input type='submit' name='submit' value='更新'>";
                echo "</div><div class='col-sm-3'></div></div>";
            }
            ?>


        </form>
        <?php
        include_once "team18_database.php";
        $check = $_POST;
        if ($check) {
            $button = $_POST["submit"];
            if ($button == "更新") {
                $attributes_name = $_POST["attributes_name"];
                $ori_data = $_POST["ori_data"];
                $up_data = $_POST["up_data"];
                if ($attributes_name == "game_name") {
                    $query = ("update game set game_name=? where game_name=?");
                    $stmt = $db->prepare($query);
                    $error = $stmt->execute(array($up_data, $ori_data));
                    echo "<script>", 'print2();', '</script>';
                    echo "<script type='text/javascript'>";
                    echo "setTimeout(function(){
                        window.location.href = window.location.href;},1500)";
                    echo "</script>";

                } else if ($attributes_name == "developer") {
                    $lim = $_POST["lim"];
                    $all = ("select * from game");
                    $stmt = $db->prepare($all);
                    $stmt->execute();
                    $all_result = $stmt->fetchAll();
                    $hold = 0;
                    for ($i = 0; $i < count($all_result); $i++) {
                        if ($all_result[$i]['developer'] == $ori_data && $all_result[$i]['game_name'] == $lim) {
                            $hold = 1;
                            echo "<script>", 'print2();', '</script>';
                            $query = ("update game set developer=? where developer=? and game_name=?");
                            $stmt = $db->prepare($query);
                            $error = $stmt->execute(array($up_data, $ori_data, $lim));
                        }
                    }
                    if ($hold == 0) {
                        echo "<script>", 'print1();', '</script>';
                    } else {
                        echo "<script type='text/javascript'>";
                        echo "setTimeout(function(){
                            window.location.href = window.location.href;},1500)";
                        echo "</script>";
                    }
                } else if ($attributes_name == "logo_link") {
                    $lim = $_POST["lim"];
                    $all = ("select * from game");
                    $stmt = $db->prepare($all);
                    $stmt->execute();
                    $all_result = $stmt->fetchAll();
                    $hold = 0;
                    for ($i = 0; $i < count($all_result); $i++) {
                        if ($all_result[$i]['logo_link'] == $ori_data && $all_result[$i]['game_name'] == $lim) {
                            $hold = 1;
                            echo "<script>", 'print2();', '</script>';
                            $query = ("update game set logo_link=? where logo_link=? and game_name=?");
                            $stmt = $db->prepare($query);
                            $error = $stmt->execute(array($up_data, $ori_data, $lim));
                        }
                    }
                    if ($hold == 0) {
                        echo "<script>", 'print1();', '</script>';
                    } else {
                        echo "<script type='text/javascript'>";
                        echo "setTimeout(function(){
                            window.location.href = window.location.href;},1500)";
                        echo "</script>";
                    }

                } else if ($attributes_name == "game_description") {
                    $lim = $_POST["lim"];
                    $all = ("select * from game");
                    $stmt = $db->prepare($all);
                    $stmt->execute();
                    $all_result = $stmt->fetchAll();
                    $hold = 0;
                    for ($i = 0; $i < count($all_result); $i++) {
                        if ($all_result[$i]['game_description'] == $ori_data && $all_result[$i]['game_name'] == $lim) {
                            $hold = 1;
                            echo "<script>", 'print2();', '</script>';
                            $query = ("update game set game_description=? where game_description=? and game_name=?");
                            $stmt = $db->prepare($query);
                            $error = $stmt->execute(array($up_data, $ori_data, $lim));
                        }
                    }
                    if ($hold == 0) {
                        echo "<script>", 'print1();', '</script>';
                    } else {
                        echo "<script type='text/javascript'>";
                        echo "setTimeout(function(){
                            window.location.href = window.location.href;},1500)";
                        echo "</script>";
                    }

                } else if ($attributes_name == "name") {
                    $lim = $_POST["lim"];
                    $all = ("select * from player");
                    $stmt = $db->prepare($all);
                    $stmt->execute();
                    $all_result = $stmt->fetchAll();
                    $hold = 0;
                    for ($i = 0; $i < count($all_result); $i++) {
                        if ($all_result[$i]['name'] == $ori_data && $all_result[$i]['game_name'] == $lim) {
                            $hold = 1;
                            echo "<script>", 'print2();', '</script>';
                            $query = ("update player set name=? where name=? and game_name=?");
                            $stmt = $db->prepare($query);
                            $error = $stmt->execute(array($up_data, $ori_data, $lim));
                        }
                    }
                    if ($hold == 0) {
                        echo "<script>", 'print1();', '</script>';
                    } else {
                        echo "<script type='text/javascript'>";
                        echo "setTimeout(function(){
                            window.location.href = window.location.href;},1500)";
                        echo "</script>";
                    }

                } else if ($attributes_name == "country") {
                    $lim1 = $_POST["lim1"];
                    $lim2 = $_POST["lim2"];
                    $all = ("select * from player");
                    $stmt = $db->prepare($all);
                    $stmt->execute();
                    $all_result = $stmt->fetchAll();
                    $hold = 0;
                    for ($i = 0; $i < count($all_result); $i++) {
                        if ($all_result[$i]['country'] == $ori_data && $all_result[$i]['game_name'] == $lim1 && $all_result[$i]['name'] == $lim2) {
                            $hold = 1;
                            echo "<script>", 'print2();', '</script>';
                            $query = ("update player set country=? where country=? and game_name=? and name=?");
                            $stmt = $db->prepare($query);
                            $error = $stmt->execute(array($up_data, $ori_data, $lim1, $lim2));
                        }
                    }
                    if ($hold == 0) {
                        echo "<script>", 'print1();', '</script>';
                    } else {
                        echo "<script type='text/javascript'>";
                        echo "setTimeout(function(){
                            window.location.href = window.location.href;},1500)";
                        echo "</script>";
                    }

                } else if ($attributes_name == "player_team") {
                    $lim1 = $_POST["lim1"];
                    $lim2 = $_POST["lim2"];
                    $all = ("select * from player");
                    $stmt = $db->prepare($all);
                    $stmt->execute();
                    $all_result = $stmt->fetchAll();
                    $hold = 0;
                    for ($i = 0; $i < count($all_result); $i++) {
                        if ($all_result[$i]['team'] == $ori_data && $all_result[$i]['game_name'] == $lim1 && $all_result[$i]['name'] == $lim2) {
                            $hold = 1;
                            echo "<script>", 'print2();', '</script>';
                            $query = ("update player set team=? where team=? and game_name=? and name=?");
                            $stmt = $db->prepare($query);
                            $error = $stmt->execute(array($up_data, $ori_data, $lim1, $lim2));
                        }
                    }
                    if ($hold == 0) {
                        echo "<script>", 'print1();', '</script>';
                    } else {
                        echo "<script type='text/javascript'>";
                        echo "setTimeout(function(){
                            window.location.href = window.location.href;},1500)";
                        echo "</script>";
                    }

                } else if ($attributes_name == "region") {
                    $lim = $_POST["lim"];
                    $all = ("select * from region_name");
                    $stmt = $db->prepare($all);
                    $stmt->execute();
                    $all_result = $stmt->fetchAll();
                    $hold = 0;
                    for ($i = 0; $i < count($all_result); $i++) {
                        if ($all_result[$i]['region'] == $ori_data && $all_result[$i]['game_name'] == $lim) {
                            $hold = 1;
                            echo "<script>", 'print2();', '</script>';
                            $query = ("update region_name set region=? where region=? and game_name=?");
                            $stmt = $db->prepare($query);
                            $error = $stmt->execute(array($up_data, $ori_data, $lim));
                        }
                    }
                    if ($hold == 0) {
                        echo "<script>", 'print1();', '</script>';
                    } else {
                        echo "<script type='text/javascript'>";
                        echo "setTimeout(function(){
                            window.location.href = window.location.href;},1500)";
                        echo "</script>";
                    }
                } else if ($attributes_name == "season") {
                    $lim1 = $_POST["lim1"];
                    $lim2 = $_POST["lim2"];
                    $all = ("select * from region_name");
                    $stmt = $db->prepare($all);
                    $stmt->execute();
                    $all_result = $stmt->fetchAll();
                    $hold = 0;
                    for ($i = 0; $i < count($all_result); $i++) {
                        if ($all_result[$i]['season'] == $ori_data && $all_result[$i]['game_name'] == $lim1 && $all_result[$i]['region'] == $lim2) {
                            $hold = 1;
                            echo "<script>", 'print2();', '</script>';
                            $query = ("update region_name set season=? where season=? and game_name=? and region=?");
                            $stmt = $db->prepare($query);
                            $error = $stmt->execute(array($up_data, $ori_data, $lim1, $lim2));
                        }
                    }
                    if ($hold == 0) {
                        echo "<script>", 'print1();', '</script>';
                    } else {
                        echo "<script type='text/javascript'>";
                        echo "setTimeout(function(){
                            window.location.href = window.location.href;},1500)";
                        echo "</script>";
                    }

                } else if ($attributes_name == "begin_month") {
                    $lim1 = $_POST["lim1"];
                    $lim2 = $_POST["lim2"];
                    $lim3 = $_POST["lim3"];
                    $all = ("select * from region_name");
                    $stmt = $db->prepare($all);
                    $stmt->execute();
                    $all_result = $stmt->fetchAll();
                    $hold = 0;
                    for ($i = 0; $i < count($all_result); $i++) {
                        if (
                            $all_result[$i]['begin_month'] == $ori_data && $all_result[$i]['game_name'] == $lim1 && $all_result[$i]['region'] == $lim2
                            && $all_result[$i]['season'] == $lim3
                        ) {
                            $hold = 1;
                            echo "<script>", 'print2();', '</script>';
                            $query = ("update region_name set begin_month=? where begin_month=? and game_name=? and region=? and season=?");
                            $stmt = $db->prepare($query);
                            $error = $stmt->execute(array($up_data, $ori_data, $lim1, $lim2, $lim3));
                        }
                    }
                    if ($hold == 0) {
                        echo "<script>", 'print1();', '</script>';
                    } else {
                        echo "<script type='text/javascript'>";
                        echo "setTimeout(function(){
                            window.location.href = window.location.href;},1500)";
                        echo "</script>";
                    }

                } else if ($attributes_name == "begin_date") {
                    $lim1 = $_POST["lim1"];
                    $lim2 = $_POST["lim2"];
                    $lim3 = $_POST["lim3"];
                    $all = ("select * from region_name");
                    $stmt = $db->prepare($all);
                    $stmt->execute();
                    $all_result = $stmt->fetchAll();
                    $hold = 0;
                    for ($i = 0; $i < count($all_result); $i++) {
                        if (
                            $all_result[$i]['begin_date'] == $ori_data && $all_result[$i]['game_name'] == $lim1 && $all_result[$i]['region'] == $lim2
                            && $all_result[$i]['season'] == $lim3
                        ) {
                            $hold = 1;
                            echo "<script>", 'print2();', '</script>';
                            $query = ("update region_name set begin_date=? where begin_date=? and game_name=? and region=? and season=?");
                            $stmt = $db->prepare($query);
                            $error = $stmt->execute(array($up_data, $ori_data, $lim1, $lim2, $lim3));
                        }
                    }
                    if ($hold == 0) {
                        echo "<script>", 'print1();', '</script>';
                    } else {
                        echo "<script type='text/javascript'>";
                        echo "setTimeout(function(){
                            window.location.href = window.location.href;},1500)";
                        echo "</script>";
                    }

                } else if ($attributes_name == "end_month") {
                    $lim1 = $_POST["lim1"];
                    $lim2 = $_POST["lim2"];
                    $lim3 = $_POST["lim3"];
                    $all = ("select * from region_name");
                    $stmt = $db->prepare($all);
                    $stmt->execute();
                    $all_result = $stmt->fetchAll();
                    $hold = 0;
                    for ($i = 0; $i < count($all_result); $i++) {
                        if (
                            $all_result[$i]['end_month'] == $ori_data && $all_result[$i]['game_name'] == $lim1 && $all_result[$i]['region'] == $lim2
                            && $all_result[$i]['season'] == $lim3
                        ) {
                            $hold = 1;
                            echo "<script>", 'print2();', '</script>';
                            $query = ("update region_name set end_month=? where end_month=? and game_name=? and region=? and season=?");
                            $stmt = $db->prepare($query);
                            $error = $stmt->execute(array($up_data, $ori_data, $lim1, $lim2, $lim3));
                        }
                    }
                    if ($hold == 0) {
                        echo "<script>", 'print1();', '</script>';
                    } else {
                        echo "<script type='text/javascript'>";
                        echo "setTimeout(function(){
                            window.location.href = window.location.href;},1500)";
                        echo "</script>";
                    }

                } else if ($attributes_name == "end_date") {
                    $lim1 = $_POST["lim1"];
                    $lim2 = $_POST["lim2"];
                    $lim3 = $_POST["lim3"];
                    $all = ("select * from region_name");
                    $stmt = $db->prepare($all);
                    $stmt->execute();
                    $all_result = $stmt->fetchAll();
                    $hold = 0;
                    for ($i = 0; $i < count($all_result); $i++) {
                        if (
                            $all_result[$i]['end_date'] == $ori_data && $all_result[$i]['game_name'] == $lim1 && $all_result[$i]['region'] == $lim2
                            && $all_result[$i]['season'] == $lim3
                        ) {
                            $hold = 1;
                            echo "<script>", 'print2();', '</script>';
                            $query = ("update region_name set end_date=? where end_date=? and game_name=? and region=? and season=?");
                            $stmt = $db->prepare($query);
                            $error = $stmt->execute(array($up_data, $ori_data, $lim1, $lim2, $lim3));
                        }
                    }
                    if ($hold == 0) {
                        echo "<script>", 'print1();', '</script>';
                    } else {
                        echo "<script type='text/javascript'>";
                        echo "setTimeout(function(){
                            window.location.href = window.location.href;},1500)";
                        echo "</script>";
                    }

                } else if ($attributes_name == "team") {
                    $lim = $_POST["lim"];
                    $all = ("select * from team_info");
                    $stmt = $db->prepare($all);
                    $stmt->execute();
                    $all_result = $stmt->fetchAll();
                    $hold = 0;
                    for ($i = 0; $i < count($all_result); $i++) {
                        if ($all_result[$i]['team'] == $ori_data && $all_result[$i]['game_name'] == $lim) {
                            $hold = 1;
                            echo "<script>", 'print2();', '</script>';
                            $query = ("update team_info set team=? where team=? and game_name=?");
                            $stmt = $db->prepare($query);
                            $error = $stmt->execute(array($up_data, $ori_data, $lim));
                        }
                    }
                    if ($hold == 0) {
                        echo "<script>", 'print1();', '</script>';
                    } else {
                        echo "<script type='text/javascript'>";
                        echo "setTimeout(function(){
                            window.location.href = window.location.href;},1500)";
                        echo "</script>";
                    }

                } else if ($attributes_name == "location") {
                    $lim1 = $_POST["lim1"];
                    $lim2 = $_POST["lim2"];
                    $all = ("select * from team_info");
                    $stmt = $db->prepare($all);
                    $stmt->execute();
                    $all_result = $stmt->fetchAll();
                    $hold = 0;
                    for ($i = 0; $i < count($all_result); $i++) {
                        if ($all_result[$i]['location'] == $ori_data && $all_result[$i]['game_name'] == $lim1 && $all_result[$i]['team'] == $lim2) {
                            $hold = 1;
                            echo "<script>", 'print2();', '</script>';
                            $query = ("update team_info set location=? where location=? and game_name=? and team=?");
                            $stmt = $db->prepare($query);
                            $error = $stmt->execute(array($up_data, $ori_data, $lim1, $lim2));
                        }
                    }
                    if ($hold == 0) {
                        echo "<script>", 'print1();', '</script>';
                    } else {
                        echo "<script type='text/javascript'>";
                        echo "setTimeout(function(){
                            window.location.href = window.location.href;},1500)";
                        echo "</script>";
                    }

                } else if ($attributes_name == "month") {
                    $lim1 = $_POST["lim1"];
                    $lim2 = $_POST["lim2"];
                    $lim3 = $_POST["lim3"];
                    $lim4 = $_POST["lim4"];
                    $lim5 = $_POST["lim5"];
                    $lim6 = $_POST["lim6"];
                    $all = ("select * from contest");
                    $stmt = $db->prepare($all);
                    $stmt->execute();
                    $all_result = $stmt->fetchAll();
                    $hold = 0;
                    for ($i = 0; $i < count($all_result); $i++) {
                        if (
                            $all_result[$i]['month'] == $ori_data && $all_result[$i]['game_name'] == $lim1 && $all_result[$i]['region'] == $lim2
                            && $all_result[$i]['date'] == $lim3 && $all_result[$i]['time'] == $lim4 && $all_result[$i]['team1'] == $lim5
                            && $all_result[$i]['team2'] == $lim6
                        ) {
                            $hold = 1;
                            echo "<script>", 'print2();', '</script>';
                            $query = ("update contest set month=? where month=? and game_name=? and region=? and date=? and time=? and team1=? and team2=?");
                            $stmt = $db->prepare($query);
                            $error = $stmt->execute(array($up_data, $ori_data, $lim1, $lim2, $lim3, $lim4, $lim5, $lim6));
                        }
                    }
                    if ($hold == 0) {
                        echo "<script>", 'print1();', '</script>';
                    } else {
                        echo "<script type='text/javascript'>";
                        echo "setTimeout(function(){
                            window.location.href = window.location.href;},1500)";
                        echo "</script>";
                    }

                } else if ($attributes_name == "date") {
                    $lim1 = $_POST["lim1"];
                    $lim2 = $_POST["lim2"];
                    $lim3 = $_POST["lim3"];
                    $lim4 = $_POST["lim4"];
                    $lim5 = $_POST["lim5"];
                    $lim6 = $_POST["lim6"];
                    $all = ("select * from contest");
                    $stmt = $db->prepare($all);
                    $stmt->execute();
                    $all_result = $stmt->fetchAll();
                    $hold = 0;
                    for ($i = 0; $i < count($all_result); $i++) {
                        if (
                            $all_result[$i]['date'] == $ori_data && $all_result[$i]['game_name'] == $lim1 && $all_result[$i]['region'] == $lim2
                            && $all_result[$i]['month'] == $lim3 && $all_result[$i]['time'] == $lim4 && $all_result[$i]['team1'] == $lim5
                            && $all_result[$i]['team2'] == $lim6
                        ) {
                            $hold = 1;
                            echo "<script>", 'print2();', '</script>';
                            $query = ("update contest set date=? where date=? and game_name=? and region=? and month=? and time=? and team1=? and team2=?");
                            $stmt = $db->prepare($query);
                            $error = $stmt->execute(array($up_data, $ori_data, $lim1, $lim2, $lim3, $lim4, $lim5, $lim6));
                        }
                    }
                    if ($hold == 0) {
                        echo "<script>", 'print1();', '</script>';
                    } else {
                        echo "<script type='text/javascript'>";
                        echo "setTimeout(function(){
                            window.location.href = window.location.href;},1500)";
                        echo "</script>";
                    }

                } else if ($attributes_name == "time") {
                    $lim1 = $_POST["lim1"];
                    $lim2 = $_POST["lim2"];
                    $lim3 = $_POST["lim3"];
                    $lim4 = $_POST["lim4"];
                    $lim5 = $_POST["lim5"];
                    $lim6 = $_POST["lim6"];
                    $all = ("select * from contest");
                    $stmt = $db->prepare($all);
                    $stmt->execute();
                    $all_result = $stmt->fetchAll();
                    $hold = 0;
                    for ($i = 0; $i < count($all_result); $i++) {
                        if (
                            $all_result[$i]['time'] == $ori_data && $all_result[$i]['game_name'] == $lim1 && $all_result[$i]['region'] == $lim2
                            && $all_result[$i]['month'] == $lim3 && $all_result[$i]['date'] == $lim4 && $all_result[$i]['team1'] == $lim5
                            && $all_result[$i]['team2'] == $lim6
                        ) {
                            $hold = 1;
                            echo "<script>", 'print2();', '</script>';
                            $query = ("update contest set time=? where time=? and game_name=? and region=? and month=? and date=? and team1=? and team2=?");
                            $stmt = $db->prepare($query);
                            $error = $stmt->execute(array($up_data, $ori_data, $lim1, $lim2, $lim3, $lim4, $lim5, $lim6));
                        }
                    }
                    if ($hold == 0) {
                        echo "<script>", 'print1();', '</script>';
                    } else {
                        echo "<script type='text/javascript'>";
                        echo "setTimeout(function(){
                            window.location.href = window.location.href;},1500)";
                        echo "</script>";
                    }

                } else if ($attributes_name == "team1") {
                    $lim1 = $_POST["lim1"];
                    $lim2 = $_POST["lim2"];
                    $lim3 = $_POST["lim3"];
                    $lim4 = $_POST["lim4"];
                    $lim5 = $_POST["lim5"];
                    $lim6 = $_POST["lim6"];
                    $all = ("select * from contest");
                    $stmt = $db->prepare($all);
                    $stmt->execute();
                    $all_result = $stmt->fetchAll();
                    $hold = 0;
                    for ($i = 0; $i < count($all_result); $i++) {
                        if (
                            $all_result[$i]['team1'] == $ori_data && $all_result[$i]['game_name'] == $lim1 && $all_result[$i]['region'] == $lim2
                            && $all_result[$i]['month'] == $lim3 && $all_result[$i]['date'] == $lim4 && $all_result[$i]['time'] == $lim5
                            && $all_result[$i]['team2'] == $lim6
                        ) {
                            $hold = 1;
                            echo "<script>", 'print2();', '</script>';
                            $query = ("update contest set team1=? where team1=? and game_name=? and region=? and month=? and date=? and time=? and team2=?");
                            $stmt = $db->prepare($query);
                            $error = $stmt->execute(array($up_data, $ori_data, $lim1, $lim2, $lim3, $lim4, $lim5, $lim6));
                        }
                    }
                    if ($hold == 0) {
                        echo "<script>", 'print1();', '</script>';
                    } else {
                        echo "<script type='text/javascript'>";
                        echo "setTimeout(function(){
                            window.location.href = window.location.href;},1500)";
                        echo "</script>";
                    }

                } else if ($attributes_name == "team2") {
                    $lim1 = $_POST["lim1"];
                    $lim2 = $_POST["lim2"];
                    $lim3 = $_POST["lim3"];
                    $lim4 = $_POST["lim4"];
                    $lim5 = $_POST["lim5"];
                    $lim6 = $_POST["lim6"];
                    $all = ("select * from contest");
                    $stmt = $db->prepare($all);
                    $stmt->execute();
                    $all_result = $stmt->fetchAll();
                    $hold = 0;
                    for ($i = 0; $i < count($all_result); $i++) {
                        if (
                            $all_result[$i]['team2'] == $ori_data && $all_result[$i]['game_name'] == $lim1 && $all_result[$i]['region'] == $lim2
                            && $all_result[$i]['month'] == $lim3 && $all_result[$i]['date'] == $lim4 && $all_result[$i]['time'] == $lim5
                            && $all_result[$i]['team1'] == $lim6
                        ) {
                            $hold = 1;
                            echo "<script>", 'print2();', '</script>';
                            $query = ("update contest set team2=? where team2=? and game_name=? and region=? and month=? and date=? and time=? and team1=?");
                            $stmt = $db->prepare($query);
                            $error = $stmt->execute(array($up_data, $ori_data, $lim1, $lim2, $lim3, $lim4, $lim5, $lim6));
                        }
                    }
                    if ($hold == 0) {
                        echo "<script>", 'print1();', '</script>';
                    } else {
                        echo "<script type='text/javascript'>";
                        echo "setTimeout(function(){
                            window.location.href = window.location.href;},1500)";
                        echo "</script>";
                    }

                } else if ($attributes_name == "win_team") {
                    $lim1 = $_POST["lim1"];
                    $lim2 = $_POST["lim2"];
                    $lim3 = $_POST["lim3"];
                    $lim4 = $_POST["lim4"];
                    $lim5 = $_POST["lim5"];
                    $lim6 = $_POST["lim6"];
                    $lim7 = $_POST["lim7"];
                    $all = ("select * from contest");
                    $stmt = $db->prepare($all);
                    $stmt->execute();
                    $all_result = $stmt->fetchAll();
                    $hold = 0;
                    for ($i = 0; $i < count($all_result); $i++) {
                        if (
                            $all_result[$i]['win_team'] == $ori_data && $all_result[$i]['game_name'] == $lim1 && $all_result[$i]['region'] == $lim2
                            && $all_result[$i]['month'] == $lim3 && $all_result[$i]['date'] == $lim4 && $all_result[$i]['time'] == $lim5
                            && $all_result[$i]['team1'] == $lim6 && $all_result[$i]['team2'] == $lim7
                        ) {
                            $hold = 1;
                            echo "<script>", 'print2();', '</script>';
                            $query = ("update contest set win_team=? where win_team=? and game_name=? and region=? and month=? and date=? and time=? and team1=? and team2=?");
                            $stmt = $db->prepare($query);
                            $error = $stmt->execute(array($up_data, $ori_data, $lim1, $lim2, $lim3, $lim4, $lim5, $lim6, $lim7));
                        }
                    }
                    if ($hold == 0) {
                        echo "<script>", 'print1();', '</script>';
                    } else {
                        echo "<script type='text/javascript'>";
                        echo "setTimeout(function(){
                            window.location.href = window.location.href;},1500)";
                        echo "</script>";
                    }

                }
            }
        }
        ?>
    </div>
    <div id="err1">
        錯誤的更新!
    </div>
    <div id="err2">
        正確的更新!
    </div>
    <div id="fade"></div>
</body>

</html>