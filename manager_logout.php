<?php
  session_start();
  unset($_SESSION["userid"]);
  unset($_SESSION["username"]);

  echo("
  <script>
     alert('로그아웃 되었습니다');
    </script>
  ");
  
  echo("
       <script>
          location.href = 'manager.php';
         </script>
       ");
?>
