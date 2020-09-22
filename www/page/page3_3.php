<?php
	include_once('./_common.php');

	$g5['title'] = '도핑및 의학정보';
	$gnb_css = 'md_menu';
	include_once(G5_THEME_PATH.'/head.php');
	$img_url = G5_IMG_URL.'/pc';
?>
		<div id="md_title">도핑방지 규정위반</div>
		<div class="border_6px"></div>
		<?php
			$tab_menu = "protect";
			include_once ('page3_menu.php');
		?>
		<div id="md_protect">
			<div class="md_img">
				<img src="<?php echo $img_url; ?>/menu33_1img.jpg">
			</div>
			<div>
				<img src="<?php echo $img_url; ?>/menu33_2img.jpg">
			</div>
		</div>
<?php
include_once(G5_THEME_PATH.'/tail.php');
?>