<meta charset="utf-8">
<?php
session_start();
if (isset($_SESSION["userid"])) {
    $userid = $_SESSION["userid"];
} else {
    $userid = "";
}
if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
} else {
    $username = "";
}

if (!$userid) {
    echo("
        <script>
        alert('게시판 글쓰기는 로그인 후 이용해 주세요!');
        history.go(-1)
        </script>
    ");
    exit;
}

$subject = $_POST["subject"];
$content = $_POST["content"];

$subject = htmlspecialchars($subject, ENT_QUOTES);
$content = htmlspecialchars($content, ENT_QUOTES);

// '공지사항'이라는 단어가 포함되어 있는지 검사
if (strpos($subject, '공지사항') !== false) {
    echo("
        <script>
        alert('제목에 \"공지사항\" 단어를 포함할 수 없습니다.');
        history.go(-1)
        </script>
    ");
    exit;
}

$regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장

$upload_dir = './file/';

$upfile_name     = $_FILES["upfile"]["name"];
$upfile_tmp_name = $_FILES["upfile"]["tmp_name"]; // 서버에 임시이름
$upfile_type     = $_FILES["upfile"]["type"];
$upfile_size     = $_FILES["upfile"]["size"];
$upfile_error    = $_FILES["upfile"]["error"];

if ($upfile_name && !$upfile_error) {
    $file = explode(".", $upfile_name);
    $file_name = $file[0];
    $file_ext  = $file[1];

    $new_file_name = date("Y_m_d_H_i_s");
    $new_file_name = $new_file_name;
    $copied_file_name = $new_file_name.".".$file_ext;      
    $uploaded_file = $upload_dir.$copied_file_name;

    if ($upfile_size > 1000000000) {
        echo("
            <script>
            alert('업로드 파일 크기가 지정된 용량(1GB)을 초과합니다!<br>파일 크기를 체크해주세요!');
            history.go(-1)
            </script>
        ");
        exit;
    }

    if (!move_uploaded_file($upfile_tmp_name, $uploaded_file)) {
        echo("
            <script>
            alert('파일을 지정한 디렉토리에 복사하는데 실패했습니다.');
            history.go(-1)
            </script>
        ");
        exit;
    }
} else {
    $upfile_name      = "";
    $upfile_type      = "";
    $copied_file_name = "";
}

$con = mysqli_connect("localhost", "user1", "12345", "sample");

$sql = "insert into cafeboard (id, name, subject, content, regist_day, hit,  file_name, file_type, file_copied) ";
$sql .= "values('$userid', '$username', '$subject', '$content', '$regist_day', 0, ";
$sql .= "'$upfile_name', '$upfile_type', '$copied_file_name')";
mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행

// 포인트 부여하기
$point_up = 10;

$sql = "select point from cafe where id='$userid'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
$new_point = $row["point"] + $point_up;

$sql = "update cafe set point=$new_point where id='$userid'";
mysqli_query($con, $sql);

mysqli_close($con);  // DB 연결 끊기

echo "
   <script>
    location.href = 'cafeboard_list.php';
   </script>
";
?>

