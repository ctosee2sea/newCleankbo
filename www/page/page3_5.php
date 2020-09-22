<?php
	include_once('./_common.php');

	$g5['title'] = '도핑및 의학정보';
	$gnb_css = 'md_menu';
	include_once(G5_THEME_PATH.'/head.php');
	$img_url = G5_IMG_URL.'/pc';
?>
		<div id="md_title">보충제 및 건강기능식품</div>
		<div class="border_6px"></div>
		<?php
			$tab_menu = "supply";
			include_once ('page3_menu.php');
		?>
		<div id="md_purpose">
			<div class="md_img">
				<img src="<?php echo $img_url; ?>/menu35_1img.jpg">
			</div>
		</div>
<?php
include_once(G5_THEME_PATH.'/tail.php');
?>