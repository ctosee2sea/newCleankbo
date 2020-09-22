<?php
	include_once('./_common.php');

	$g5['title'] = '도핑및 의학정보';
	$gnb_css = 'md_menu';
	include_once(G5_THEME_PATH.'/head.php');
	$img_url = G5_IMG_URL.'/pc';
?>
		<div id="md_title">소재지정보</div>
		<div class="border_6px"></div>
		<?php
			$tab_menu = "info";
			include_once ('page3_menu.php');
		?>
		<div id="md_info">
		<div class="md_img">
			<img src="<?php echo $img_url; ?>/menu37_1img.jpg">
		</div>
		<div class="md_img">
			<img src="<?php echo $img_url; ?>/menu37_2img.jpg">
		</div>
	</div>
<?php
include_once(G5_THEME_PATH.'/tail.php');
?>