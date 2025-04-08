<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<header>
    <?php include "mheader.php";?>
</header>
<title>PHP Cafe</title>
<!-- jquery 코드 사용해서 들고오기 비밀번호 확인해야하기 때문에 사용해야한다 -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Hi+Melody&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="./css/common2.css">
<link rel="stylesheet" type="text/css" href="./css/login.css">
<!-- js 자주사용해서 파일로만든후 사용하기 -->
<script type="text/javascript" src="./js/login.js"></script>

<style>
.pw_show {
    display: flex;
    align-items: center; /* 세로 중앙 정렬 */
    margin-top: 11px;
    font-size: 12px;
}

.pw_show input[type="checkbox"] {
    margin-right: 20px; /* 체크박스와 라벨 사이의 간격 조정 */
}
</style>

<script>
$(document).ready(function () {
  // 비밀번호 표시 체크박스에 대한 이벤트 핸들러
  $('.pw_show input[type="checkbox"]').on("change", function () {
    // 체크박스의 상태에 따라 비밀번호 입력란의 타입 변경
    if (this.checked) {
      $("#pass").attr("type", "text"); // 비밀번호 입력란 타입을 text로 변경
    } else {
      $("#pass").attr("type", "password"); // 비밀번호 입력란 타입을 password로 변경
    }
  });
});
</script>

</head>
<body> 
	<section>

        <div id="main_content">
      		<div id="login_box">
	    		<div id="login_title">
		    		<span>관리자 Login</span>
	    		</div>
	    		<div id="login_form">
          		<form  name="login_form" method="post" action="managerlogin.php">		       	
                  	<ul>
                    <li><input type="text" name="id" placeholder="아이디" ></li>
                    <li><input type="password" id="pass" name="pass" placeholder="비밀번호" ></li> <!-- pass -->
						<label class="pw_show"><input type="checkbox" />비밀번호 표시</label>
                  	</ul>	    	
           		</form>
				   <div id="login_btn">
                      	<a href="#"><button onclick="check_input()">로그인</button></a>
                  	</div>	
        		</div> <!-- login_form -->
    		</div> <!-- login_box -->
        </div> <!-- main_content -->
	</section> 
	<footer>
    	<?php include "footer.php";?>
    </footer>
</body>
</html>

