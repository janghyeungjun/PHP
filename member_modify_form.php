<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>PHP Cafe</title>
<link rel="stylesheet" type="text/css" href="./css/common2.css">
<link rel="stylesheet" type="text/css" href="./css/member.css">
<script type="text/javascript" src="./js/member_modify.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Hi+Melody&display=swap" rel="stylesheet">
<script>
	   function check_Del() {
     window.open("member_check_del.php?",
         "IDcheck",
          "left=700,top=300,width=350,height=200,scrollbars=no,resizable=yes");
		  setTimeout(function() {
            window.location.href = 'logout.php';
        }, 1000); 
		// 함수가 실행되면 1초뒤에 다음페이지로 이동할 수 있게 해주는 코드
   }
</script>
</head>
<body> 
	<header>
    	<?php include "header.php";?>
    </header>
	
<?php    
   	$con = mysqli_connect("localhost", "user1", "12345", "sample");
    $sql    = "select * from Cafe where id='$userid'";
    $result = mysqli_query($con, $sql);
    $row    = mysqli_fetch_array($result);

    $pass = $row["pass"];
    $name = $row["name"];

    $email = explode("@", $row["email"]);
    $email1 = $email[0];
    $email2 = $email[1];

    mysqli_close($con);
?>
	<section>

        <div id="main_content">
      		<div id="join_box">
          	<form  name="member_form" method="post" action="member_modify.php?id=<?=$userid?>">
			    <h2>회원 정보수정</h2>
    		    	<div class="form id">
				        <div class="col1">아이디</div>
				        <div class="col2" id="id">
							<?=$userid?>
				        </div>                 
			       	</div>
			       	<div class="clear"></div>

			       	<div class="form">
				        <div class="col1">비밀번호</div>
				        <div class="col2">
							<input type="text" id="pw" name="pass" value="<?=$pass?>"> <!-- id 추가 -->
				        </div>                 
			       	</div>
			       	<div class="clear"></div>
			       	<div class="form">
				        <div class="col1">비밀번호 확인</div>
				        <div class="col2">
							<input type="text" name="pass_confirm" value="<?=$pass?>">
				        </div>                 
			       	</div>
			       	<div class="clear"></div>
			       	<div class="form">
				        <div class="col1">이름</div>
				        <div class="col2">
							<input type="text" name="name" value="<?=$name?>">
				        </div>                 
			       	</div>
			       	<div class="clear"></div>
			       	<div class="form email">
				        <div class="col1">이메일</div>
				        <div class="col2">
							<input type="text" name="email1" value="<?=$email1?>">@<input 
							       type="text" name="email2" value="<?=$email2?>">
				        </div>                 
			       	</div>
			       	<div class="clear"></div>
			       	<div class="bottom_line"> </div>
			       	<div class="buttons">
	                	<input type="button" value="저장하기" style="cursor:pointer"  onclick="check_input()">&nbsp;
                  		<input type="button" value="지우기" id="reset_button" style="cursor:pointer" 
                  			onclick="reset_form()">&nbsp;
						<input type="button" value="탈퇴하기" style="cursor:pointer"  onclick="check_Del()">&nbsp;
						
	           		</div>
           	</form>
        	</div> <!-- join_box -->
        </div> <!-- main_content -->
	</section> 
	<footer>
    	<?php include "footer.php";?>
    </footer>
</body>
</html>