<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/tail.php');
    return;
}
?>

			<?php if (!defined("_INDEX")) { ?></div><?php } ?>
	</div>

	<!-- } 콘텐츠 끝 -->

	<hr>

	<!-- 하단 시작 { -->
	<div style="width: 100%;height: 1px;background-color: #e4e4e4;<?php echo $type=="lecture"?"":"margin-top: 100px;";?>"></div>
	<div id="footer">
		<div class="floatL"><img src="<?php echo G5_IMG_URL; ?>/pc/footer_logo.png"></div>
		<div class="floatL company_info">
			<div class="footer_menu" style="margin-left: 67px;">개인정보취급방침</div>
			<div class="floatL h_border12"></div>
			<div class="footer_menu">이용약관</div>
			<div class="footer_menu">
				<select>
					<option>패밀리사이트</option>
				</select>
			</div>
			<div style="clear: both;"></div>
			<div class="addr" style="margin-top: 40px;">서울특별시 강남구 강남대로 278</div>
			<div class="addr" style="margin-top: 8px;">TEL 02) 3460 - 4600 사업자등록번호 : 213-82-02158</div>
			<div class="addr" style="margin-top: 8px;">Copyright © kbo한국야구위원회 2017 All rights reserved.</div>
		</div>
		<div class="floatR"><img src="<?php echo G5_IMG_URL; ?>/pc/footer_call.png"></div>
	</div>

<?php
/*if(G5_DEVICE_BUTTON_DISPLAY && !G5_IS_MOBILE) { ?>
<a href="<?php echo get_device_change_url(); ?>" id="device_change">모바일 버전으로 보기</a>
<?php
}*/

if ($config['cf_analytics']) {
    echo $config['cf_analytics'];
}
?>

<!-- } 하단 끝 -->

<script>
$(function() {
    // 폰트 리사이즈 쿠키있으면 실행
    font_resize("container", get_cookie("ck_font_resize_rmv_class"), get_cookie("ck_font_resize_add_class"));
});
</script>

<?php
include_once(G5_THEME_PATH."/tail.sub.php");
?>