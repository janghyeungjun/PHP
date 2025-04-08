<!DOCTYPE html>
<head>
<meta charset="utf-8">
<style>
h3 {
   padding-left: 5px;
   border-left: solid 5px #edbf07;
}
#close {
   margin:20px 0 0 80px;
   cursor:pointer;
}
</style>
</head>
<body>
<h3>탈퇴하기</h3>
<p>
<?php
   session_start();
   $id = $_SESSION["userid"];

   if(!$id) 
   {
      echo("<li>로그인 하세요.</li>");
   }
   else
   {
      $con = mysqli_connect("localhost", "user1", "12345", "sample");

      // 아이디에 해당하는 회원 정보 삭제
      $sql_delete = "DELETE FROM Cafe WHERE id='$id'";
      $result_delete = mysqli_query($con, $sql_delete);

      if ($result_delete)
      {
         echo "<li>".$id." 아이디가 성공적으로 탈퇴되었습니다.</li>";
        

      }
      else
      {
         echo "<li>".$id." 아이디 탈퇴에 실패했습니다.</li>";
      }
    
      mysqli_close($con);
   }

?>
</p>
<div id="close">
   <button onclick="javascript:self.close()">닫기</button>  
   <!-- 자신을 닫는다 자바스크립트 코드 -->
</div>
</body>
</html>
