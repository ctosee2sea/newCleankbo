 <?php

//header('Location: http://cleankbo.com/adm/img/notice_mobile.jpg');
//exit;

if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_THEME_MOBILE_PATH.'/head.php');
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

?>
				<div class="owl-carousel owl-theme">
					<div class="item"><a href="/m/covid19.php"><img src="<?php echo G5_IMG_URL ?>/mobile/covid19.jpg" class="img_fix"></a></div>
					<div class="item"><a href="/m/lecture.php"><img src="<?php echo G5_IMG_URL ?>/mobile/lecture_mobile2.jpg" class="img_fix"></a></div>
					<div class="item"><a href="/bbs/board.php?bo_table=notice&wr_id=39"><img src="/data/editor/2007/thumb-5da900f91342139e897aaa5a0d6c3a7a_1596183803_8461_600x600.jpg" class="img_fix"></a></div>
					<div class="item"><img src="<?php echo G5_IMG_URL ?>/mobile/20190809_mobile.jpg" class="img_fix"></div>
					<div class="item"><a href='https://www.kborc.com' target="_blank"><img src="<?php echo G5_IMG_URL ?>/mobile/replay_center.jpg" class="img_fix"></a></div>
				</div>
				<link rel="stylesheet" type="text/css" href="<?php echo G5_CSS_URL ?>/owl.carousel.min.css">
				<link rel="stylesheet" type="text/css" href="<?php echo G5_CSS_URL ?>/owl.theme.default.css">
				<script src="<?php echo G5_JS_URL ?>/owl.carousel.min.js"></script>
				<script>
				$(document).ready(function() {
					$('.owl-carousel').owlCarousel({
					    items:1,
					    lazyLoad:true,
					    loop:true,
					    // margin:10,
					    autoHeight:true
					});
				})
				</script>
				<div id="main_menu">
					<ul class="menu">
						<li><a href="<?php echo G5_URL; ?>/m/page3_1.php" class="first"><img src="<?php echo G5_IMG_URL ?>/mobile/submenu_1.png" class="img_fix"></a></li>
						<li><a href="<?php echo G5_URL; ?>/m/lecture.php"><img src="<?php echo G5_IMG_URL ?>/mobile/submenu_2.png" class="img_fix"></a></li>
						<li><a href="<?php echo G5_URL; ?>/m/page3.php"><img src="<?php echo G5_IMG_URL ?>/mobile/submenu_3.png" class="img_fix"></a></li>
						<li><a href="<?php echo G5_URL; ?>/m/report.php"><img src="<?php echo G5_IMG_URL ?>/mobile/submenu_4.png" class="img_fix"></a></li>
					</ul>
				</div>
				<!-- 메인화면 최신글 시작 -->
				<div id="main_news_lt">
					<div class="title">NEWS</div>
				<?php
					//  최신글
					// 이 함수가 바로 최신글을 추출하는 역할을 합니다.
					// 스킨은 입력하지 않을 경우 관리자 > 환경설정의 최신글 스킨경로를 기본 스킨으로 합니다.

					// 사용방법
					// latest(스킨, 게시판아이디, 출력라인, 글자수);
					echo latest('theme/news', 'news', 3, 25);
				?>
				</div>
				<!-- 메인화면 최신글 끝 -->


				<a href="<?php echo G5_URL; ?>/m/guidebook.php"><img src="<?php echo G5_IMG_URL ?>/mobile/m_guidebook.jpg" class="img_fix"></a>

<?php
include_once(G5_THEME_MOBILE_PATH.'/tail.php');
?>
