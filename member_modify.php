<?php
    $id = $_GET["id"];

    $pass = $_POST["pass"];
    $name = $_POST["name"];
    $email1  = $_POST["email1"];
    $email2  = $_POST["email2"];

    $email = $email1."@".$email2;
          
    $con = mysqli_connect("localhost", "user1", "12345", "sample");
    $sql = "update Cafe set pass='$pass', name='$name' , email='$email'";
    $sql .= " where id='$id'";
    mysqli_query($con, $sql);

    mysqli_close($con);     

    echo "
    <script>
        alert('정보가 수정되었습니다');
    </script>
";

    echo "
	      <script>
	          location.href = 'index.php';
	      </script>
	  ";
?>

   
