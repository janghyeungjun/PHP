<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $num = $_GET["num"];
    $page = $_GET["page"];    
    ?>

    <script>
        let answer = confirm("정말 삭제 하시겠습니까?");

        if(answer == true){
            location.href="cafeboard_delete.php?num=<?=$num?>&page=<?=$page?>";
        }
        else{
            history.back();
        }
    </script>
    
</body>
</html>