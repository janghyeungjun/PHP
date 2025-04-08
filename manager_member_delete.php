<?php

    $num   = $_GET["num"];

    $con = mysqli_connect("localhost", "user1", "12345", "sample");
    $sql = "delete from cafe where num = $num";
    mysqli_query($con, $sql);

    mysqli_close($con);

    echo "
	     <script>
	         location.href = 'Mindex.php';
	     </script>
	   ";
?>
