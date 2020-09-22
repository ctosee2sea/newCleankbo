<?php
	include_once('./_common.php');

	$g5['title'] = '센터소개';
	$gnb_css = 'info';
	include_once(G5_THEME_PATH.'/head.php');
	$img_url = G5_IMG_URL.'/pc';

?>
<?php 
	if(G5_IS_MOBILE){ ?>
	<img src="/img/page2.jpg" style="width:100%;">
	<?php }else{ ?>
	<div class="wrap">
<h2>개인정보처리방침안내</h2>

<textarea class="privacy" readonly><?php echo get_text($config['cf_privacy']) ?></textarea>
</div>
	<?php
	}
?>
<style>
	.wrap {width:1050px;margin:0 auto;}
	.wrap h2 {
		font-size:26px;
		margin:50px 0 0;
	}
	.privacy {
		width:990px;margin:30px auto;height:600px;padding:30px;
	}
</style>
<?php
include_once(G5_THEME_PATH.'/tail.php');
?>



