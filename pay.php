<?php 
    session_start();
    if (isset($_SESSION["userpoint"])) {
        // $_SESSION["userpoint"] 변수가 설정되어 있으면 해당 값을 사용합니다.
        $userpoint = $_SESSION["userpoint"];
    } else {
        // $_SESSION["userpoint"] 변수가 설정되어 있지 않으면 예외 처리 등을 수행합니다.
        echo "사용자 포인트를 찾을 수 없습니다.";
    }
    ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>PHP CAFE</title>
    <link rel="stylesheet" type="text/css" href="./css/common2.css">
    <link rel="stylesheet" type="text/css" href="./css/member.css">
    <link href="https://fonts.googleapis.com/css2?family=Hi+Melody&display=swap" rel="stylesheet">
    <style>
        body {

            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        header, footer {

            color: black;
            padding: 10px 0;
            text-align: center;
        }
        #order_summary {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            max-width: 600px;
            margin: 30px auto;
            padding: 20px;
            text-align: center;
        }
        #order_summary h2 {
            margin-bottom: 20px;
        }
        .order_item {
            margin-bottom: 10px;
        }
        .total, .points, .summary {
            font-weight: bold;
            margin: 10px 0;
        }
        #mypoint {
            width: 100px;
            padding: 5px;
            text-align: center;
        }
        input[type="button"] {
            background-color: #333;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            display: inline-block;
            font-size: 16px;
            margin: 10px 0;
            cursor: pointer;
            border-radius: 5px;
        }
        input[type="button"]:hover {
            background-color: #555;
        }
    </style>
    <script>
        function pay() {

            let pointInput = document.getElementById("mypoint");
            let point = pointInput.value.trim(); // 입력된 포인트 값을 가져옴

            if (!/^\d+$/.test(point)) { // 입력된 값이 숫자가 아닌 경우
                alert("숫자를 입력하세요."); // 오류 메시지 표시
                pointInput.value = ""; // 입력된 값을 지우고
                pointInput.focus(); // 포커스를 다시 입력 상자로 이동시킴
                return; // 함수 종료
            }

            let ax = parseInt(document.getElementById("sum1").innerText); // 합계 값 가져오기
            let mp = parseInt(document.getElementById("mp").innerText);

            point = parseInt(point); // 입력된 값을 정수형으로 변환

            if (point> mp || point > ax*0.7 ) { // 입력된 값이 내가 가지고 있는 point 보다 크거나이거나 합계보다 큰 경우
                alert("사용가능한 point 를 넘었습니다."); // 오류 메시지 표시
                pointInput.value = ""; // 입력된 값을 지우고
                pointInput.focus(); // 포커스를 다시 입력 상자로 이동시킴
                return; // 함수 종료
            }
            else{
                let point = document.getElementById("mypoint").value;
            let sum1 = document.getElementById("sum1").innerText;
            window.open("pay_w.php?point=" + point + "&sum1=" + sum1,
                "IDcheck",
                "left=700,top=300,width=500,height=500,scrollbars=no,resizable=yes");
            }




        }
    </script>
</head>
<body>

    <header>
        <?php include "header.php"; ?>
    </header>
    <section>
        <div id="order_summary">
            <h2>주문내역</h2>
            <?php
            $con = mysqli_connect("localhost", "user1", "12345", "sample");
            $sql = "select * from coffee";
            $result = mysqli_query($con, $sql);
            $total_record = mysqli_num_rows($result);
            $menu = array();
            $price = array();
            for ($i = 0; $i < $total_record; $i++) {
                $row = mysqli_fetch_array($result);
                $menu[$i] = $row['food'];
                $price[$i] = $row['price'];
            }
            mysqli_close($con);

            $ax = 0;
            $num = count($_POST["coffee"]);
            for ($i = 0; $i < $num; $i++) {
                $idx = $_POST["coffee"][$i];
                echo "<div class='order_item'>".$menu[$idx]." ".$_POST["x"][$idx]."잔 = ".$price[$idx]*$_POST["x"][$idx]."원</div>";
                $ax = $ax + $price[$idx]*$_POST["x"][$idx];
            }
            
            echo "<div class='total'>합계 : <span id='sum1'>".$ax."</span>원</div>";
            echo "<div class='points'>보유 Point : <span id='mp'><br>".$_SESSION["userpoint"]."</span>_p<br>최대사용가능한 point :".$ax*0.7."point</div>";
            echo "<input type='text' id='mypoint'  value='0' /><br>";
            echo "<div class='summary'>적립금 : ".floor($ax*0.025)."포인트 적립됩니다</div>";
            echo "<input type='button' value='결제하기' onclick='pay()'>" ;
            ?>
        </div>
    </section>
    <footer>
        <?php include "footer.php"; ?>
    </footer>
</body>
</html>
