<?php
	include_once('./_common.php');

	$g5['main_title'] = '개인정보처리방침';
	include_once(G5_THEME_MOBILE_PATH.'/head.php');
	$img_url = G5_IMG_URL.'/mobile/page';
?>
		<div class="body-wrap">
					<div id="center_intro" style="text-align:center;margin:0 auto;">
<h2>개인정보처리방침안내</h2>

<textarea class="privacy" readonly><?php echo get_text($config['cf_privacy']) ?></textarea>

		</div>
		</div>
		<style>
			.btn_cursor {
				margin:0 auto 30px;
			}
			.btn_cursor a {
	padding:10px 15px;
	border:1px solid #666;
	width: 120px;
    display: inline-block;
    text-align: center;
    font-size:12px;
}
.btn_cursor img {
	width:25px;
}
.btn_cursor a:hover {
	text-decoration:none;
}
.body-wrap {

}
.body-wrap h2 {
	font-size:20px;
	margin:50px auto;
}
.privacy {
	width:75%;
	margin:0 auto;
	padding:10%;
	height:100vh;
}
</style>
<?php
include_once(G5_THEME_MOBILE_PATH.'/tail.php');
?>