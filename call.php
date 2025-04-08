<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="UTF-8">
<title>PHP CAFE</title>
<link href="https://fonts.googleapis.com/css2?family=Hi+Melody&display=swap" rel="stylesheet">
<style>
    body {
        font-family: 'Hi Melody', sans-serif;
        background-color: #f9f9f9;
        margin: 0;
        padding: 0;
    }

    header {
        background-color: #2b92dc;
        color: white;
        padding: 10px;
        text-align: center;
    }

    header h1 {
        margin: 0;
    }

    #main_content {
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .coffee-items {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .coffee-item {
        width: calc(50% - 10px);
        margin-bottom: 20px;
        padding: 10px;
        background-color: #f1f1f1;
        border-radius: 5px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        box-sizing: border-box;
    }

    .coffee-item img {
        width: 100%;
        height: auto;
        object-fit: cover;
        margin-bottom: 10px;
        border-radius: 5px;
    }

    .coffee-item input[type="number"] {
        width: 50px;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 14px;
    }

    input[type="submit"], input[type="button"] {
        padding: 10px 20px;
        background-color: #2b92dc;
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    input[type="submit"]:hover, input[type="button"]:hover {
        background-color: #2578ad;
    }
</style>
</head>
<body> 
    <header>
        <h1><a href="index.php">PHP Cafe</a></h1>
    </header>
    <section>
        <div id="main_content">
            <form action="pay.php" method="post" onsubmit="return validateForm()">
                <h2>주문하기</h2>
                <div class="coffee-items">
                    <?php 
                        // DB 접속
                        $con = mysqli_connect("localhost", "user1", "12345", "sample");

                        // DB 사용
                        $sql = "select * from coffee";
                        $result = mysqli_query($con, $sql); // 검색 결과
                        $total_record = mysqli_num_rows($result); // 개수

                        // 내 정보를 한 행씩 배열로 다 들고 오는 메소드
                        for($i = 0; $i < $total_record; $i++){
                            $row = mysqli_fetch_array($result);
                            echo "<div class='coffee-item'>";
                            echo "<img src='./img/".$row['food'].".png' alt='".$row['food']."'>";
                            echo "<input type='checkbox' name='coffee[]' value=".$i." />".$row['food']." (".$row['price']."원)";
                            echo "  <input type='number' name='x[]' min='0' value='0' />잔(개수)<br>";
                            echo "</div>";
                        }
                        mysqli_close($con);
                    ?>
                </div>
                <div class="bottom_line"></div>
                <input type="submit" value="주문하기">
                <input type="button" value="돌아가기" onclick="location.href='index.php'">  
            </form>
        </div> <!-- main_content -->
    </section> 
</body>
</html>
