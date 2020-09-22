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


if($_GET['test']){
	//add_stylesheet('<link rel="stylesheet" href="'.G5_THEME_URL.'/css/main.css">', 3);

//echo G5_THEME_URL.'/css/main.css';exit;
}
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
				<div class="mid-area-3-01" style="width: 1052px;margin: 0 auto;">
					<?php 
					if(!$_GET['test']){
						echo latest("theme/news", 'news', 4, 25);
}
					?>

				</div>
                
                <div class="mid-area-3-02">
                	<div class="webtoon_box">
					<a href="<?php echo G5_BBS_URL; ?>/board.php?bo_table=webtoon"><img src="<?php echo G5_IMG_URL; ?>/pc/webtoon_banner.jpg"></a>                    
                    </div>
                    <div class="list_box">
                    	<ul>
<!--
                        	<li>
                                <dl>
                                <dt>PRESS</dt>
                                <dd><a href="#">KBO리그, 1차 도핑테스트 결과 전원 음성...</a></dd>
                                <dd>2017.05.08</dd>                            
                                </dl>
                            </li>
                            
                        	<li>
                                <dl>
                                <dt>PRESS</dt>
                                <dd><a href="#">KBO리그, 1차 도핑테스트 결과 전원 음성...</a></dd>
                                <dd>2017.05.08</dd>                            
                                </dl>
                            </li>
                            
                        	<li>
                                <dl>
                                <dt>PRESS</dt>
                                <dd><a href="#">KBO리그, 1차 도핑테스트 결과 전원 음성...</a></dd>
                                <dd>2017.05.08</dd>                            
                                </dl>
                            </li>
                  	    <li>
-->
<?php
echo latest("theme/media", "media", 3, 25);
echo latest("theme/notice", "notice", 1, 25);
?>
<!--
                                <dl>
                                <dt>NOTICE</dt>
                                <dd><a href="#">인터넷강의 이용안내</a></dd>
                                <dd>2017.05.08</dd>                            
                                </dl>
-->

                        </ul>
                    </div>
                </div>
			</div>

<!--        
<div style="width:420px;height:1170px;position:absolute;top: 40px;left: 40px;display: none;border: 4px solid #888;background: #CCC;z-index: 500;" id="popup1">
	<img src="<?php echo G5_IMG_URL;?>/pc/2018_03.png" style="width:100%;"><br><p style="line-height: 30px;text-align: right;font-size: 11pt;padding-right: 20px;cursor:pointer;" onclick="popupClose('1')">닫기</p>
</div>-->
<!--
<div style="width:420px;height:620px;position:absolute;top: 80px;left: 180px;display: none;border: 4px solid #888;background: #CCC;z-index: 500;" id="popup2">
        <img src="<?php echo G5_IMG_URL;?>/pc/2018_06_info.png" style="width:100%;"><br><p style="line-height: 30px;text-align: right;font-size: 11pt;padding-right: 20px;cursor:pointer;" onclick="popupClose('2')">닫기</p>
</div>
-->
<!--<div style="width:420px;height:580px;position:absolute;top: 80px;left: 180px;display: none;border: 4px solid #888;background: #CCC;z-index: 500;" id="popup3">
        <img src="<?php echo G5_IMG_URL;?>/pc/20180418.jpg" style="width:100%;"><br><p style="line-height: 30px;text-align: right;font-size: 11pt; padding-right: 20px;cursor:pointer;" onclick="popupClose('3')">닫기</p>
</div>
<div style="width:350px;height:330px;position:absolute;top: 120px;left: 320px;display: none;border: 4px solid #888;background: #CCC;z-index: 500;" id="popup4">
        <img src="<?php echo G5_IMG_URL;?>/pc/pop_20180619.jpg" style="width:100%;"><br><p style="line-height: 30px;text-align: right;font-size: 11pt; padding-right: 20px;cursor:pointer;" onclick="popupClose('4')">닫기</p>
</div>-->
<div style="width:580px;height:650px;position:absolute;top: 160px;left: 420px;display: none;border: 4px solid #888;background: #CCC;z-index: 500;" id="popup5">
        <img src="<?php echo G5_IMG_URL;?>/pc/2019_2_2nd.jpg" style="width:100%;"><br><p style="line-height: 30px;text-align: right;font-size: 11pt; padding-right: 20px;cursor:pointer;" onclick="popupClose('5')">닫기</p>
</div>

<script>
$(document).ready(function(){
	checkCookie();
});
function popupClose(val){
        //setCookie("popup"+val, "checked", 1);
	$("#popup"+val).hide();
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
    var flag = getCookie("popup1");
    if (flag != "") {
	$("#popup1").css("display","none");
    } else {
	$("#popup1").css("display","block");
    }
    flag = getCookie("popup2");
    if (flag != "") {
        $("#popup2").css("display","none");
    } else {
        $("#popup2").css("display","block");
    }
    flag = getCookie("popup3");
    if (flag != "") {
        $("#popup3").css("display","none");
    } else {
        $("#popup3").css("display","block");
    }	
    flag = getCookie("popup4");
    if (flag != "") {
        $("#popup4").css("display","none");
    } else {
        $("#popup4").css("display","block");
    }		
    flag = getCookie("popup5");
    if (flag != "") {
        $("#popup5").css("display","none");
    } else {
        $("#popup5").css("display","block");
    }       
}
</script>
<?php
include_once(G5_THEME_PATH.'/tail.php');
?>
