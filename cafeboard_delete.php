<?php

    $num   = $_GET["num"];
    $page   = $_GET["page"];

    $con = mysqli_connect("localhost", "user1", "12345", "sample");
    $sql = "select * from cafeboard where num = $num";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);

    $copied_name = $row["file_copied"];

	if ($copied_name)
	{
		$file_path = "./file/".$copied_name;
		unlink($file_path); // 파일 삭제 하기 코드 unlink
    }

    $sql = "delete from cafeboard where num = $num";
    mysqli_query($con, $sql);
    mysqli_close($con);

    echo "
	     <script>
	         location.href = 'cafeboard_list.php?page=$page';
	     </script>
	   ";
?>

