<?php
	include_once('./_common.php');

	$g5['main_title'] = '도핑 및 의학정보';
	$g5['sub_title'] = '금지약물 국제표준';
	include_once(G5_THEME_MOBILE_PATH.'/head.php');
	$img_url = G5_IMG_URL.'/mobile/page';
?>
		<div class="body-wrap">
			<img src="<?php echo $img_url; ?>/page32_1.jpg" class="img_fix">
			<a href="<?php echo G5_URL; ?>/m/plis_2020.pdf" target="_blank"><img src="<?php echo $img_url; ?>/page32_2.jpg" class="img_fix"></a>
		</div>
<?php
include_once(G5_THEME_MOBILE_PATH.'/tail.php');
?>