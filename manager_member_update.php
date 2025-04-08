<?php

    $num   = $_GET["num"];
    $point = $_POST["point"];

    $con = mysqli_connect("localhost", "user1", "12345", "sample");
    $sql = "update cafe set point=$point where num=$num";
    mysqli_query($con, $sql);

    mysqli_close($con);

    echo "
	     <script>
	         location.href = 'Mindex.php';
	     </script>
	   ";
?>

