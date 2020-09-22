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
	<style>
		#center_intro{width: 100%;min-width: 1050px;margin: 0 auto;} 
		#center_intro .md_img {margin: 0 auto;text-align: center;background-position-x: center;}
		</style>

		<div id="center_intro" style="border:1px solid #333">
			<div class="md_img" style="background-image: url(<?php echo $img_url; ?>/center_intro01.jpg);height: 369px;"></div>
			<div class="md_img" style="background-image: url(<?php echo $img_url; ?>/center_intro03.jpg?ver=20204300808);background-repeat:no-repeat;height: 780px;"></div>
		</div>

	<?php
	}
?>

<?php
include_once(G5_THEME_PATH.'/tail.php');
?>
