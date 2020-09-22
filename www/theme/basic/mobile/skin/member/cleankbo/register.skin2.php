<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);
?>
<style>
	body {background-color:#f3f3f3;}
</style>
<div class="mbskin">

    <form name="fregister" id="fregister" action="<?php echo $register_action_url ?>" onsubmit="return fregister_submit(this);" method="POST" autocomplete="off">

		<section id="fregister_title">		
			<h2>이용약관</h2>
	    <p>가입 전에 반드시 읽어 보시고, 동의하셔야 회원가입이 완료됩니다.</p>
		</section>

		<section id="fregister_agree">
			<div class="chk_wrap"><input type="checkbox" name="agree" value="1" id="agree11"><label for="agree11">회원가입약관(필수)</label><a href="javascript:;">내용보기</a></div>
			<div class="chk_wrap"><input type="checkbox" name="agree2" value="1" id="agree21"><label for="agree21">개인정보처리방침(필수)</label><a href="javascript:;">내용보기</a></div>
			<div class="tbl_head01 tbl_wrap">
				<table>
						<caption>개인정보처리방침안내</caption>
						<thead>
						<tr>
								<th>목적</th>
								<th>항목</th>
								<th>보유기간</th>
						</tr>
						</thead>
						<tbody>
						<tr>
								<td>이용자 식별 및 본인여부 확인</td>
								<td>아이디, 이름, 비밀번호</td>
								<td>회원 탈퇴 시까지</td>
						</tr>
						<tr>
								<td>고객서비스 이용에 관한 통지,<br>CS대응을 위한 이용자 식별</td>
								<td>연락처 (이메일, 휴대전화번호)</td>
								<td>회원 탈퇴 시까지</td>
						</tr>
						</tbody>
				</table>
			</div>
		</section>

    <section id="fregister_term">
        <h2>회원가입약관</h2>
        <textarea readonly><?php echo get_text($config['cf_stipulation']) ?></textarea>
    </section>

    <section id="fregister_private">
        <h2>개인정보처리방침안내</h2>        
    </section>

    <div class="btn_confirm">
        <input type="submit" class="btn_submit" value="회원가입">
    </div>

    </form>

    <script>
    function fregister_submit(f)
    {
        if (!f.agree.checked) {
            alert("회원가입약관의 내용에 동의하셔야 회원가입 하실 수 있습니다.");
            f.agree.focus();
            return false;
        }

        if (!f.agree2.checked) {
            alert("개인정보처리방침안내의 내용에 동의하셔야 회원가입 하실 수 있습니다.");
            f.agree2.focus();
            return false;
        }

        return true;
    }
    </script>

</div>