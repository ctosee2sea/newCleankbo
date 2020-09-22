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
add_javascript('<script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>', 1);


if($_GET['test']){
	//add_stylesheet('<link rel="stylesheet" href="'.G5_THEME_URL.'/css/main.css">', 3);

//echo G5_THEME_URL.'/css/main.css';exit;
}
?>
<script>
    if($('body').width() < 1050) {
        location.href="http://cleankbo.com/index.php?device=mobile";
    }
</script>
			<div id="mid-area-1">
				<div class="cycle-slideshow" data-cycle-log="false" data-cycle-timeout="0">
                    <!-- 자가점검 -->
                    <img src="<?php echo G5_IMG_URL; ?>/pc/covid19-pc.png" id="covid19">
                    <!-- 온라인교육 -->
                    <img src="<?php echo G5_IMG_URL; ?>/pc/lecture_pc1.jpg" id="online">
                    <!-- 8월통신문 -->
                    <img src="http://koreabaseballmuseum.com/file/pds.file/6.jpg" id="july20">
                    <!-- 불법스포츠도박 -->
                    <img src="<?php echo G5_IMG_URL; ?>/pc/20190809_pc.jpg">
                    <!-- 비디오판독영상 -->
                    <img src="<?php echo G5_IMG_URL; ?>/pc/replay_center.jpg" id="replaycenter">
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
					<a href="<?php echo G5_URL; ?>/page/guidebook.php"><img src="<?php echo G5_IMG_URL; ?>/pc/pc_guidebook.jpg" style="width:100%;"></a>          
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
// echo latest("theme/media", "media", 3, 25);
echo latest("theme/notice", "notice", 4, 25);
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
<div style="width:580px;height:auto;position:absolute;top: 160px;left: 220px;display: none;border: 4px solid #888;background: #CCC;z-index: 500;" id="popup1">
        <img src="<?php echo G5_IMG_URL;?>/pc/202004_info_pc.jpg" style="width:100%;"><br><p style="line-height: 30px;text-align: right;font-size: 11pt; padding-right: 20px;cursor:pointer;" onclick="popupClose('1')">닫기</p>
</div>
<div style="width:580px;height:auto;position:absolute;top: 160px;left: 800px;display: none;border: 4px solid #888;background: #CCC;z-index: 500;" id="popup2">
        <img src="<?php echo G5_IMG_URL;?>/pc/2020_announce.png" style="width:100%;"><br><p style="line-height: 30px;text-align: right;font-size: 11pt; padding-right: 20px;cursor:pointer;" onclick="popupClose('2')">닫기</p>
</div> -->

<script>
// $(document).ready(function(){
// 	checkCookie();
// });
// function popupClose(val){
//         //setCookie("popup"+val, "checked", 1);
// 	$("#popup"+val).hide();
// }

// function setCookie(cname, cvalue, exdays) {
//     var d = new Date();
//     d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
//     var expires = "expires="+d.toUTCString();
//     document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
// }

// function getCookie(cname) {
//     var name = cname + "=";
//     var ca = document.cookie.split(';');
//     for(var i = 0; i < ca.length; i++) {
//         var c = ca[i];
//         while (c.charAt(0) == ' ') {
//             c = c.substring(1);
//         }
//         if (c.indexOf(name) == 0) {
//             return c.substring(name.length, c.length);
//         }
//     }
//     return "";
// }

// function checkCookie() {
//     var flag = getCookie("popup1");
//     if (flag != "") {
//     	$("#popup1").css("display","none");
//     } else {
//     	$("#popup1").css("display","block");
//     }
//     flag = getCookie("popup2");
//     if (flag != "") {
//         $("#popup2").css("display","none");
//     } else {
//         $("#popup2").css("display","block");
//     }

// }
$('#covid19').click(function(){
    location.replace('/page/covid19.php');
});
$('#online').click(function(){
    location.replace('/page/lecture.php');
});
$('#replaycenter').click(function(){
    location.replace('https://www.kborc.com');
});
$('#july20').click(function(){
    location.replace('/bbs/board.php?bo_table=notice&wr_id=39');
});
</script>
<style>
    #covid19, #online, #replaycenter {cursor:pointer;}
      #covid19:hover, #online:hover, #replaycenter:hover {cursor:pointer;}
</style>


<!-- 공사중 배너 시작 -->
<!-- 공사중 배너 끝 -->

<?php
include_once(G5_THEME_PATH.'/tail.php');
?>
