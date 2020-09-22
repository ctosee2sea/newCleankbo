<?php
	include_once('./_common.php');

	$g5['title'] = '도핑및 의학정보';
	$gnb_css = 'md_menu';
	include_once(G5_THEME_PATH.'/head.php');
	$img_url = G5_IMG_URL.'/pc';
?>
		<div id="md_title">금지약물 국제표준</div>
		<div class="border_6px"></div>
		<?php
			$tab_menu = "prohibit";
			include_once ('page3_menu.php');
		?>
		<div id="md_prohb">
			<div style="float: left;">
				<img src="<?php echo $img_url; ?>/menu32_1img.jpg">
			</div>
			<div style="float: right;">
				<img src="<?php echo $img_url; ?>/2020_menu_32_3.jpg">
			</div>
			<div class="btn_cursor" style="float: right;top: -125px;right: 35px;position: relative;">
				<a href="<?php echo $img_url; ?>/m/plis_2020.pdf" download><img src="<?php echo $img_url; ?>/menu32_3img.jpg"></a>a>
			</div>
		</div>
		<script type="text/javascript">
			function download(argument) {
				location.href="./page3_2_down.php";
			}
		</script>
<?php
include_once(G5_THEME_PATH.'/tail.php');
?>