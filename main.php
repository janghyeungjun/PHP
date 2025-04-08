<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>PHP Cafe</title>
    <link rel="stylesheet" type="text/css" href="./css/common2.css">
    <link rel="stylesheet" type="text/css" href="./css/message.css">
    <style>
        body {
            display: flex;
            flex-direction: column;

            text-align: center;
            font-family: Arial, sans-serif;
            margin: 0 auto;


        }

        .page-title {
            margin: 20px 0;
        }

        .page-title h2 {
            font-weight: bold;
        }

        .flex-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px; /* 요소 사이의 간격 설정 */
            max-width: 1000px; /* 최대 너비 설정 */
            margin: 0 auto; /* 좌우 여백을 auto로 설정하여 요소를 화면 가운데 정렬합니다. */
        }


        .flex-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: calc(25% - 20px); /* 각 항목의 너비를 25%로 설정하고, 간격을 고려하여 조정 */
        }

        .photo img {
            max-width: 100%;
            height: auto;
        }

        .text p {
            font-weight: bold;
        }
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
                text-align:center;
            }

        #menu_bar1 ul li:last-child {
                /* 두 번째 li 스타일 */
                font-style: italic;
                color: yellow;
                font-size: 20px;

            }
                </style>
</head>
<body>
        <?php
    if(!$userid) {
?>             

        <div id="menu_bar1">
            <ul>  
            <li>Moo Cafe</li><br>
            <li>차별화를 추구하여 보다 성장하는 Cafe</li>
            </ul>
        </div>


<?php
    } else {

?>
        <div id="menu_bar1">
            <ul>  
            <li>메뉴 소개</li><br>
            <li>차별화를 추구하여 보다 성장하는 Cafe</li>
            </ul>
        </div>

                
<?php
    }
?>

    
    <div class="page-title">
        <h2>대표 MENU</h2>
    </div>
    
    <div class="flex-container">
        <div class="flex-item">
            <div class="content">
                <div class="photo">
                    <img src="./img/달고나카페라떼.png" alt="달고나 카페라떼">
                </div>
            </div>
            <div class="text">
                <p>달고나 카페라떼</p>
                <p>달달한 달고나 라떼</p>
            </div>
        </div>
        <div class="flex-item">
            <div class="content">
                <div class="photo">
                    <img src="./img/돌체콜드블루.png" alt="돌체콜드브루">
                </div>
            </div>
            <div class="text">
                <p>돌체콜드브루</p>
                <p>돌체맛 콜드 브루</p>
            </div>
        </div>
        
        <div class="flex-item">
            <div class="content">
                <div class="photo">
                    <img src="./img/카푸치노.png" alt="카푸치노">
                </div>
            </div>
            <div class="text">
                <p>카푸치노</p>
                <p>크림 부드러워요</p>
            </div>
        </div>
        <div class="flex-item">
            <div class="content">
                <div class="photo">
                    <img src="./img/얼그레이카페라떼.png" alt="얼그레이 카페라떼">
                </div>
            </div>
            <div class="text">
                <p>얼그레이 카페라떼</p>
                <p>얼그레이 맛 카페라떼</p>
            </div>
        </div>
        <br>
        <div class="flex-item">
            <div class="content">
                <div class="photo">
                    <img src="./img/라떼슈페너.png" alt="라떼슈페너">
                </div>
            </div>
            <div class="text">
                <p>라떼슈페너</p>
                <p>라떼랑 비슷한 슈페너</p>
            </div>
        </div>
        <div class="flex-item">
            <div class="content">
                <div class="photo">
                    <img src="./img/크라상.png" alt="크라상">
                </div>
            </div>
            <div class="text">
                <p>크라상</p>
                <p>바삭하며 배부른 크라상</p>
            </div>
        </div>
        <div class="flex-item">
            <div class="content">
                <div class="photo">
                    <img src="./img/죠리퐁마카롱.png" alt="마카롱">
                </div>
            </div>
            <div class="text">
                <p>죠리퐁 마카롱</p>
                <p>달달하며 맛있는 뚱카롱</p>
            </div>
        </div>
        <div class="flex-item">
            <div class="content">
                <div class="photo">
                    <img src="./img/믹스너트쿠키.png" alt="믹스너트 쿠키">
                </div>
            </div>
            <div class="text">
                <p>믹스너트 쿠키</p>
                <p>믹스가 들어가있는 쿠키</p>
            </div>
        </div>
    </div>


</body>
</html>

