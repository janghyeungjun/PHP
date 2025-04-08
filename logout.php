<?php
  session_start();
  unset($_SESSION["userid"]);
  unset($_SESSION["username"]);
  unset($_SESSION["userpoint"]);

  echo("
  <script>
     alert('로그아웃 되었습니다');
    </script>
  ");
  
  echo("
       <script>
          location.href = 'index.php';
         </script>
       ");
?>
