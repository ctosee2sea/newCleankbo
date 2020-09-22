<?php
define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/index.php');
    return;
}

include_once(G5_LIB_PATH.'/thumbnail.lib.php');
include_once(G5_THEME_PATH.'/head.php');
// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.G5_THEME_URL.'/css/main.css">', 1);
add_javascript('<script src="'.G5_URL.'/js/jquery.cycle2.min.js"></script>', 1);
?>
			<div id="mid-area-1">
				<div class="cycle-slideshow" data-cycle-log="false" data-cycle-timeout="7000">
					<img src="<?php echo G5_IMG_URL; ?>/pc/slide_banner01.jpg">
					<img src="<?php echo G5_IMG_URL; ?>/pc/slide_banner02.jpg">
					<div class="cycle-pager"></div>
				</div>
			</div>
			<div id="mid-area-2">
				<div style="padding-top: 100px;padding-bottom: 80px;"><img src="<?php echo G5_IMG_URL; ?>/pc/title.png"></div>
				<div class="mid-menu">
					<div class="floatL w250 h200 bg_set_normal btn_cursor" id="submenu_01" onclick="location.href='./page/page3.php'">
					</div>
					<div class="h_border floatL"></div>
					<div class="floatL w250 h200 bg_set_normal btn_cursor" id="submenu_02" onclick="location.href='./page/lecture.php'">
					</div>
					<div class="h_border floatL"></div>
					<div class="floatL w250 h200 bg_set_normal btn_cursor" id="submenu_03" onclick="location.href='./page/page3_6.php'">
					</div>
					<div class="h_border floatL"></div>
					<div class="floatL w250 h200 bg_set_normal btn_cursor" id="submenu_04" onclick="location.href='./page/report.php'">
					</div>
				</div>
			</div>
			<div id="mid-area-3">				
				<div style="width: 1052px;margin: 0 auto;">
					<?php 
						echo latest("theme/news", 'news', 3, 25);
					?>
					<div class="webtoon_area floatR">
						<a href="<?php echo G5_BBS_URL; ?>/board.php?bo_table=webtoon"><img src="<?php echo G5_IMG_URL; ?>/pc/webtoon_banner.png" style="padding: 102px 0 0 0;"></a>
					</div>
				</div>
			</div>
<div style="width:580px;height:787px;position:absolute;top: 40px;left: 40px;display: none;border: 4px solid #888;background: #CCC;z-index: 500;" id="popup">
	<img src="<?php echo G5_IMG_URL;?>/pc/new_message.jpg" style="width:100%;"><br><p style="line-height: 30px;text-align: right;font-size: 11pt;padding-right: 20px;cursor:pointer;" onclick="popupClose()">닫기</p>
</div>
<script>
$(document).ready(function(){
	checkCookie();
});
function popupClose(){
        setCookie("popup", "checked", 1);
	$("#popup").hide();
}

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function checkCookie() {
    var flag = getCookie("popup");
    if (flag != "") {
	$("#popup").css("display","none");
    } else {
	$("#popup").css("display","block");
    }
}
</script>
<?php
include_once(G5_THEME_PATH.'/tail.php');
?>
