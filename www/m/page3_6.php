<?php
	include_once('./_common.php');

	$g5['main_title'] = '도핑 및 의학정보';
	$g5['sub_title'] = '도핑검사절차';
	include_once(G5_THEME_MOBILE_PATH.'/head.php');
	$img_url = G5_IMG_URL.'/mobile/page';
?>
		<div class="body-wrap">
			<img src="<?php echo $img_url; ?>/page36_1.jpg" class="img_fix">
			<div class="tab_wrap">
				<a href="#cont1" class="tabtype1 on">소변시료채취 절차</a>
				<a href="#cont2" class="tabtype1">혈액시료채취 절차</a>
			</div>
			<div id="cont1" class="tab_cont">
				<img src="<?php echo $img_url; ?>/page36_21.jpg" class="img_fix">
				<img src="<?php echo $img_url; ?>/page36_22.jpg" class="img_fix">
				<img src="<?php echo $img_url; ?>/page36_23.jpg" class="img_fix">
				<img src="<?php echo $img_url; ?>/page36_24.jpg" class="img_fix">
				<img src="<?php echo $img_url; ?>/page36_25.jpg" class="img_fix">
			</div>
			<div id="cont2" class="tab_cont" style="display:none;">
				<img src="<?php echo $img_url; ?>/page36_31.jpg" class="img_fix">
				<img src="<?php echo $img_url; ?>/page36_32.jpg" class="img_fix">
				<img src="<?php echo $img_url; ?>/page36_33.jpg" class="img_fix">
				<img src="<?php echo $img_url; ?>/page36_34.jpg" class="img_fix">
			</div>
		</div>
		<script>
			$(function(){
				$('.tabtype1').on('click', function(){
					var $thisHref = $(this).attr('href');
					$('.tabtype1.on').removeClass('on');
					$(this).addClass('on');
					$('.tab_cont:visible').hide();
					$($thisHref).show();
					return false;
				});
			});
		</script>
<?php
include_once(G5_THEME_MOBILE_PATH.'/tail.php');
?>