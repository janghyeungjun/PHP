<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="utf-8">
    <style>
        h3 {
            padding-left: 5px;
            border-left: solid 5px #edbf07;
        }
        #close {
            margin: 20px 0 0 80px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h3>추천인 체크</h3>
    <p>
        <?php
        $chu = $_GET["chu"];
        $id = $_GET["id"];
        $regist_day = date("Y-m-d (H:i)");

        if ($chu) {
            $con = mysqli_connect("localhost", "user1", "12345", "sample");

            if (mysqli_connect_errno()) {
                echo "MySQL 연결에 실패했습니다: " . mysqli_connect_error();
                exit();
            }

            $sql = "SELECT * FROM Cafe WHERE id='$chu'";
            $result = mysqli_query($con, $sql);

            $num_record = mysqli_num_rows($result);

            if ($num_record) {
                echo "<li>" . $chu . " 추천인 입니다.</li>";
                echo "<li>3000포인트 적립되었습니다.</li>";
                
                $con = mysqli_connect("localhost", "user1", "12345", "sample");

                $sql_i = "insert into Cafe(id, regist_day, point) ";
                $sql_i .= "values('$id','$regist_day', 3000)";
            
                mysqli_query($con, $sql_i);  // $sql 에 저장된 명령 실행
                // 현재 포인트를 업데이트
                $sql_update = "UPDATE Cafe SET point = point + 3000 WHERE id='$chu'";
                mysqli_query($con, $sql_update);
            } else {
                echo "<li>" . $chu . " 없는 추천인 입니다.</li>";
            }

            mysqli_close($con);
        }
        ?>
    </p>
    <div id="close">
        <button onclick="javascript:self.close()">닫기</button>
    </div>
</body>
</html>

