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
    <title>新增資料</title>
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
                <h1>新增資料</h1>
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
        <form action="insert.php" method="post">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-2">要新增的類型:</div>
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
                $table_name = $_POST["table_name"];
                if ($table_name == "game") {
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>遊戲名稱:</div><div class='col-sm-4'>";
                    echo "<input type='text' placeholder='League of Legends' name='data1' style='border: 2px solid black; background-color: white; width: 300px;'></div><div class='col-sm-3'></div></div>";
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>開發商:</div><div class='col-sm-4'>";
                    echo "<input type='text' placeholder='Riot' name='data2' style='border: 2px solid black; background-color: white; width: 300px;'></div><div class='col-sm-3'></div></div>";
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>logo圖片連結:</div><div class='col-sm-4'>";
                    echo "<input type='text' placeholder='https://i.pinimg.com/474x/ca/19/98/ca199818f18f7a6e778be38d733516c7.jpg' name='data3' style='border: 2px solid black; background-color: white; width: 300px;'></div><div class='col-sm-3'></div></div>";
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>遊戲簡介:</div><div class='col-sm-4'>";
                    echo "<input type='text' placeholder='一款5v5多人線上戰鬥技術型(MOBA)遊戲' name='data4' style='border: 2px solid black; background-color: white; width: 300px;'></div><div class='col-sm-3'></div></div>";
                } else if ($table_name == "player") {
                    $query = ("select distinct game_name from game");
                    $stmt = $db->prepare($query);
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>遊戲名稱: </div><div class='col-sm-4'><select name='data1'>";
                    for ($i = 0; $i < count($result); $i++) {
                        echo "<option value='" . $result[$i]['game_name'] . "'>" . $result[$i]['game_name'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>選手名稱:</div><div class='col-sm-4'>";
                    echo "<input type='text' placeholder='Faker' name='data2' style='border: 2px solid black; background-color: white; width: 300px;'></div><div class='col-sm-3'></div></div>";
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>選手國籍:</div><div class='col-sm-4'>";
                    echo "<input type='text' placeholder='Korea' name='data3' style='border: 2px solid black; background-color: white; width: 300px;'></div><div class='col-sm-3'></div></div>";
                    $query1 = ("select distinct team from team_info");
                    $stmt = $db->prepare($query1);
                    $stmt->execute();
                    $result1 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>選手隊伍: </div><div class='col-sm-4'><select name='data4'>";
                    for ($i = 0; $i < count($result1); $i++) {
                        echo "<option value='" . $result1[$i]['team'] . "'>" . $result1[$i]['team'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                } else if ($table_name == "region_name") {
                    $query = ("select distinct game_name from game");
                    $stmt = $db->prepare($query);
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>遊戲名稱: </div><div class='col-sm-4'><select name='data1'>";
                    for ($i = 0; $i < count($result); $i++) {
                        echo "<option value='" . $result[$i]['game_name'] . "'>" . $result[$i]['game_name'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";

                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>賽區:</div><div class='col-sm-4'>";
                    echo "<input type='text' placeholder='LCK' name='data2' style='border: 2px solid black; background-color: white; width: 300px;'></div><div class='col-sm-3'></div></div>";

                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>賽季:</div><div class='col-sm-4'>";
                    echo "<input type='text' placeholder='spring' name='data3' style='border: 2px solid black; background-color: white; width: 300px;'></div><div class='col-sm-3'></div></div>";

                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>開始月份:</div><div class='col-sm-4'>";
                    echo "<input type='text' placeholder='1' name='data4' style='border: 2px solid black; background-color: white; width: 300px;'></div><div class='col-sm-3'></div></div>";

                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>開始日期:</div><div class='col-sm-4'>";
                    echo "<input type='text' placeholder='21' name='data5' style='border: 2px solid black; background-color: white; width: 300px;'></div><div class='col-sm-3'></div></div>";


                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>結束月份:</div><div class='col-sm-4'>";
                    echo "<input type='text' placeholder='4' name='data6' style='border: 2px solid black; background-color: white; width: 300px;'></div><div class='col-sm-3'></div></div>";

                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>結束日期:</div><div class='col-sm-4'>";
                    echo "<input type='text' placeholder='21' name='data7' style='border: 2px solid black; background-color: white; width: 300px;'></div><div class='col-sm-3'></div></div>";
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-6'>*月、日請填寫合法數字，不合法的會不予插入</div>";
                    echo "<div class='col-sm-3'></div></div>";
                } else if ($table_name == "contest") {
                    $query = ("select distinct game_name from game");
                    $stmt = $db->prepare($query);
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>遊戲名稱: </div><div class='col-sm-4'><select name='data1'>";
                    for ($i = 0; $i < count($result); $i++) {
                        echo "<option value='" . $result[$i]['game_name'] . "'>" . $result[$i]['game_name'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";

                    $query1 = ("select distinct region from region_name");
                    $stmt = $db->prepare($query1);
                    $stmt->execute();
                    $result1 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>賽區: </div><div class='col-sm-4'><select name='data2'>";
                    for ($i = 0; $i < count($result1); $i++) {
                        echo "<option value='" . $result1[$i]['region'] . "'>" . $result1[$i]['region'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";

                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>月份:</div><div class='col-sm-4'>";
                    echo "<input type='text' placeholder='1' name='data3' style='border: 2px solid black; background-color: white; width: 300px;'></div><div class='col-sm-3'></div></div>";

                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>日期:</div><div class='col-sm-4'>";
                    echo "<input type='text' placeholder='25' name='data4' style='border: 2px solid black; background-color: white; width: 300px;'></div><div class='col-sm-3'></div></div>";

                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>時間:</div><div class='col-sm-4'>";
                    echo "<input type='text' placeholder='1600' name='data5' style='border: 2px solid black; background-color: white; width: 300px;'></div><div class='col-sm-3'></div></div>";

                    $query2 = ("select distinct team from team_info");
                    $stmt = $db->prepare($query2);
                    $stmt->execute();
                    $result2 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>隊伍1: </div><div class='col-sm-4'><select name='data6'>";
                    for ($i = 0; $i < count($result2); $i++) {
                        echo "<option value='" . $result2[$i]['team'] . "'>" . $result2[$i]['team'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";

                    $query3 = ("select distinct team from team_info");
                    $stmt = $db->prepare($query3);
                    $stmt->execute();
                    $result3 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>隊伍2: </div><div class='col-sm-4'><select name='data7'>";
                    for ($i = 0; $i < count($result3); $i++) {
                        echo "<option value='" . $result3[$i]['team'] . "'>" . $result3[$i]['team'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";

                    $query4 = ("select distinct team from team_info");
                    $stmt = $db->prepare($query3);
                    $stmt->execute();
                    $result4 = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>勝利隊伍: </div><div class='col-sm-4'><select name='data8'>";
                    for ($i = 0; $i < count($result4); $i++) {
                        echo "<option value='" . $result3[$i]['team'] . "'>" . $result3[$i]['team'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-6'>*月、日、時請填寫合法數字，不合法的會不予插入</div>";
                    echo "<div class='col-sm-3'></div></div>";
                } else if ($table_name == "team_info") {
                    $query = ("select distinct game_name from game");
                    $stmt = $db->prepare($query);
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>遊戲名稱: </div><div class='col-sm-4'><select name='data1'>";
                    for ($i = 0; $i < count($result); $i++) {
                        echo "<option value='" . $result[$i]['game_name'] . "'>" . $result[$i]['game_name'] . "</option>";
                    }
                    echo "</select></div><div class='col-sm-3'></div></div>";
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>隊伍:</div><div class='col-sm-4'>";
                    echo "<input type='text' placeholder='T1' name='data2' style='border: 2px solid black; background-color: white; width: 300px;'></div><div class='col-sm-3'></div></div>";
                    echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-2'>隊伍所在國家:</div><div class='col-sm-4'>";
                    echo "<input type='text' placeholder='Korea' name='data3' style='border: 2px solid black; background-color: white; width: 300px;'></div><div class='col-sm-3'></div></div>";

                }
                echo "<div class='row'><div class='col-sm-3'></div><div class='col-sm-6'><input type='submit' name='submit' value='新增'>";
                echo "</div><div class='col-sm-3'></div></div>";
            }
            ?>
        </form>
        <?php
        include_once "team18_database.php";
        $check = $_POST;
        if ($check) {
            $submit = $_POST["submit"];
            if ($submit == "新增") {
                $table_name = $_POST["table_name"];
                if ($table_name == "game") {
                    $data1 = $_POST["data1"];
                    $data2 = $_POST["data2"];
                    $data3 = $_POST["data3"];
                    $data4 = $_POST["data4"];
                    try {
                        $query = ("insert into game values(?,?,?,?)");
                        $stmt = $db->prepare($query);
                        $e = $stmt->execute(array($data1, $data2, $data3, $data4));
                        echo "<script>", 'print2();', '</script>';
                        echo "<script type='text/javascript'>";
                        echo "setTimeout(function(){
                                    window.location.href = window.location.href;},1500)";
                        echo "</script>";
                    } catch (PDOException $e) {
                        echo $e;
                        echo "<script>", 'print1();', '</script>';
                    }
                } else if ($table_name == "player") {
                    $data1 = $_POST["data1"];
                    $data2 = $_POST["data2"];
                    $data3 = $_POST["data3"];
                    $data4 = $_POST["data4"];
                    try {
                        $query = ("insert into player values(?,?,?,?)");
                        $stmt = $db->prepare($query);
                        $e = $stmt->execute(array($data2, $data3, $data4, $data1));
                        echo "<script>", 'print2();', '</script>';
                        echo "<script type='text/javascript'>";
                        echo "setTimeout(function(){
                                    window.location.href = window.location.href;},1500)";
                        echo "</script>";
                    } catch (PDOException $e) {
                        echo $e;
                        echo "<script>", 'print1();', '</script>';
                    }
                } else if ($table_name == "region_name") {
                    $data1 = $_POST["data1"];
                    $data2 = $_POST["data2"];
                    $data3 = $_POST["data3"];
                    $data4 = $_POST["data4"];
                    $data5 = $_POST["data5"];
                    $data6 = $_POST["data6"];
                    $data7 = $_POST["data7"];
                    try {
                        $query = ("insert into region_name values(?,?,?,?,?,?,?)");
                        $stmt = $db->prepare($query);
                        $stmt->execute(array($data1, $data2, $data3, $data4, $data5, $data6, $data7));
                        echo "<script>", 'print2();', '</script>';
                        echo "<script type='text/javascript'>";
                        echo "setTimeout(function(){
                                    window.location.href = window.location.href;},1500)";
                        echo "</script>";
                    } catch (PDOException $e) {
                        echo $e;
                        echo "<script>", 'print1();', '</script>';
                    }
                } else if ($table_name == "team_info") {
                    $data1 = $_POST["data1"];
                    $data2 = $_POST["data2"];
                    $data3 = $_POST["data3"];
                    try {
                        $query = ("insert into team_info values(?,?,?)");
                        $stmt = $db->prepare($query);
                        $stmt->execute(array($data2, $data3, $data1));
                        echo "<script>", 'print2();', '</script>';
                        echo "<script type='text/javascript'>";
                        echo "setTimeout(function(){
                                    window.location.href = window.location.href;},1500)";
                        echo "</script>";
                    } catch (PDOException $e) {
                        echo $e;
                        echo "<script>", 'print1();', '</script>';
                    }
                } else if ($table_name == "contest") {
                    $data1 = $_POST["data1"];
                    $data2 = $_POST["data2"];
                    $data3 = $_POST["data3"];
                    $data4 = $_POST["data4"];
                    $data5 = $_POST["data5"];
                    $data6 = $_POST["data6"];
                    $data7 = $_POST["data7"];
                    $data8 = $_POST["data8"];
                    try {
                        $query = ("insert into contest values(?,?,?,?,?,?,?,?)");
                        $stmt = $db->prepare($query);
                        $stmt->execute(array($data1, $data2, $data3, $data4, $data5, $data6, $data7, $data8));
                        echo "<script>", 'print2();', '</script>';
                        echo "<script type='text/javascript'>";
                        echo "setTimeout(function(){
                                    window.location.href = window.location.href;},1500)";
                        echo "</script>";
                    } catch (PDOException $e) {
                        echo $e;
                        echo "<script>", 'print1();', '</script>';
                    }

                }
            }
        }
        ?>
    </div>
    <div id="err1">
        錯誤的新增!
    </div>
    <div id="err2">
        正確的新增!
    </div>
    <div id="fade"></div>
</body>

</html>