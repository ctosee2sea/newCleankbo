<?php
	include_once('./_common.php');

	$g5['title'] = '도핑및 의학정보';
	$gnb_css = 'md_menu';
	include_once(G5_THEME_PATH.'/head.php');
	$img_url = G5_IMG_URL.'/pc';
?>
		<div id="md_title">금지약물검색</div>
		<div class="border_6px"></div>
		<?php
			$tab_menu = "search";
			include_once ('page3_menu.php');
		?>
		<div id="md_search">
			<div class="md_img">
				<img src="<?php echo $img_url; ?>/menu31_1img.jpg">
			</div>
			<div class="agree">
				<div style="float: left;font-size: 16px;color: #333;padding-left: 120px;">위의 이용조건을 완전히 이해하고 이에 동의하십니까?</div>
				<div style="float: right;font-size: 16px;color: #333;padding-right: 120px;"><label class="btn_cursor"><input type="radio" name="agree" value="Y">&nbsp;&nbsp;동의합니다.</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label class="btn_cursor"><input type="radio" name="agree" value="N">&nbsp;&nbsp;동의하지 않습니다.</label></div>
			</div>
			<div>
				<a href="javascript:;" onclick="move_search()"><img src="<?php echo $img_url; ?>/menu31_2img.jpg"></a>
			</div>
		</div>
		<script type="text/javascript">
			function move_search(argument) {
				if ($('input[name=agree]:checked').val() != 'Y') {
					alert('금지약물검색 서비스 이용을 위해 이용조건 동의가 필요합니다.')
					return false;
				}
				window.open('https://www.kada-ad.or.kr/','_blank');
			}
		</script>
<?php
include_once(G5_THEME_PATH.'/tail.php');
?>