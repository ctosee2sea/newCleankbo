<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/head.php');
    return;
}

include_once(G5_THEME_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');


$sql = "INSERT into log (log,ip,`time`,tip,log2,mb_id) values ('{$_SERVER["HTTP_USER_AGENT"]}','{$_SERVER["REMOTE_ADDR"]}','".date("Y-m-d H:i:s")."','1','{$_SERVER["REQUEST_URI"]}','{$member['mb_id']}')";
mysql_query($sql);


// mysql_query("INSERT into log (log) values ('log')");
?>

<!-- 상단 시작 { -->
<div id="hd">
	<div id="top-menu">
		<div class="logo"><a href="<?php echo G5_URL; ?>"><?php echo $config['cf_title']; ?></a></div>
		<div class="mid">
			<div class="item">
				<ul class="ul_menu">
					<li class="<?php echo $gnb_css=="info"?"on":"off";?>"><a href="<?php echo G5_URL; ?>/page/page1.php">센터소개</a></li>
					<li class="margin10">•</li>
					<li class="<?php echo $bo_table?"on":"off";?>"><a href="<?php echo G5_BBS_URL; ?>/board.php?bo_table=notice">공지사항</a></li>
					<li class="margin10">•</li>
					<li class="<?php echo $gnb_css=="lecture"?"on":"off";?>"><a href="<?php echo G5_URL; ?>/page/lecture.php">On-Line Edu</a></li>
					<li class="margin10">•</li>
					<li class="<?php echo $gnb_css=="md_menu"?"on":"off";?>"><a href="<?php echo G5_URL; ?>/page/page3.php">도핑방지</a></li>
					<li class="margin10">•</li>
					<li class="<?php echo $gnb_css=="report"?"on":"off";?>"><a href="<?php echo G5_URL; ?>/page/report.php">신고센터</a></li>
					<li class="margin10">•</li>


<?php
if($member['mb_id'] == ""){
?>
					<li><a href="<?php echo G5_URL; ?>/bbs/login.php">로그인</a></li>
					<li class="margin10">•</li>	
<?php
}else{?>
					<li><a href="<?php echo G5_URL; ?>/page/mypage.php">마이페이지</a></li>
					<li class="margin10">•</li>	
			
<?php }?>
	<li class="covid19-menu <?php echo $gnb_css=="covid19"?"on":"off";?>"><a href="<?php echo G5_URL; ?>/page/covid19.php">코로나19 자가점검</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- } 상단 끝 -->

<hr>

<!-- 콘텐츠 시작 { -->
<div id="wrapper">
    <?php if (!defined("_INDEX_")) { ?><div id="container" <?php if ($bo_table) echo ' class="fix"'; ?>><?php } ?>
