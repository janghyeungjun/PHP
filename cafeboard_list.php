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
<script type="text/javascript" src="./js/login.js"></script>

<style>
/* 여기에 추가적인 스타일을 작성하세요 */
</style>

<script>
// 여기에 추가적인 자바스크립트 코드를 작성하세요
</script>

</head>
<body> 
	<header>
    	<?php include "header.php";?>
    </header>
<section>

   	<div id="board_box">
	    <h3>
	    	공지/리뷰
		</h3>

        <!-- 검색 폼 추가 -->
		
		<!-- 셀렉트로 검색할 이름 구해서 get으로 받은후 DB에다가 검색 -->
        <form method="get" action="cafeboard_list.php">
		<select name="select">
		<option value="subject">제목</option> 
		<option value="name" selected>이름</option>
		<option value="file_name">파일</option>
		</select>

            <input type="text" name="search" placeholder="검색">
            <button type="submit">검색</button>
        </form>
	    <ul id="board_list">
				<li>
					<span class="col1">번호</span>
					<span class="col2">제목</span>
					<span class="col3">글쓴이</span>
					<span class="col4">첨부</span>
					<span class="col5">등록일</span>
					<span class="col6">조회</span>
				</li>
<?php
    if (isset($_GET["page"]))
        $page = $_GET["page"];
    else
        $page = 1;

    if (isset($_GET["search"]))
        $search = $_GET["search"];
    else
        $search = "";

	if (isset($_GET["select"]))
        $sname = $_GET["select"];
    else
        $sname = "";

    $con = mysqli_connect("localhost", "user1", "12345", "sample");
    
    if ($search) {
        $sql = "select * from cafeboard where $sname like '%$search%' order by num desc";
    } else {
        $sql = "select * from cafeboard ORDER BY 
		CASE 
			WHEN subject = '공지사항' THEN 0 
			ELSE 1 
		END, 
		num DESC";
    }
    
    $result = mysqli_query($con, $sql);
    $total_record = mysqli_num_rows($result); // 전체 글 수

    $scale = 5;

    // 전체 페이지 수($total_page) 계산 
    if ($total_record % $scale == 0)     
        $total_page = floor($total_record/$scale);      
    else
        $total_page = floor($total_record/$scale) + 1; 
 
    // 표시할 페이지($page)에 따라 $start 계산  
    $start = ($page - 1) * $scale;      

    $number = $total_record - $start;

   for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)
   {
      mysqli_data_seek($result, $i);
      // 가져올 레코드로 위치(포인터) 이동
      $row = mysqli_fetch_array($result);
      // 하나의 레코드 가져오기
      $num         = $row["num"];
      $id          = $row["id"];
      $name        = $row["name"];
      $subject     = $row["subject"];
      $regist_day  = $row["regist_day"];
      $hit         = $row["hit"];
      if ($row["file_name"])
      	$file_image = "<img src='./img/file.png' width=20 height=15>";
      else
      	$file_image = " ";
?>
				<li>
					<span class="col1"><?=$number?></span>
					<span class="col2"><a href="cafeboard_view.php?num=<?=$num?>&page=<?=$page?>"><?=$subject?></a></span>
					<span class="col3"><?=$name?></span>
					<span class="col4"><?=$file_image?></span>
					<span class="col5"><?=$regist_day?></span>
					<span class="col6"><?=$hit?></span>
				</li>	
<?php
   	   $number--;
   }
   mysqli_close($con);

?>
	    	</ul>
			<ul id="page_num"> 	
<?php
	if ($total_page>=2 && $page >= 2)	
	{
		$new_page = $page-1;
		echo "<li><a href='cafeboard_list.php?page=$new_page&search=$search'>◀ 이전</a> </li>";
	}		
	else 
		echo "<li>&nbsp;</li>";

   	// 게시판 목록 하단에 페이지 링크 번호 출력
   	for ($i=1; $i<=$total_page; $i++)
   	{
		if ($page == $i)     // 현재 페이지 번호 링크 안함
		{
			echo "<li><b> $i </b></li>";
		}
		else
		{
			echo "<li><a href='cafeboard_list.php?page=$i&search=$search'> $i </a><li>";
		}
   	}
   	if ($total_page>=2 && $page != $total_page)		
   	{
		$new_page = $page+1;	
		echo "<li> <a href='cafeboard_list.php?page=$new_page&search=$search'>다음 ▶</a> </li>";
	}
	else 
		echo "<li>&nbsp;</li>";
?>
			</ul> <!-- page -->	    	
			<ul class="buttons">
				<li><button onclick="location.href='cafeboard_list.php'">목록</button></li>
				<li>
<?php 
    if($userid) {
?>
					<button onclick="location.href='cafeboard_form.php'">글쓰기</button>
<?php
	} else {
?>
					<a href="javascript:alert('로그인 후 이용해 주세요!')"><button>글쓰기</button></a>
<?php
	}
?>
				</li>
			</ul>
	</div> <!-- board_box -->
	</section> 
	<footer>
    	<?php include "footer.php";?>
    </footer>
</body>
</html>
