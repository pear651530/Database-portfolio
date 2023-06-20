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
    <title>刪除資料</title>
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
                <h1>刪除資料</h1>
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
        <form action="delete.php" method="post">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-2">要刪除的類型:</div>
                <div class="col-sm-4">
                    <select name="table_name" id="table_name">
                        <option value="game">遊戲資訊</option>
                        <option value="player">選手資訊</option>
                        <option value="region_name">賽區資訊</option>
                        <option value="team_info">隊伍資訊</option>
                        <option value="contest">比賽資訊</option>
                    </select>
                    <input type="submit" name="submit" value="確定">
                    <script type="text/javascript">
                        document.getElementById('table_name').value = "<?php echo $_POST['table_name']; ?>";
                    </script>
                </div>
                <div class="col-sm-3"></div>
            </div>
            <?php
            include_once "team18_database.php";
            $check = $_POST;
            if ($check) {
                echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>要刪的內容</div><div class='col-sm-4'></div><div class='col-sm-3'></div></div>";
                $table_name = $_POST["table_name"];
                if ($table_name == "game") {
                    $query = ("select distinct game_name from game");
                    $stmt = $db->prepare($query);
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>遊戲名稱:</div><div class='col-sm-4'><select name='data'>";
                    for ($i = 0; $i < count($result); $i++) {
                        echo "<option value='" . $result[$i]['game_name'] . "'>" . $result[$i]['game_name'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                } else if ($table_name == "player") {
                    $query1 = ("select distinct game_name from player");
                    $stmt = $db->prepare($query1);
                    $stmt->execute();
                    $result1 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>遊戲名稱:</div><div class='col-sm-4'><select name='data1'>";
                    for ($i = 0; $i < count($result1); $i++) {
                        echo "<option value='" . $result1[$i]['game_name'] . "'>" . $result1[$i]['game_name'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query2 = ("select distinct name from player");
                    $stmt = $db->prepare($query2);
                    $stmt->execute();
                    $result2 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>選手名稱:</div><div class='col-sm-4'><select name='data2'>";
                    for ($i = 0; $i < count($result2); $i++) {
                        echo "<option value='" . $result2[$i]['name'] . "'>" . $result2[$i]['name'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                } else if ($table_name == "region_name") {
                    $query1 = ("select distinct game_name from region_name");
                    $stmt = $db->prepare($query1);
                    $stmt->execute();
                    $result1 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>遊戲名稱:</div><div class='col-sm-4'><select name='data1'>";
                    for ($i = 0; $i < count($result1); $i++) {
                        echo "<option value='" . $result1[$i]['game_name'] . "'>" . $result1[$i]['game_name'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query2 = ("select distinct region from region_name");
                    $stmt = $db->prepare($query2);
                    $stmt->execute();
                    $result2 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>賽區:</div><div class='col-sm-4'><select name='data2'>";
                    for ($i = 0; $i < count($result2); $i++) {
                        echo "<option value='" . $result2[$i]['region'] . "'>" . $result2[$i]['region'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query3 = ("select distinct season from region_name");
                    $stmt = $db->prepare($query3);
                    $stmt->execute();
                    $result3 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>賽季:</div><div class='col-sm-4'><select name='data3'>";
                    for ($i = 0; $i < count($result3); $i++) {
                        echo "<option value='" . $result3[$i]['season'] . "'>" . $result3[$i]['season'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                } else if ($table_name == "contest") {
                    $query1 = ("select distinct game_name from contest");
                    $stmt = $db->prepare($query1);
                    $stmt->execute();
                    $result1 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>遊戲名稱:</div><div class='col-sm-4'><select name='data1'>";
                    for ($i = 0; $i < count($result1); $i++) {
                        echo "<option value='" . $result1[$i]['game_name'] . "'>" . $result1[$i]['game_name'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query2 = ("select distinct region from contest");
                    $stmt = $db->prepare($query2);
                    $stmt->execute();
                    $result2 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>賽區:</div><div class='col-sm-4'><select name='data2'>";
                    for ($i = 0; $i < count($result2); $i++) {
                        echo "<option value='" . $result2[$i]['region'] . "'>" . $result2[$i]['region'] . "</option>";
                    }

                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query3 = ("select distinct month from contest");
                    $stmt = $db->prepare($query3);
                    $stmt->execute();
                    $result3 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>月份:</div><div class='col-sm-4'><select name='data3'>";
                    for ($i = 0; $i < count($result3); $i++) {
                        echo "<option value='" . $result3[$i]['month'] . "'>" . $result3[$i]['month'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";

                    $query4 = ("select distinct date from contest");
                    $stmt = $db->prepare($query4);
                    $stmt->execute();
                    $result4 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>日期:</div><div class='col-sm-4'><select name='data4'>";
                    for ($i = 0; $i < count($result4); $i++) {
                        echo "<option value='" . $result4[$i]['date'] . "'>" . $result4[$i]['date'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";

                    $query5 = ("select distinct time from contest");
                    $stmt = $db->prepare($query5);
                    $stmt->execute();
                    $result5 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>時間:</div><div class='col-sm-4'><select name='data5'>";
                    for ($i = 0; $i < count($result5); $i++) {
                        echo "<option value='" . $result5[$i]['time'] . "'>" . $result5[$i]['time'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";

                    $query6 = ("select distinct team1 from contest");
                    $stmt = $db->prepare($query6);
                    $stmt->execute();
                    $result6 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>隊伍1:</div><div class='col-sm-4'><select name='data6'>";
                    for ($i = 0; $i < count($result6); $i++) {
                        echo "<option value='" . $result6[$i]['team1'] . "'>" . $result6[$i]['team1'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";

                    $query7 = ("select distinct team2 from contest");
                    $stmt = $db->prepare($query7);
                    $stmt->execute();
                    $result7 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>隊伍2:</div><div class='col-sm-4'><select name='data7'>";
                    for ($i = 0; $i < count($result7); $i++) {
                        echo "<option value='" . $result7[$i]['team2'] . "'>" . $result7[$i]['team2'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                } else if ($table_name == "team_info") {
                    $query2 = ("select distinct game_name from team_info");
                    $stmt = $db->prepare($query2);
                    $stmt->execute();
                    $result2 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>遊戲名稱:</div><div class='col-sm-4'><select name='data2'>";
                    for ($i = 0; $i < count($result2); $i++) {
                        echo "<option value='" . $result2[$i]['game_name'] . "'>" . $result2[$i]['game_name'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    $query1 = ("select distinct team from team_info");
                    $stmt = $db->prepare($query1);
                    $stmt->execute();
                    $result1 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>隊伍名稱:</div><div class='col-sm-4'><select name='data1'>";
                    for ($i = 0; $i < count($result1); $i++) {
                        echo "<option value='" . $result1[$i]['team'] . "'>" . $result1[$i]['team'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                }
                echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-6'><input type='submit' name='submit' value='刪除'>";
                echo "</div><div class='col-sm-3'></div></div>";
            }
            ?>
        </form>
        <?php
        include_once "team18_database.php";
        $check = $_POST;
        if ($check) {
            $button = $_POST["submit"];
            if ($button == "刪除") {
                $table_name = $_POST["table_name"];
                if ($table_name == "game") {
                    $data = $_POST["data"];
                    $query = ("delete from game where game_name=?");
                    $stmt = $db->prepare($query);
                    $error = $stmt->execute(array($data));
                    echo "<script>", 'print2();', '</script>';
                    echo "<script type='text/javascript'>";
                    echo "setTimeout(function(){
                            window.location.href = window.location.href;},1500)";
                    echo "</script>";
                } else if ($table_name == "player") {
                    $data1 = $_POST["data1"];
                    $data2 = $_POST["data2"];
                    $q = ("select * from player where game_name=? and name=?");
                    $stmt = $db->prepare($q);
                    $stmt->execute(array($data1, $data2));
                    $result = $stmt->fetchAll();
                    if (count($result) == 0) {
                        echo "<script>", 'print1();', '</script>';
                    } else {
                        $query = ("delete from player where game_name=? and name=?");
                        $stmt = $db->prepare($query);
                        $error = $stmt->execute(array($data1, $data2));
                        echo "<script>", 'print2();', '</script>';
                        echo "<script type='text/javascript'>";
                        echo "setTimeout(function(){
                            window.location.href = window.location.href;},1500)";
                        echo "</script>";
                    }
                } else if ($table_name == "region_name") {
                    $data1 = $_POST["data1"];
                    $data2 = $_POST["data2"];
                    $data3 = $_POST["data3"];
                    $q = ("select * from region_name where game_name=? and region=? and season=?");
                    $stmt = $db->prepare($q);
                    $stmt->execute(array($data1, $data2, $data3));
                    $result = $stmt->fetchAll();
                    if (count($result) == 0) {
                        echo "<script>", 'print1();', '</script>';
                    } else {
                        $query = ("delete from region_name where game_name=? and region=? and season=?");
                        $stmt = $db->prepare($query);
                        $error = $stmt->execute(array($data1, $data2, $data3));
                        echo "<script>", 'print2();', '</script>';
                        echo "<script type='text/javascript'>";
                        echo "setTimeout(function(){
                            window.location.href = window.location.href;},1500)";
                        echo "</script>";
                    }
                    
                } else if ($table_name == "contest") {
                    $data1 = $_POST["data1"];
                    $data2 = $_POST["data2"];
                    $data3 = $_POST["data3"];
                    $data4 = $_POST["data4"];
                    $data5 = $_POST["data5"];
                    $data6 = $_POST["data6"];
                    $data7 = $_POST["data7"];
                    $q = ("select * from contest where game_name=? and region=? and month=? and date=? and time=? and team1=? and team2=?");
                    $stmt = $db->prepare($q);
                    $stmt->execute(array($data1, $data2, $data3, $data4, $data5, $data6, $data7));
                    $result = $stmt->fetchAll();
                    if (count($result) == 0) {
                        echo "<script>", 'print1();', '</script>';
                    } else {
                        $query = ("delete from contest where game_name=? and region=? and month=? and date=? and time=? and team1=? and team2=?");
                        $stmt = $db->prepare($query);
                        $error = $stmt->execute(array($data1, $data2, $data3, $data4, $data5, $data6, $data7));
                        echo "<script>", 'print2();', '</script>';
                        echo "<script type='text/javascript'>";
                        echo "setTimeout(function(){
                            window.location.href = window.location.href;},1500)";
                        echo "</script>";
                    }
                    
                } else if ($table_name == "team_info") {
                    $data1 = $_POST["data1"];
                    $data2 = $_POST["data2"];
                    $q = ("select * from team_info where team=? and game_name=?");
                    $stmt = $db->prepare($q);
                    $stmt->execute(array($data1, $data2));
                    $result = $stmt->fetchAll();
                    if (count($result) == 0) {
                        echo "<script>", 'print1();', '</script>';
                    } else {
                        $query = ("delete from team_info where team=? and game_name=? ");
                        $stmt = $db->prepare($query);
                        $error = $stmt->execute(array($data1, $data2));
                        echo "<script>", 'print2();', '</script>';
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
        錯誤的刪除!
    </div>
    <div id="err2">
        正確的刪除!
    </div>
    <div id="fade"></div>
</body>

</html>
