<style>
#menu_bar1 {
  background-color: #000000;
  height: 300px;
  font-family: "Hi Melody", sans-serif;
  font-weight: 400;
  font-style: normal;
  text-align: center;
}
#menu_bar1 ul {
  width: 800px;
  margin: 0 auto;
  padding: 80px 0 0 0px;
}
#menu_bar1 li {
  display: inline;
  color: white;
}
#menu_bar1 ul li:first-child {
    /* 첫 번째 li 스타일 */
    font-weight: bold;
    color: white;
    font-size: 50px;
    display: inline;
    text-align: center;
}

#menu_bar1 ul li:last-child {
    /* 두 번째 li 스타일 */
    font-style: italic;
    color: yellow;
    font-size: 20px;
}
#top #top_menu {
  float: right;
  margin: 30px 60px 0; /* 오른쪽으로 더 옮김 */
}
</style>

<?php
if (!isset($_SESSION)) {
    session_start(); // 세션이 시작되지 않은 경우에만 세션을 시작
}

if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
else $userid = "";
if (isset($_SESSION["username"])) $username = $_SESSION["username"];
else $username = "";
if (isset($_SESSION["userpoint"])) $userpoint = $_SESSION["userpoint"];
else $userpoint = "";
?>		
<div id="top">
    <h3>
        <a href="Mindex.php">관리자</a>
    </h3>
    <ul id="top_menu">  
<?php
if(!$userid) {
?>             


<?php
} else {
        $logged = $username."(".$userid.")관리자님</a>&nbsp;&nbsp;&nbsp;";
?>
        <li><?=$logged?> </li>
        <li> | </li>
        <li><a href="manager_logout.php">로그아웃</a> </li>
        <li> | </li>
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
            <li><a href="manager_cafeboard_form.php">공지하기</a></li>
        </ul>
    </div>
<?php
}
?>
