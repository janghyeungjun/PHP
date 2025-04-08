<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>충전확인</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        h1 {
            color: #343a40;
        }
        .receipt {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
            width: 100%;
        }
        .receipt p {
            font-size: 18px;
            color: #495057;
            margin: 10px 0;
        }
        .receipt button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 20px;
        }
        .receipt button:hover {
            background-color: #0056b3;
        }
    </style>
    <script>
        function closeWindow() {
            alert("충전이 완료되었습니다.");
            window.opener.location.href = 'index.php';  // 부모 창을 로그인 페이지로 리다이렉트
            window.close();  // 현재 창을 닫음
        }
    </script>
</head>
<body>
    <div class="receipt">
        <h1>포인트충전 영수증</h1>
        <?php
        //세션 오류 체크
        session_start();
        if (!isset($_SESSION["userpoint"]) || !isset($_SESSION["userid"])) {
            echo "<p>세션이 만료되었습니다. 다시 로그인해 주세요.</p>";
            exit();
        }

        $point = $_SESSION["userpoint"];
        $id = $_SESSION["userid"];
        $plus_point = isset($_GET["point"]) ? intval($_GET["point"]) : 0;

        echo "<p>".$plus_point."+". $plus_point*0.05 ."point 충전 완료 되었습니다.</p>";

        $con = mysqli_connect("localhost", "user1", "12345", "sample");
        //연결 검사
        if (mysqli_connect_errno()) {
            echo "<p>Failed to connect to MySQL: " . mysqli_connect_error() . "</p>";
            exit();
        }

        // 현재 포인트를 업데이트
        $new_point = $point + $plus_point +$plus_point*0.05;
        $sql_update = "UPDATE cafe SET point='$new_point' WHERE id='$id'";
        mysqli_query($con, $sql_update);

        // DB 사용
        $sql = "SELECT point FROM cafe WHERE id='$id'";
        $result = mysqli_query($con, $sql);
        if ($row = mysqli_fetch_array($result)) {
            $real_point = $row['point'];
            //세션에도 포인트 업데이트
            $_SESSION["userpoint"] = $real_point;

            echo "<p>남은 포인트는 $real_point 입니다.</p>";
        } else {
            echo "<p>포인트 정보를 가져올 수 없습니다.</p>";
        }
        mysqli_close($con);
        ?>
        <button onclick="closeWindow()">닫기</button>
    </div>
</body>
</html>
