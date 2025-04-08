<?php


    if (isset($_POST["item"]))
        $num_item = count($_POST["item"]); 
    else
        echo("
                    <script>
                    alert('삭제할 게시글을 선택해주세요!');
                    history.go(-1)
                    </script>
        ");

    $con = mysqli_connect("localhost", "user1", "12345", "sample");

    for($i=0; $i<count($_POST["item"]); $i++){
        $num = $_POST["item"][$i];

        $sql = "select * from cafeboard where num = $num";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);

        $copied_name = $row["file_copied"];

        if ($copied_name)
        {
            $file_path = "./file/".$copied_name;
            unlink($file_path);
        }

        $sql = "delete from cafeboard where num = $num";
        mysqli_query($con, $sql);
    }       

    mysqli_close($con);

    echo "
	     <script>
            alert('삭제되었습니다');
	         location.href = 'Mindex.php';
	     </script>
	   ";
?>

