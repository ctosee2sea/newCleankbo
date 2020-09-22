<?php
	include_once('./_common.php');

	$g5['main_title'] = '센터소개';
	include_once(G5_THEME_MOBILE_PATH.'/head.php');
	$img_url = G5_IMG_URL.'/mobile/page';
?>
		<div class="body-wrap">
					<div id="center_intro" style="text-align:center;margin:0 auto;">
			<div class="md_img"><img src="<?php echo $img_url; ?>/guidebook.jpg" width="100%;"></div>
			<div class="btn_cursor">
				<a href="<?php echo $G5_url; ?>/m/2020_cleankbo_guidebook.pdf" target="_blank"><img src="<?php $G5_url; ?>/img/pdf.png?ver=20200318">PDF 다운로드</a>
				<a href="<?php echo $G5_url; ?>/page/flipbook.php" target="_blank"><img src="<?php $G5_url; ?>/img/ebook.png?ver=20200318">E-BOOK</a>
			</div>
		</div>
		</div>
		<style>
			.btn_cursor {
				margin:0 auto 30px;
			}
			.btn_cursor a {
	padding:10px 15px;
	border:1px solid #666;
	width: 120px;
    display: inline-block;
    text-align: center;
    font-size:12px;
}
.btn_cursor img {
	width:25px;
}
.btn_cursor a:hover {
	text-decoration:none;
}
</style>
<?php
include_once(G5_THEME_MOBILE_PATH.'/tail.php');
?>