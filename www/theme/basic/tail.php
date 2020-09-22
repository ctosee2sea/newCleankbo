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
	<div style="width: 100%;height: 1px;background-color:#fff; <?php echo $type=="lecture"?"":"margin-top: 100px;";?>"></div>
    
    <div id="footer_link">
    	<div class="footer_linkbox">
            <ul>
                <li><a href="/page/privacy.php" target="_blank">개인정보취급방침</a></li>
                <li>이용약관</li>
                <li><a href="https://www.koreabaseball.com/Default.aspx" target="_blank">KBO 공식</a></li>
                <li><a href="http://cleankbo.com/bbs/board.php?bo_table=notice&wr_id=47" target="_blank">클린베이스볼 모바일앱 다운로드</a></li>
                
                <!-- <li><a href="https://www.kbomarket.com/" target="_blank">KBO 마켓</a></li> -->
            </ul>                       
        </div> 
    </div>
    
	<div id="footer">
		<div class="floatL">
            <div class="footer_logo">
            <img width=120 src="<?php echo G5_IMG_URL; ?>/pc/footer_logo_202007.png">
            </div>
            
            <div class="footer_text">
            서울특별시 강남구 강남대로 278 TEL 02) 3460 - 4699 사업자등록번호 : 213-82-02158<br />
            Copyright © KBO 2017 All rights reserved.
            </div>
        </div>
		<div class="floatR">
        클린베이스볼센터<br />신고접수<br />
        <span>02.3460.4699</span>
        </div>
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
function popupPage(value){
	switch(value){
		case "home":
			window.open("http://www.koreabaseball.com");
			break;
		case "market":
			window.open("http://www.kbomarket.com");
			break;
	}
}
</script>

<?php
include_once(G5_THEME_PATH."/tail.sub.php");
?>
