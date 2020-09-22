<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>
    </div>
</div>

<hr>

<div id="ft">

	<div id="ft_btn" >
    	<div class="ft_btn01">
        <a href="https://www.koreabaseball.com/Default.aspx" target="_blank">KBO 공식 홈페이지</a>
        </div>
        
    	<div class="ft_btn02">
        <a href="http://cleankbo.com/bbs/board.php?bo_table=notice&wr_id=47" target="_blank">클린베이스볼 모바일앱 다운로드</a>
        <!-- <a href="https://www.kbomarket.com/" target="_blank">KBO 마켓 홈페이지</a> -->
        </div>        
        
    </div>
    
    <div id="ft_copy">
		서울특별시 강남구 강남대로 278 TEL 02)3460 - 4699<br>
		사업자등록번호: 213-82-02158<br>
        Copyright &copy; KBO</b> All rights reserved.<br>
    </div>
</div>

<?php
/*if(G5_DEVICE_BUTTON_DISPLAY && G5_IS_MOBILE) { ?>
<a href="<?php echo get_device_change_url(); ?>" id="device_change">PC 버전으로 보기</a>
<?php
}*/

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
#gnb_side {overflow-y:auto;position:fixed;top:0;right:-280px;z-index:100;width:280px;height:100%;min-height:100%;background:#fff;
-webkit-transform:translate(0,0);
-moz-transform:translate(0,0);
transform:translate(0,0);
-webkit-transition:all .3s ease-out;
-moz-transition:all .3s ease-out;
transition:all .3s ease-out;
}
#gnb_side.show {
box-shadow:0 0 10px #212123;
-webkit-transform:translate(-280px,0);
-moz-transform:translate(-280px,0);
transform:translate(-280px,0);
}
.dim-append{display:none;opacity:0;width:100%;position:fixed;top:0;left:0;right;0;bottom:0;z-index:99;background:rgba(0,0,0,.5)}
</style>

<div id="gnb_side">
	<div class="inner">
		<div class="gnb_side_top">
			<img src="<?php echo G5_IMG_URL ?>/mobile/side_btn_home.png" id="gnb_side_home" alt="<?php echo $config['cf_title']; ?>">
			<img src="<?php echo G5_IMG_URL ?>/mobile/side_btn_close.png" id="gnb_side_close" alt="닫기">
		</div>
		<div class="gnb_side_profile">
		<?php if ($is_member) {?>
		<o><?php echo $member['mb_id']; ?></o>
		<a href="<?php echo G5_BBS_URL?>/member_confirm.php?url=register_form.php" class="user">회원정보</a>
		<?php } else { ?>
			<a href="<?php echo G5_BBS_URL?>/login.php" class="login">로그인이 필요합니다.</a>
		<?php } ?>
		</div>
		<div class="gnb_side_menu">
			<?php if ($is_member) {?>
			<div class="group"><a href="<?php echo G5_URL; ?>/m/mypage.php" class="name">마이페이지</a></div>
		<?php } ?>
			<div class="group"><a href="<?php echo G5_URL; ?>/m/page1.php">센터소개</a></div>
			<div class="group"><a href="<?php echo G5_BBS_URL; ?>/board.php?bo_table=notice">공지사항</a></div>
			<!--div class="group dep2"><a href="<?php echo G5_BBS_URL; ?>/board.php?bo_table=news">NEWS</a><a href="<?php echo G5_BBS_URL; ?>/board.php?bo_table=webtoon">웹툰</a><a href="<?php echo G5_BBS_URL; ?>/board.php?bo_table=notice">공지사항</a><a href="<?php echo G5_URL; ?>/m/guidebook.php" style="text-indent:unset;"><span style="font-size:11px;">클린베이스볼</span><br>가이드북</a></div-->
			<div class="group"><a href="<?php echo G5_URL; ?>/m/lecture.php">On-Line Edu</a></div>
			<div class="group"><a href="<?php echo G5_URL; ?>/m/page3.php">도핑방지</a></div>
			<div class="group"><a href="<?php echo G5_URL; ?>/m/report.php">신고센터</a></div>
			<div class="group covid19-menu"><a href="<?php echo G5_URL; ?>/m/covid19.php">코로나19 자가점검</a></div>
		</div>
		<div style="height:113px;"></div>
	</div>
	<div class="gnb_side_call"><img src="<?php echo G5_IMG_URL ?>/mobile/callcenter_banner.jpg" class="img_fix"></div>
</div>
<div class="dim-append"></div>
<script>
//android target _blank
        var mobile = (/iphone|ipad|ipod|android/i.test(navigator.userAgent.toLowerCase()));
        if (mobile) {
             // 유저에이전트를 불러와서 OS를 구분합니다.
            var userAgent = navigator.userAgent.toLowerCase();
            if (userAgent.search("android") > -1){
                $('a[target="_blank"]').map(function(){ var adUrl = $(this).attr('href')+"?external=true";$(this).attr("href",adUrl);})
            } else if ((userAgent.search("iphone") > -1) || (userAgent.search("ipod") > -1) || (userAgent.search("ipad") > -1)){
			    // $('a[target="_blank"]').map(function(){var adUrl = $(this).attr('href');$(this).removeAttr('target');})
    }}
       
        


//GNB
function sideMenu(){
	var open_target = $('#gnb_open');
	var closeTarget = $('#gnb_side_close, #gnb_side_home, .gnb_side_menu .group a');
	var menu = $('#gnb_side');
	var dimBG = $('.dim-append');
	open_target.on('click',function(){
			dimBG.fadeTo(300,1);
			menu.addClass('show');
			$('body').addClass('non-scroll');
	});
	dimBG.on('click',function(e){
			e.stopPropagation();
			closeTarget.click();
	});
	closeTarget.on('click',function(e){
			e.stopPropagation();
			if($('#gnb_side').hasClass('show')){
					menu.removeClass('show');
					dimBG.fadeTo(300,0);
					dimBG.hide();
					$('body').removeClass('non-scroll');
			}
	});
}
$(document).ready(function ()
{
	sideMenu();
	$('#gnb_side_home').on('click', function(){
		location.href = '<?php echo G5_URL; ?>';
	});
});

</script>
<?php
include_once(G5_THEME_PATH."/tail.sub.php");
?>
