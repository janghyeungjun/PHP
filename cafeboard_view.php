
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
<link rel="stylesheet" type="text/css" href="./css/board2.css">
<!-- js 자주사용해서 파일로만든후 사용하기 -->
<header>
    <?php include "header.php";?>
</header>  
<section>

   	<div id="board_box">
	    <h3 class="title">
			게시판 > 내용보기
		</h3>
<?php
if (!isset($_SESSION)) {
    session_start(); // 세션이 시작되지 않은 경우에만 세션을 시작
}

if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
else $userid = "";

	$num  = $_GET["num"];
	//다시 눌렀던페이지로 돌아가기 위해서
	$page  = $_GET["page"];

	$con = mysqli_connect("localhost", "user1", "12345", "sample");
	$sql = "select * from cafeboard where num=$num";
	$result = mysqli_query($con, $sql);

	$row = mysqli_fetch_array($result);
	$id      = $row["id"];
	$name      = $row["name"];
	$regist_day = $row["regist_day"];
	$subject    = $row["subject"];
	$content    = $row["content"];
	$file_name    = $row["file_name"];
	$file_type    = $row["file_type"];
	$file_copied  = $row["file_copied"];
	$hit          = $row["hit"];

	$content = str_replace(" ", "&nbsp;", $content);
	$content = str_replace("\n", "<br>", $content);

	$new_hit = $hit + 1;
	$sql = "update cafeboard set hit=$new_hit where num=$num";   
	mysqli_query($con, $sql);
?>		
	    <ul id="view_content">
			<li>
				<span class="col1"><b>제목 :</b> <?=$subject?></span>
				<span class="col2"><?=$name?> | <?=$regist_day?></span>
			</li>
			<li>
				<?php
					if($file_name) {
						$real_name = $file_copied;
						$file_path = "./file/".$real_name;
						$file_size = filesize($file_path);

						echo "▷ 첨부파일 : $file_name ($file_size Byte) &nbsp;&nbsp;&nbsp;&nbsp;
			       		<a href='$file_path'><img src='./img/다운로드.png' width=15></img></a><br><br>";
			           	}
				?>
				<?=$content?>
			</li>		
	    </ul>
	    <ul class="buttons">
				<li><button onclick="location.href='cafeboard_list.php?page=<?=$page?>'">목록</button></li>
                
                 <?php
                 //내꺼만 수정할 수있게 보여준다.
                 if($userid == $id){
                    ?>
                <li><button onclick="location.href='cafeboard_modify_form.php?num=<?=$num?>&page=<?=$page?>'">수정</button></li>
				<li><button onclick="location.href='cafeboard_temp.php?num=<?=$num?>&page=<?=$page?>'">삭제</button></li>
                <?php } ?>
				<li><button onclick="location.href='cafeboard_form.php'">글쓰기</button></li>
		</ul>
	</div> <!-- board_box -->
</section> 
<footer>
    <?php include "footer.php";?>
</footer>

</body>
</html>

