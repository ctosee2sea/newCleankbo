<?php
	include_once('./_common.php');

	$g5['main_title'] = '도핑 및 의학정보';
	$g5['sub_title'] = '금지약물 검색';
	include_once(G5_THEME_MOBILE_PATH.'/head.php');
	$img_url = G5_IMG_URL.'/mobile/page';
?>
		<div class="body-wrap">
			<img src="<?php echo $img_url; ?>/page31_1.jpg" class="img_fix">
			<img src="<?php echo $img_url; ?>/page31_2.jpg" class="img_fix">
			<div class="dg_btn_wrap">
				<p>위에 이용조건을 이해하고 이에 동의하십니까?</p>
				<div class="btn_wrap">
					<a href="javascript:;" onclick="alert('금지약물검색 서비스 이용을 위해 이용조건 동의가 필요합니다.')"><img src="<?php echo $img_url; ?>/noagree_btn.jpg" class="dg_src_btn1"></a>
					<a href="https://www.kada-ad.or.kr/" target="_blank"><img src="<?php echo $img_url; ?>/agree_btn.jpg" class="dg_src_btn2"></a>
				</div>
			</div>
		</div>
<?php
include_once(G5_THEME_MOBILE_PATH.'/tail.php');
?>