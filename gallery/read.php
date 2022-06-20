<!DOCTYPE html>
<html lang="ko">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/scroll5.css">
	<link rel="stylesheet" href="css/read5.css">
	<link href="https://fonts.googleapis.com/css2?family=Handlee&family=Nanum+Gothic+Coding&display=swap" rel="stylesheet">  
	<title>Document</title>
</head>

<body>

	<main>
		<div>
			<ul class="slidelist">

				<?php # 조회수 부분 코드
				session_start();
				header('Content-Type: charset=utf-8');
				$gallery_num = $_GET['num'];

				$conn = mysqli_connect('localhost', 'kyk', '3909', 'gallery_db');


				$sql = "SELECT * FROM users WHERE num = '{$gallery_num}'";
				$result = mysqli_query($conn, $sql);
				$row = mysqli_fetch_array($result);

				$click_count = $row['click_count'];
				$click_count++;


				$sql = "UPDATE users
							SET click_count = '{$click_count}'
							WHERE num = '{$gallery_num}' ";
				$result = mysqli_query($conn, $sql);
				?>


				<?php
				header('Content-Type: charset=utf-8');


				$gallery_num = $_GET['num'];
				$conn = mysqli_connect('localhost', 'kyk', '3909', 'gallery_db');
				$sql = "SELECT * FROM users WHERE num = '$gallery_num' ";
				$result = mysqli_query($conn, $sql);

				while ($row = mysqli_fetch_array($result)) {
					$user =  $row['u_id'];
					$gallery_name = $row['gallery_name']; // 갤러리 이름
					$gallery_desc = $row['gallery_description']; // 갤러리 설명
				}


				$sql = " SELECT * FROM pictures WHERE 
					u_id = '{$user}' 
					ORDER BY picture_num ASC ";
				$result = mysqli_query($conn, $sql);
				$pic_src1 = $pic_src2 = $pic_src3 = $pic_src4 = $pic_src5 = $pic_src6
					= $pic_src7 = $pic_src8 = $pic_src9 = $pic_src10 = $pic_src11 = $pic_src12 = "add.JPG";


				while ($row = mysqli_fetch_array($result)) {
					if ($row['picture_num'] == 1) {
						$pic_src1 = $row['picture'];
					} elseif ($row['picture_num'] == 2) {
						$pic_src2 = $row['picture'];
					} elseif ($row['picture_num'] == 3) {
						$pic_src3 = $row['picture'];
					} elseif ($row['picture_num'] == 4) {
						$pic_src4 = $row['picture'];
					} elseif ($row['picture_num'] == 5) {
						$pic_src5 = $row['picture'];
					} elseif ($row['picture_num'] == 6) {
						$pic_src6 = $row['picture'];
					} elseif ($row['picture_num'] == 7) {
						$pic_src7 = $row['picture'];
					} elseif ($row['picture_num'] == 8) {
						$pic_src8 = $row['picture'];
					} elseif ($row['picture_num'] == 9) {
						$pic_src9 = $row['picture'];
					} elseif ($row['picture_num'] == 10) {
						$pic_src10 = $row['picture'];
					} elseif ($row['picture_num'] == 11) {
						$pic_src11 = $row['picture'];
					} elseif ($row['picture_num'] == 12) {
						$pic_src12 = $row['picture'];
					}
				}
				?>
				<li>
					<div id="gallery_start">
						<p class="logo">Gallery</p>
						<div id="image-div">		
							<p id="start_btn">갤러리시작</p>
							<video src="./image/gallery_video.mp4" muted autoplay loop></video>
						</div>
						<div id="main-div">
							<div id="fold-div">
								<input id="open_btn" type="button" value="설명">
							</div>
							<div id="gallery_info-div">
								<div id="gallery_info">
									<h1><?= $gallery_name ?></h1>
									<textarea readonly><?= $gallery_desc ?></textarea>
									<p>※ 전시 설명 ※</p> 
									<p>자세한 작품 설명을 보고 싶다면 작품을 클릭해주세요.</p>
								</div>
								<div id="gallery_review">
									<h1>한줄 후기 작성</h1>
									<table id="gallery_review_table">
										<thead>
											<tr>
												<td id="review_name">이름</td>
												<td id="review_content">내용</td>
												<td id="review_btn"></td>
											</tr>
											<tr>
												<form action="review_add.php" method="POST" id="review-form">
													<td><input class="review_element" type="text" name="review_nickname"></td>
													<td><input class="review_element" type="text" name="review"></td>
													<input class="gallery" type="hidden" name="gallery" value="<?= $user ?>">
													<input class="num" type="hidden" name="num" value="<?= $gallery_num ?>">
													<td><input class="review_element" id="save_btn" type="submit" value="저장"></td>
												</form>
											</tr>
										</thead>
										<tbody>
											<?php $what_php = "read" ?>
											<?php include "./paging/paging.php" ?>

											<?php
											while ($row = mysqli_fetch_array($result)) {
											?>
												<tr>
													<td><?= $row['nickname'] ?></td>
													<td colspan="2"><?= $row['review'] ?><div id="revise_delete-btn" style="display: none;"><p>수정</p><p>삭제</p></div></td>
												</tr>
											<?php
												$cnt++;
											}
											mysqli_close($conn);
											?>
										</tbody>
									</table>

									<div id="page" class="pager">
										<?php
										/* paging : 이전 페이지 */
										if ($page <= 1) {
										?>
											<a href="read.php?num=<?= $gallery_num ?>&page=1"><input type="button" value="<"></a>
										<?php } else { ?>
											<a href="read.php?num=<?= $gallery_num ?>&page=<?php echo ($page - 1); ?>"><input type="button" value="<"></a>
										<?php }; ?>

										<?php
										/* pager : 페이지 번호 출력 */
										for ($print_page = $s_pageNum; $print_page <= $e_pageNum; $print_page++) {
										?>
											<a href="read.php?num=<?= $gallery_num ?>&page=<?php echo $print_page; ?>"><input type="button" value=<?= $print_page; ?>></a>
										<?php
										}; ?>

										<?php
										/* paging : 다음 페이지 */
										if ($page >= $total_page) {
										?>
											<a href="read.php?num=<?= $gallery_num ?>&page=<?php echo $total_page; ?>"><input type="button" value=">"></a>
										<?php } else { ?>
											<a href="read.php?num=<?= $gallery_num ?>&page=<?php echo ($page + 1); ?>"><input type="button" value=">"></a>
										<?php }; ?>
									</div>
								</div>
							</div>
						</div>
				</li>

				<li>
					<div class="scroll" id="scroll1">
						<p class="logo">Gallery</p>
						<!-- <h1>그림1</h1> -->
						<div class="frame_image-div">
							<div>
								<img class="frame" src="image/frame1.png" alt="frame" width="400" height="500">
								<img id="img1" src="image/<?= $pic_src1 ?>" alt="img1" width="300" height="380">
							</div>
							<div>
								<img class="frame" src="image/frame1.png" alt="frame" width="400" height="500">
								<img id="img2" src="image/<?= $pic_src2 ?>" alt="img2" width="300" height="380">
							</div>
							<div>
								<img class="frame" src="image/frame1.png" alt="frame" width="400" height="500">
								<img id="img3" src="image/<?= $pic_src3 ?>" alt="img3" width="300" height="380">
							</div>
						</div>
						<div class="floor"><img class="floor_img" src="image/floor2.jpg" alt="floor"></div>
						<input class="direction1" type="image" src="image/sign.png" height="150" width="150">
						<p class="scroll_info">스크롤을 해주세요</p>
					</div>
				</li>

				<li>
					<div class="scroll" id="scroll2">
						<p class="logo">Gallery</p>
						<!-- <h1>그림2</h1> -->
						<div class="frame_image-div">
							<div>
								<img class="frame" src="image/frame1.png" alt="frame" width="400" height="500">
								<img id="img4" src="image/<?= $pic_src4 ?>" alt="img4" width="300" height="380">
							</div>
							<div>
								<img class="frame" src="image/frame1.png" alt="frame" width="400" height="500">
								<img id="img5" src="image/<?= $pic_src5 ?>" alt="img5" width="300" height="380">
							</div>
							<div>
								<img class="frame" src="image/frame1.png" alt="frame" width="400" height="500">
								<img id="img6" src="image/<?= $pic_src6 ?>" alt="img6" width="300" height="380">
							</div>
						</div>
						<div class="floor"><img class="floor_img" src="image/floor2.jpg" alt="floor"></div>
						<input class="direction2" type="image" src="image/sign.png" height="150" width="150">
						<p class="scroll_info">스크롤을 해주세요</p>
					</div>
				</li>
				<li>
					<div class="scroll" id="scroll3">
						<p class="logo">Gallery</p>
						<!-- <h1>그림3</h1> -->
						<div class="frame_image-div">
							<div>
								<img class="frame" src="image/frame1.png" alt="frame" width="400" height="500">
								<img id="img7" src="image/<?= $pic_src7 ?>" alt="img7" width="300" height="380">
							</div>
							<div>
								<img class="frame" src="image/frame1.png" alt="frame" width="400" height="500">
								<img id="img8" src="image/<?= $pic_src8 ?>" alt="img8" width="300" height="380">
							</div>
							<div>
								<img class="frame" src="image/frame1.png" alt="frame" width="400" height="500">
								<img id="img9" src="image/<?= $pic_src9 ?>" alt="img9" width="300" height="380">
							</div>
						</div>
						<div class="floor"><img class="floor_img" src="image/floor2.jpg" alt="floor"></div>
						<input class="direction3" type="image" src="image/sign.png" height="150" width="150">
						<p class="scroll_info">스크롤을 해주세요</p>
					</div>
				</li>
				<li>
					<div class="scroll" id="scroll4">
						<p class="logo">Gallery</p>
						<!-- <h1>그림4</h1> -->
						<div class="frame_image-div">
							<div>
								<img class="frame" src="image/frame1.png" alt="frame" width="400" height="500">
								<img id="img10" src="image/<?= $pic_src10 ?>" alt="img7" width="300" height="380">
							</div>
							<div>
								<img class="frame" src="image/frame1.png" alt="frame" width="400" height="500">
								<img id="img11" src="image/<?= $pic_src11 ?>" alt="img8" width="300" height="380">
							</div>
							<div>
								<img class="frame" src="image/frame1.png" alt="frame" width="400" height="500">
								<img id="img12" src="image/<?= $pic_src12 ?>" alt="img9" width="300" height="380">
							</div>
						</div>
						<div class="floor"><img class="floor_img" src="image/floor2.jpg" alt="floor"></div>
						<input class="direction4" type="image" src="image/sign.png" height="150" width="150">
						<p class="scroll_info">스크롤을 해주세요</p>
					</div>
				</li>
				<li>
					<div class="scroll" id="gallery_finish">
						<p class="logo">Gallery</p>
						<!-- <h1>갤러리의 마지막</h1> -->
						<input id="review_go_btn" type="button" value="후기 적으러 가기">				
						<div class="floor"><img class="floor_img" src="image/floor2.jpg" alt="floor"></div>		
					</div>
				</li>
			</ul>
		</div>

	</main>


	<script type="text/javascript" src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
	<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
	<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
	<script type="module" src="./js/scroll3.js"></script>
	<script type="module" src="./js/read5.js"></script>

	<script type="text/javascript">
		var gallery_num = "<?php echo $gallery_num; ?>";

		function showPopup(picture_num) {
			window.open("picture_info.php?picture_num=" + picture_num + "&gallery_num=" + gallery_num, "read", "width=600, height=900, left=450, top=50");
		}
	</script>

</body>

</html>