<?php
    $id     = $_POST["id"];
    $pass   = $_POST["pass"];
    $name   = $_POST["name"];
    $email1 = $_POST["email1"];
    $email2 = $_POST["email2"];

    $email = $email1 . "@" . $email2;
    $regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장

    if ($id) {
        $con = mysqli_connect("localhost", "user1", "12345", "sample");

        if (mysqli_connect_errno()) {
            echo "MySQL 연결에 실패했습니다: " . mysqli_connect_error();
            exit();
        }

        // 아이디가 이미 존재하는지 확인
        $sql_check = "SELECT * FROM Cafe WHERE id='$id'";
        $result = mysqli_query($con, $sql_check);
        $num_rows = mysqli_num_rows($result);

        if ($num_rows > 0) {
            // 이미 아이디가 존재하는 경우, 회원 정보를 업데이트
            $sql_update = "UPDATE Cafe SET pass='$pass', email='$email', name='$name' WHERE id='$id'";
            mysqli_query($con, $sql_update);
        } else {
            // 아이디가 존재하지 않는 경우, 새로운 회원 정보를 삽입
            $sql_insert = "INSERT INTO Cafe(id, pass, name, email, regist_day, point) ";
            $sql_insert .= "VALUES ('$id', '$pass', '$name', '$email', '$regist_day', 0)";
            mysqli_query($con, $sql_insert);
        }

        mysqli_close($con);
        
        // 회원가입 성공 메시지 출력 및 리다이렉트
        echo "<script> alert('회원가입 되었습니다. 다시 로그인하세요.'); </script>";
        echo "<script> location.href = 'index.php'; </script>";
    } else {
        echo "회원 정보가 올바르게 전달되지 않았습니다.";
    }
?>
