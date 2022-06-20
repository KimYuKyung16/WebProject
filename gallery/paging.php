<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <table>
            <thead>
                <tr>
                    <th>갤러리 이름</th>
                </tr>
            </thead>
            <tbody>
            
                <?php
                $conn = mysqli_connect('localhost', 'kyk', '3909', 'gallery_db');
                $sql = "SELECT * FROM users";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_array($result)){
                ?>
                <tr>
                    <td><a href ='read.php?num=<?=$row['num']?>'><?=$row['gallery_name']?></a></td>
                </tr>
                <?php
                    }
                    mysqli_close($conn);
                ?>

            </tbody>   
        </table>
    </div>

    <div>
        <input class="left" type="button" value="<">
        <input class="one" type="button" value="1">
        <input class="two" type="button" value="2">
        <input class="three" type="button" value="3">
        <input class="right" type="button" value=">">
    </div>
    <script type="module" src="./js/paging.js"></script>
</body>
</html>



