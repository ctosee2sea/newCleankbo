<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if($bo_table) $g5['main_title'] = $board['bo_subject'];
// if($bo_table=='notice' || $bo_table=='news' || $bo_table == 'webtoon' ||  $bo_table=='media') $g5['main_title'] = '미디어센터';
if(!$g5['main_title']) $g5['main_title'] = $g5['title'];

include_once(G5_THEME_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');



$sql = "INSERT into log (log,ip,`time`,tip,log2,mb_id) values ('{$_SERVER["HTTP_USER_AGENT"]}','{$_SERVER["REMOTE_ADDR"]}','".date("Y-m-d H:i:s")."','1','{$_SERVER["REQUEST_URI"]}','{$member['mb_id']}')";
mysql_query($sql);

?>

<header id="hd">
	<h1 id="hd_h1"><?php echo $g5['title'] ?></h1>

	<div class="to_content"><a href="#container">본문 바로가기</a></div>

	<?php
	if(defined('_INDEX_')) { // index에서만 실행
		include G5_MOBILE_PATH.'/newwin.inc.php'; // 팝업레이어
	} ?>

	<div id="hd_wrapper">
		<div id="logo">
		<?php if(defined('_INDEX_')) { // index에서만 실행 ?>		
			<a href="<?php echo G5_URL ?>"><img src="<?php echo G5_IMG_URL ?>/pc/top_logo202007.png" width="150" class="logo_btn" alt="<?php echo $config['cf_title']; ?>"></a>	
			<!-- <a href="<?php echo G5_URL ?>"><img src="<?php echo G5_IMG_URL ?>/mobile/mtop_logo2020.png" class="logo_btn" alt="<?php echo $config['cf_title']; ?>"></a>	 -->
		<?php } else { ?>
			<a href="javascript:history.go(-1);"><img src="<?php echo G5_IMG_URL ?>/mobile/prev_btn.png" class="btn-back" alt="이전"></a>	
			<h2><?php echo $g5['main_title']; ?></h2>
		<?php } ?>
		</div>
		<a href="javascript:;" id="gnb_open"><img src="<?php echo G5_IMG_URL ?>/mobile/top_menu.png" width="50%"></a>
	</div>
</header>

<hr>

<div id="wrapper">
	<div id="container">
	  <?php if ((!$bo_table || $w == 's' ) && !defined("_INDEX_") && $g5['sub_title']) { ?><div id="container_title"><?php echo $g5['sub_title'] ?></div><?php } ?>
