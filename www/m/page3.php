<?php
	include_once('./_common.php');

	$g5['main_title'] = '도핑방지';
	include_once(G5_THEME_MOBILE_PATH.'/head.php');
	$img_url = G5_IMG_URL.'/mobile/page';
?>
		<style>
			#container {background-color:#222529;}
		</style>
		<div class="body-wrap">
			<img src="<?php echo $img_url; ?>/kada_banner.jpg" class="img_fix">
			<ul class="page_menu">
				<li><a href="<?php echo G5_URL; ?>/m/page3_1.php">금지약물 검색</a></li>
				<li><a href="<?php echo G5_URL; ?>/m/page3_2.php">금지약물 국제표준</a></li>
				<li><a href="<?php echo G5_URL; ?>/m/page3_3.php">도핑방지 규정위반</a></li>
				<li><a href="<?php echo G5_URL; ?>/m/page3_4.php">치료목적 사용면책</a></li>
				<li><a href="<?php echo G5_URL; ?>/m/page3_5.php">보충제 및 건강기능식품</a></li>
				<li><a href="<?php echo G5_URL; ?>/m/page3_6.php">도핑검사절차</a></li>
				<li><a href="<?php echo G5_URL; ?>/m/page3_8.php">도핑방지 관련 책자 모음</a></li>
				<li><a href="<?php echo G5_URL; ?>/m/page3_7.php">소재지 정보</a></li>
			</ul>
		</div>
<?php
include_once(G5_THEME_MOBILE_PATH.'/tail.php');
?>