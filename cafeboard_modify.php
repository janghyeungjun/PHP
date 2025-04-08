<?php
$regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장

$upload_dir = './file/';

$upfile_name	 = $_FILES["upfile"]["name"];
$upfile_tmp_name = $_FILES["upfile"]["tmp_name"]; // 서버에 임시이름
$upfile_type     = $_FILES["upfile"]["type"];
$upfile_size     = $_FILES["upfile"]["size"];
$upfile_error    = $_FILES["upfile"]["error"];

if ($upfile_name && !$upfile_error)
{
    $file = explode(".", $upfile_name);
    $file_name = $file[0];
    $file_ext  = $file[1];

    $new_file_name = date("Y_m_d_H_i_s");
    $new_file_name = $new_file_name;
    $copied_file_name = $new_file_name.".".$file_ext;      
    $uploaded_file = $upload_dir.$copied_file_name;

    if( $upfile_size  > 1000000000 ) {
            echo("
            <script>
            alert('업로드 파일 크기가 지정된 용량(1T)을 초과합니다!<br>파일 크기를 체크해주세요! ');
            history.go(-1)
            </script>
            ");
            exit;
    }

    if (!move_uploaded_file($upfile_tmp_name, $uploaded_file) )
    {
            echo("
                <script>
                alert('파일을 지정한 디렉토리에 복사하는데 실패했습니다.');
                history.go(-1)
                </script>
            ");
            exit;
    }
}
else 
{
    $upfile_name      = "";
    $upfile_type      = "";
    $copied_file_name = "";
}

    $num = $_GET["num"];
    $page = $_GET["page"];

    $subject = $_POST["subject"];
    $content = $_POST["content"];
   
    
    $con = mysqli_connect("localhost", "user1", "12345", "sample");

    if(!$upfile_name){//넘어온 file 이름이 없으면 업데이트 하지않고 있으면 업데이트해준다.
        $sql = "update cafeboard set subject='$subject', content='$content'";
    }
    else{
        $sql = "update cafeboard set subject='$subject', content='$content' ,file_name='$upfile_name',file_type='$upfile_type',file_copied='$copied_file_name'";
    }
    
    $sql .= " where num=$num";
    mysqli_query($con, $sql);

    mysqli_close($con);     

    echo "
	      <script>
              alert('수정이 완료 되었습니다.');
	          location.href = 'cafeboard_list.php?page=$page';
	      </script>
	  ";
?>

   
