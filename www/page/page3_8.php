<?php
	include_once('./_common.php');

	$g5['title'] = '도핑및 의학정보';
	$gnb_css = 'md_menu';
	include_once(G5_THEME_PATH.'/head.php');
	$img_url = G5_IMG_URL.'/pc';
?>
<style>
	#md_guide > div {
		float:left;
		position:relative;
		width:33.3%;
		display:block;
		text-align:center;
		margin:0 auto;
	}
	#md_guide > div > img {
		width:90%;
		border:1px solid #c6c6c6;
	}
	#md_guide::after {
		clear:both;
		content:'';
		visibility:hidden;
		padding:0;
		margin:0;
	}
	#md_guide .btn_cursor {
		position:absolute;
		transform:translate(-50%,20%);
		top:100%;
		left:50%;
	}
</style>
		<div id="md_title">도핑방지 관련 책자 모음</div>
		<div class="border_6px"></div>
		<?php
			$tab_menu = "guide";
			include_once ('page3_menu.php');
		?>
		<div id="md_guide">
			<!-- <div style="float: left;">
				<img src="<?php echo $img_url; ?>/guide_cover_img.jpg">
			</div>
			<div style="float: right;">
				<img src="<?php echo $img_url; ?>/guide_1st.jpg">
			</div>
			<div class="btn_cursor" style="float: right;top: -125px;right: 35px;position: relative;" onclick="download()">
				<img src="<?php echo $img_url; ?>/menu32_3img.jpg">
			</div> -->
			<div class="pdf">
				<img src="<?php echo $img_url; ?>/guide.jpg">
				<div class="btn_cursor" onclick="download('guide')">
					<img src="<?php echo $img_url; ?>/menu32_3img.jpg">
				</div>
			</div>
			<div class="pdf">
			<img src="<?php echo $img_url; ?>/guide_1.jpg">
				<div class="btn_cursor" onclick="download('guide_1')">
					<img src="<?php echo $img_url; ?>/menu32_3img.jpg">
				</div>
			</div>
			<div class="pdf">
			<img src="<?php echo $img_url; ?>/guide_2.jpg">
				<div class="btn_cursor" onclick="download('guide_2')">
					<img src="<?php echo $img_url; ?>/menu32_3img.jpg">
				</div>
			</div>
		</div>
		<script type="text/javascript">
			function download(argument) {
				location.href="./page3_8_down.php?down="+argument;
			}
		</script>
<?php
include_once(G5_THEME_PATH.'/tail.php');
?>