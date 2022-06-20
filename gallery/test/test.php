<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./test.css">
  <title>Document</title>
</head>
<body>
  <?php
    $conn = mysqli_connect('localhost', 'kyk', '3909', 'gallery_db');
    $sql = "SELECT * FROM users ORDER BY click_count DESC limit 3;";
    $result = mysqli_query($conn, $sql);

    $count = 0;
  ?>

  <table class="brd_table">
  <?php
  while ($row = mysqli_fetch_array($result)) {
    if ($count == 0) { ?>
      <tr class="brd">
        <td id="name0"><a href ='read.php?num=<?=$row['num']?>'><?=$row['gallery_name']?></a></td>
      </tr>
      <?php
      $thumbnail1 = $row['thumbnail'];
    } elseif ($count == 1) { ?>
      <tr class="brd">
      <td id="name1"><a href ='read.php?num=<?=$row['num']?>'><?=$row['gallery_name']?></a></td>
      </tr>
      <?php
      $thumbnail2 = $row['thumbnail'];
    } elseif ($count == 2) { ?>
    <tr class="brd">
      <td id="name2"><a href ='read.php?num=<?=$row['num']?>'><?=$row['gallery_name']?></a></td>
    </tr>
    <?php
      $thumbnail3 = $row['thumbnail'];
    }
?>
  <!-- <tr class="brd">
    <td class=<?="name"+$count?>><a href ='read.php?num=<?=$row['num']?>'><?=$row['gallery_name']?></a></td>
  </tr> -->

<?php
  $count ++;
  } 
  mysqli_close($conn);
?>
  </table>

  <?php
  echo $thumbnail1;
  echo $thumbnail2;
  echo $thumbnail3;
  ?>
  <div id="test_div">
    <ul id="test">
      <li>
        <image id="img1" class="img" src="./<?= $thumbnail1 ?>.jpg"> </image>
      </li>
      <li>
        <image id="img2"class="img" src="./<?= $thumbnail2 ?>.jpg"></image>
      </li>
      <li>
        <image id="img3" class="img" src="./<?= $thumbnail3 ?>.jpg"></image>
      </li>
    </ul>
  </div>



  
</body>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="module" src="./test.js"></script>
</html>