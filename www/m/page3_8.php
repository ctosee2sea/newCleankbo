<?php
	include_once('./_common.php');

	$g5['main_title'] = '도핑 및 의학정보';
	$g5['sub_title'] = '도핑방지 관련 책자 모음';
	include_once(G5_THEME_MOBILE_PATH.'/head.php');
	$img_url = G5_IMG_URL.'/mobile/page';
?>
<style>
	.body-wrap {
		padding:50px 0;
	}
	.pdf {
		margin:0 auto 50px;
	}
	.pdf img {
		display:block;
		text-align:center;
		margin: 0 auto;
	}
	.pdf > img {
		max-width:403px;
		width:80%;
		border:1px solid #e6e6e6;
		margin:0 auto 10px;
	}
</style>
		<div class="body-wrap">
		<div class="pdf">
				<img src="<?php echo $img_url; ?>/guide.jpg" class="img_fix">
				<a href="<?php echo G5_URL; ?>/m/guide.pdf" target="_blank">
					<img src="<?php echo $img_url; ?>/menu32_3img.jpg">
				</a>
			</div>
			<div class="pdf">
			<img src="<?php echo $img_url; ?>/guide_1.jpg" class="img_fix">
			<a href="<?php echo G5_URL; ?>/m/guide_1.pdf" target="_blank">
					<img src="<?php echo $img_url; ?>/menu32_3img.jpg">
			</a>
			</div>
			<div class="pdf">
			<img src="<?php echo $img_url; ?>/guide_2.jpg" class="img_fix">
			<a href="<?php echo G5_URL; ?>/m/guide_2.pdf" target="_blank">
					<img src="<?php echo $img_url; ?>/menu32_3img.jpg">
			</a>
			</div>
		</div>
<?php
include_once(G5_THEME_MOBILE_PATH.'/tail.php');
?>