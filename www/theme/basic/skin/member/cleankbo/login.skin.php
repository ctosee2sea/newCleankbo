<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);
?>

<!-- 로그인 시작 { -->
<div id="mb_login" class="mbskin">
    <h1><?php echo $g5['title'] ?></h1>

    <form name="flogin" action="<?php echo $login_action_url ?>" onsubmit="return flogin_submit(this);" method="post">
    <input type="hidden" name="url" value="<?php echo $login_url ?>">

    <fieldset id="login_fs">
        <input type="text" name="mb_id" id="login_id" required class="frm_input required"  maxLength="20" placeholder="아이디"><br>
        <input type="password" name="mb_password" id="login_pw" required class="frm_input required"  maxLength="20" placeholder="비밀번호"><br>
		<input type="submit" value="로그인" class="btn_submit"><br>
		<input type="button" value="회원가입" class="btn_join" onclick="go_join()">

	</fieldset>
    <aside id="login_info">
        <div>
                    <input type="checkbox" name="auto_login" id="login_auto_login" checked>
        <label for="login_auto_login">자동로그인</label> /
            <a href="<?php echo G5_BBS_URL ?>/password_lost.php" target="_blank" id="login_password_lost">아이디 비밀번호 찾기</a>
        </div>
    </aside>
    </form>

</div>

<script>
$(function(){
    $("#login_auto_login").click(function(){
        if (this.checked) {
            this.checked = confirm("자동로그인을 사용하시면 다음부터 회원아이디와 비밀번호를 입력하실 필요가 없습니다.\n\n공공장소에서는 개인정보가 유출될 수 있으니 사용을 자제하여 주십시오.\n\n자동로그인을 사용하시겠습니까?");
        }
    });
});

function flogin_submit(f)
{
    return true;
}
function go_join(){
	location.href="./register.php";
}
</script>
<!-- } 로그인 끝 -->
