<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>PHP Cafe</title>
<!-- jQuery 코드 사용 -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Hi+Melody&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="./css/common2.css">
<link rel="stylesheet" type="text/css" href="./css/login.css">
<!-- JS 파일 포함 -->
<script type="text/javascript" src="./js/login.js"></script>

<style>
.pw_show {
    display: flex;
    align-items: center; /* 세로 중앙 정렬 */
    margin-top: 11px;
    font-size: 14px; /* 글씨 크기 조정 */
}

.pw_show input[type="checkbox"] {
    width: 20px; /* 체크박스 너비 */
    height: 20px; /* 체크박스 높이 */
    margin-right: 10px; /* 체크박스와 라벨 사이의 간격 조정 */
}

.pw_show label {
    font-family: 'Hi Melody', cursive; /* 폰트 스타일 */
    font-weight: bold; /* 폰트 두께 */
    color: #333; /* 글씨 색상 */
    cursor: pointer; /* 커서 스타일 */
}

.pw_show label:hover {
    color: #555; /* 호버 시 글씨 색상 */
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
	<header>
    	<?php include "header.php";?>
    </header>
	<section>

        <div id="main_content">
      		<div id="login_box">
	    		<div id="login_title">
		    		<span>개인정보 재확인</span>
	    		</div>
	    		<div id="login_form">
          		<form  name="login_form" method="post" action="point_login.php">		       	
                  	<ul>
                    <li><input type="text" name="id" placeholder="아이디" ></li>
                    <li><input type="password" id="pass" name="pass" placeholder="비밀번호" ></li> <!-- pass -->
						<li class="pw_show"><input type="checkbox" id="pw_show_checkbox" /><label for="pw_show_checkbox">비밀번호 표시</label></li>
                  	</ul>	    	
           		</form>
				   <div id="login_btn">
                      	<a href="#"><button onclick="check_input()">아이디 비밀번호 확인</button></a>
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
