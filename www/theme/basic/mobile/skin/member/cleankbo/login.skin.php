<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);
?>

<div id="mb_login" class="mbskin">
    <h1><img src="<?php echo G5_IMG_URL ?>/mobile/mlogo_2020.png?v=2020430" alt="<?php echo $config['cf_title']; ?>"></h1>

    <form name="flogin" action="<?php echo $login_action_url ?>" onsubmit="return flogin_submit(this);" method="post">
    <input type="hidden" name="url" value="<?php echo $login_url ?>">

    <div id="login_frm">
        <label for="login_id" class="sound_only">아이디<strong class="sound_only"> 필수</strong></label>
        <input type="hidden" name="token" id="token" value="">
        <input type="hidden" name="os" id="os" value="">
        <input type="text" name="mb_id" id="login_id" placeholder="아이디(필수)" required class="frm_input required" maxLength="20">
        <label for="login_pw" class="sound_only">비밀번호<strong class="sound_only"> 필수</strong></label>
        <input type="password" name="mb_password" id="login_pw" placeholder="비밀번호(필수)" required class="frm_input required" maxLength="20">
        <input type="submit" value="로그인" class="btn_submit">
		<a href="./register.php" class="btn01">회원 가입</a>

        <div>
            <input type="checkbox" name="auto_login" id="login_auto_login" checked>
            <label for="login_auto_login">자동로그인</label>
			<a href="<?php echo G5_BBS_URL ?>/password_lost.php" target="_blank" id="login_password_lost" class="btn02">아이디 비밀번호 찾기</a>
        </div>
    </div>

    </form>

</div>

<script>
        var currentOS;
        var mobile = (/iphone|ipad|ipod|android/i.test(navigator.userAgent.toLowerCase()));
        if (mobile) {
             // 유저에이전트를 불러와서 OS를 구분합니다.
            var userAgent = navigator.userAgent.toLowerCase();
            if (userAgent.search("android") > -1){
                currentOS = "android";
                $('#token').val(BRIDGE.ftoken());
            } else if ((userAgent.search("iphone") > -1) || (userAgent.search("ipod") > -1) || (userAgent.search("ipad") > -1)){
                currentOS = "ios";
                function populate(param) {
                    $('#token').val(param);
                }
            } else{
                 currentOS = "whatelse";

            }
       } else {
          currentOS = "whatelse";
       }
        $('#os').val(currentOS);

$(function(){
    $("#login_auto_login").click(function(){
        if (this.checked) {
            this.checked = confirm("자동로그인을 사용하시면 다음부터 회원아이디와 비밀번호를 입력하실 필요가 없습니다.\n\n공공장소에서는 개인정보가 유출될 수 있으니 사용을 자제하여 주십시오.\n\n자동로그인을 사용하시겠습니까?");}
    });
});

function flogin_submit(f)
{
    return true;
}
</script>
