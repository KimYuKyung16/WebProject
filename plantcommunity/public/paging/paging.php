<?php

$list_num = 15; // 한 페이지의 데이터 개수
$page_num = 10; // 한 번에 보이는 페이지의 수

$page = isset($_GET["page"])? $_GET["page"] : 1; // 현재 페이지 : 제일 처음에 값이 없을 땐 1페이지

$conn = mysqli_connect('localhost', 'kyk', '3909', 'plant_db');
$sql = "SELECT * FROM total_content_list";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result); // 전체 데이터의 개수

$total_page = ceil($num / $list_num); // 전체 페이지 수 = (전체 데이터의 개수 / 페이지 별 데이터의 개수)의 올림
$total_block = ceil($total_page / $page_num); // 페이지 블럭의 총 개수 = (전체 페이지 수 / 한 번에 보이는 페이지의 수)의 올림
$now_block = ceil($page / $page_num); // 현재 페이지 블럭의 번호 = (현재 페이지 번호 / 한 번에 보이는 페이지의 수)의 올림

$s_pageNum = ($now_block - 1) * $page_num + 1; // 블럭 당 시작 페이지 번호 = (해당 글의 블럭번호 - 1) * 블럭당 페이지 수 + 1
$s_pageNum ? $_pageNum = (($now_block - 1) * $page_num + 1) : $_pageNum = 1; // 데이터가 없을 때는 블럭 당 시작 페이지 번호가 1

$e_pageNum = $now_block * $page_num; // 블럭 당 마지막 페이지 번호 = 현재 블럭 번호 * 블럭 당 페이지 수
if($e_pageNum > $total_page){ // 마지막 번호가 전체 페이지 수를 넘으면 전체 페이지 수로 설정
    $e_pageNum = $total_page; 
};

$start = ($page - 1) * $list_num; // 시작 번호 = (현재 페이지 번호 - 1) * 페이지 당 보여질 데이터 수 : 한 페이지 넘길 때마다 한 페이지의 데이터 개수가 넘어가기 때문

// 어떤 php에서 paging.php를 include했느냐에 따라서 동작이 달라짐.
$conn = mysqli_connect('localhost', 'kyk', '3909', 'plant_db');
if ($what_php == "plant_info_share") { // plant_info_share.php에서 paging.php를 include했을 때
    $sql = "SELECT * FROM total_content_list WHERE board='plant_info_share' ORDER BY num DESC limit $start, $list_num;"; // 시작 번호부터 한 페이지의 데이터 개수까지 출력
} elseif ($what_php == "index") { // index.php에서 paging.php를 include했을 때
    $sql = "SELECT * FROM total_content_list ORDER BY num DESC limit $start, $list_num;";
} elseif ($what_php == "user_information") { // user_information.php에서 paging.php를 include했을 때
    $sql = "SELECT * FROM total_content_list 
            WHERE email= '{$email}' 
            ORDER BY num DESC limit $start, $list_num;";
}

$result = mysqli_query($conn, $sql);

?>