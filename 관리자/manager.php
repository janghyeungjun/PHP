<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
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
<?php
if (!isset($_SESSION)) {
    session_start(); // 세션이 시작되지 않은 경우에만 세션을 시작
}

if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
else $userid = "";
if (isset($_SESSION["username"])) $username = $_SESSION["username"];
else $username = "";
?>		
<div id="top">
    <h3>
        <a href=".php">관리자</a>
    </h3>
    <ul id="top_menu">  
<?php
if(!$userid) {
?>             
        
<?php
} else {
        $logged = $username."(".$userid.")님</a>";
?>
        <li><?=$logged?> </li>
        <li> | </li>
        <li><a href="manager_logout.php">로그아웃</a> </li>
        <li> | </li>
        <li><a href=".php">관리자모드</a></li>
        <li><a href="https://www.instagram.com/cafebombom_official"><img src="./img/instagram.png" width="20"></a></li>&nbsp;
        <li><a href="https://www.youtube.com/watch?v=k3-BDy55tq4"><img src="./img/youtube.png" width="20"></a></li>&nbsp;
        <li><a href="https://blog.naver.com/cafe-bombom"><img src="./img/blog.png" width="20" height="20"></a></li>&nbsp;
<?php
}
?>
    </ul>
</div>

<?php
if(!$userid) {
?>             
    <div id="menu_bar">
        <ul>  
            <li>
            <li>
            <li>login시 메뉴바를 이용하실수 있습니다.</li>
            <li>
        </ul>
    </div>   
<?php
} else {
?>
    <div id="menu_bar">
        <ul>  
            <li><a href="cafeboard_list.php">공지/리뷰</a></li>
            <li><a href="coffee.php?what=c">커피</a></li>                                
            <li><a href="coffee.php?what=r">라떼</a></li>
            <li><a href="coffee.php?what=a">에이드</a></li>
            <li><a href="coffee.php?what=s">사이드</a></li>
        </ul>
    </div>
<?php
}
?>

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

