<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>PHP Cafe</title>
<link href="https://fonts.googleapis.com/css2?family=Hi+Melody&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="./css/common2.css">
<link rel="stylesheet" type="text/css" href="./css/login.css">
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

.point_btns {
    margin-top: 10px; /* 버튼 간격 조정 */
}

.point_btns button {
    margin-right: 5px; /* 버튼 간격 조정 */
}
</style>

<script>
// 충전 금액을 text에 추가하는 함수
function addAmount(amount) {
    // 현재 text 상자의 값 가져오기
    let currentAmount = parseInt(document.getElementById("point").value) || 0;
    // 현재 금액에 추가된 금액 더하기
    let newAmount = currentAmount + amount;
    // text 상자에 새로운 금액 설정
    document.getElementById("point").value = newAmount;
}

// 버튼 클릭 이벤트에 대한 함수 정의
document.addEventListener("DOMContentLoaded", function() {
    // +1000 버튼 클릭 시
    document.getElementById("plus1000").addEventListener("click", function() {
        addAmount(1000);
    });

    // +5000 버튼 클릭 시
    document.getElementById("plus5000").addEventListener("click", function() {
        addAmount(5000);
    });

    // +10000 버튼 클릭 시
    document.getElementById("plus10000").addEventListener("click", function() {
        addAmount(10000);
    });

    // +50000 버튼 클릭 시
    document.getElementById("plus50000").addEventListener("click", function() {
        addAmount(50000);
    });
});

function reset()
   {
      document.point.point.value = "";  
      document.point.point.focus();

      return;
   }

   function point_plus() {

let pointInput = document.getElementById("point");
let point = pointInput.value.trim(); // 입력된 포인트 값을 가져옴

if (!/^\d+$/.test(point)) { // 입력된 값이 숫자가 아닌 경우
    alert("숫자를 입력하세요."); // 오류 메시지 표시
    pointInput.value = ""; // 입력된 값을 지우고
    pointInput.focus(); // 포커스를 다시 입력 상자로 이동시킴
    return; // 함수 종료
}


else{
    let point = document.getElementById("point").value;

window.open("point_plus_won.php?point=" + point,
    "IDcheck",
    "left=700,top=300,width=500,height=500,scrollbars=no,resizable=yes");
}

   }


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
                    <span>포인트 충전하기(+5%)</span>
                </div>
                <div id="login_form">
                    <form action=""  name="point">
                    충전금액<br>
                    대구은행 1111-12-12222
                    <input type="text" name="point" id="point" placeholder="입금 후 금액을 입력하세요" >
                    </form>
 
                    <div class="point_btns">
                        <button id="plus1000">+1000</button>
                        <button id="plus5000">+5000</button>
                        <button id="plus10000">+10000</button>
                        <button id="plus50000">+50000</button>
                        <button id="reset"  onclick="reset()">초기화</button>
                    </div>
                    <div id="login_btn">
                        <a href="#"><button onclick="point_plus()">충전하기</button></a>
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
