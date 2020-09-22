<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>
    </div>
</div>

<hr>

<div id="ft">
    <div id="ft_copy">
				서울특별시 강남구 강남대로 278 TEL 02)3460 - 4600<br>
				사업자등록번호: 213-82-02158<br>
        Copyright &copy; kbo한국야구위원회.</b> All rights reserved.<br>
    </div>
</div>

<?php
if(G5_DEVICE_BUTTON_DISPLAY && G5_IS_MOBILE) { ?>
<a href="<?php echo get_device_change_url(); ?>" id="device_change">PC 버전으로 보기</a>
<?php
}

if ($config['cf_analytics']) {
    echo $config['cf_analytics'];
}
?>

<script>
$(function() {
    // 폰트 리사이즈 쿠키있으면 실행
    font_resize("container", get_cookie("ck_font_resize_rmv_class"), get_cookie("ck_font_resize_add_class"));
});
</script>
<style>
#gnb_side {
	/* display:none; */
	width:280px;
	height:200px;
	top:100px;
	right:-280px;
	position:absolute;
	z-index:9999;
	background-color:#fff;
	-webkit-overflow-scrolling: touch;
	<?php if (strstr(strtolower($_SERVER['HTTP_USER_AGENT']), "mobile")) echo "overflow-y:scroll"; ?>
}
</style>

<div id="gnb_side">
	<div class="gnb_side_top">
		<img src="<?php echo G5_IMG_URL ?>/mobile/top_logo.png" id="gnb_side_logo" alt="<?php echo $config['cf_title']; ?>">
		<img src="<?php echo G5_IMG_URL ?>/mobile/side_btn_close.png" id="gnb_side_close">
	</div>
	<div class="gnb_side_menu">
		<div class="group">센터소개</div>
		<div class="group">인터넷 강의</div>
		<div class="group">도핑 및 의학정보</div>
		<div class="group">미디어 센터</div>
		<div class="group">부정신고</div>
	</div>
	<div class="gnb_side_foot">
		<a href="javascript:;">공지사항</a>
		<a href="javascript:;">본인인증 하는 이유</a>
		<a href="javascript:;">이용약관</a>
	</div>
	<div><img src="<?php echo G5_IMG_URL ?>/mobile/callcenter_banner.jpg" class="img_fix"></div>
</div>
<script>
$(document).ready(function ()
{
    gnb_side_toggle = false;

		$("#gnb_open").click(function ()
    {
			if (gnb_side_toggle) {
				gnb_side_off();
			}
			else {
				gnb_side_on();
			}
    });

		$("#gnb_side_close").click(function () {  
      $("#gnb_open").click();
    });
});

function gnb_side_on()
{
	gnb_modal();

	$("#gnb_side").css("top", $(window).scrollTop());
	//$("#mw_side").css("height", $(document).height());
	$("#gnb_side").css("height", window.innerHeight);

	$("#gnb_side").animate({ "right": "+=280px" }, "slow");
	$("#gnb_side_button").css("display", "none");

	<?php if (strstr(strtolower($_SERVER['HTTP_USER_AGENT']), "mobile")) { ?>
	//$("html, body").css({ "height": "100%", "overflow": "hidden" });

	document.ontouchmove = function(e) {
		if(!$('#gnb_side').has($(e.target)).length) {
			e.preventDefault();
		}
	};
	<?php } ?>

	gnb_side_toggle = true;
}

function gnb_side_off()
{
    $("#gnb_side").animate({ "right": "-=280px" }, "fast");
    $("#gnb_side_button").css("display", "block");

    gnb_modal_close();

    //$("html, body").css({ "height": "auto", "overflow": "auto" });

    document.ontouchmove = function(e) { return true; };

    $(".gnb_side_menu .board").css("display", "none");

    gnb_side_toggle = false;
}

function gnb_modal()
{
	$("<div id='gnb_modal_mask'/>").appendTo("body");
	$("#gnb_modal_mask").css({
			"width": $(window).width(),
			"height": $(document).height(),
			"position": "fixed",
			"z-index": 9000,
			"background-color": "#000",
			"display": "none",
			"opacity": 0.6,
			"left": 0,
			"top": 0
	});

	$("#gnb_modal_mask").show();

	$(window).one("resize", function() { 
		gnb_modal();
	});

	$("#gnb_modal_mask").click(function () {
		gnb_side_off();
	});
}

function gnb_modal_close() {
	$("#gnb_modal_mask").remove();
	$(window).unbind("resize");
}
</script>
<?php
include_once(G5_THEME_PATH."/tail.sub.php");
?>