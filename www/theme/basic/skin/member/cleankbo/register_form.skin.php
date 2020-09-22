<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);
?>

<!-- 회원정보 입력/수정 시작 { -->
<div class="mbskin">

    <script src="<?php echo G5_JS_URL ?>/jquery.register_form.js"></script>
    <?php if($config['cf_cert_use'] && ($config['cf_cert_ipin'] || $config['cf_cert_hp'])) { ?>
    <script src="<?php echo G5_JS_URL ?>/certify.js?v=<?php echo G5_JS_VER; ?>"></script>
    <?php } ?>

    <form id="fregisterform" name="fregisterform" action="<?php echo $register_action_url ?>" onsubmit="return fregisterform_submit(this);" method="post" enctype="multipart/form-data" autocomplete="off">
    <input type="hidden" name="w" value="<?php echo $w ?>">
    <input type="hidden" name="url" value="<?php echo $urlencode ?>">
    <input type="hidden" name="agree" value="<?php echo $agree ?>">
    <input type="hidden" name="agree2" value="<?php echo $agree2 ?>">
    <input type="hidden" name="cert_type" value="<?php echo $member['mb_certify']; ?>">
    <input type="hidden" name="cert_no" value="">
    <?php if (isset($member['mb_sex'])) {  ?><input type="hidden" name="mb_sex" value="<?php echo $member['mb_sex'] ?>"><?php }  ?>
    <input type="hidden" name="mb_nick_default" value="<?php echo get_text($member['mb_nick']) ?>">
    <input type="hidden" name="mb_nick" value="<?php echo get_text($member['mb_nick']) ?>">
	<input type="hidden" name="mb_1" id="reg_mb_1" value="<?php echo get_text($member['mb_1']) ?>">
	<h1>회원가입</h1>
	<div class="tbl_frm01 tbl_wrap">
	<table style="width:740px;">
	<caption style="margin-top:29px;">정보 입력</caption>
	<tr>
		<td>
			<span class="frm_info">상태를 선택해주세요.</span>
			<a href="#프로선수" class="mb_1_btn<?php if ($member['mb_1']=='프로선수') echo ' on';?>">프로선수</a>
            <a href="#코칭스탭" class="mb_1_btn<?php if ($member['mb_1']=='코칭스탭') echo ' on';?>">코칭스탭</a>
            <a href="#구단직원" class="mb_1_btn<?php if ($member['mb_1']=='구단직원') echo ' on';?>">구단직원</a>
            <a href="#KBO" class="mb_1_btn kbo <?php if ($member['mb_1']=='KBO') echo ' on';?>">KBO</a>
            <a href="#기타관계자" class="etc mb_1_btn<?php if ($member['mb_1']=='기타관계자') echo ' on';?>">기타관계자<span style="font-size:11px;">(구단 협력업체, 미디어 등)</span></a>
            <a href="#일반" class="mb_1_btn normal<?php if ($member['mb_1']=='일반') echo ' on';?>">일반</a>
			<select name="mb_2" id="reg_mb_2">
				<option value="">소속 구분을 선택해주세요.</option>
				<option value="키움"<?php echo get_selected($member['mb_2'], '키움'); ?>>키움</option>
				<option value="두산"<?php echo get_selected($member['mb_2'], '두산'); ?>>두산</option>
				<option value="롯데"<?php echo get_selected($member['mb_2'], '롯데'); ?>>롯데</option>
				<option value="삼성"<?php echo get_selected($member['mb_2'], '삼성'); ?>>삼성</option>
				<option value="한화"<?php echo get_selected($member['mb_2'], '한화'); ?>>한화</option>
				<option value="KIA"<?php echo get_selected($member['mb_2'], 'KIA'); ?>>KIA</option>
				<option value="kt"<?php echo get_selected($member['mb_2'], 'kt'); ?>>kt</option>
				<option value="LG"<?php echo get_selected($member['mb_2'], 'LG'); ?>>LG</option>
				<option value="NC"<?php echo get_selected($member['mb_2'], 'NC'); ?>>NC</option>
				<option value="SK"<?php echo get_selected($member['mb_2'], 'SK'); ?>>SK</option>
				<option value="경찰"<?php echo get_selected($member['mb_2'], '경찰'); ?>>경찰</option>
				<option value="상무"<?php echo get_selected($member['mb_2'], '상무'); ?>>상무</option>
                <option value="미디어"<?php echo get_selected($member['mb_2'], '미디어'); ?>>미디어</option>
                <option value="기타"<?php echo get_selected($member['mb_2'], '기타'); ?>>기타</option>
			</select><br><br>
			<span class="frm_info">KBO와 일반 사용자는 소속구단을 선택하지 않아도 됩니다</span>
            <input type="text" class="mb_3_text frm_input " name="mb_3" id="mb_3" placeholder="소속 업체를 입력해주세요" required€€>
		</td>
	</tr>
	</table>
	</div>
	<div style="margin:0 auto;width:740px;margin-bottom:20px;font-size:16px;">사이트 이용정보 입력</div>
	<div class="tbl_frm01 tbl_wrap" style="border:1px solid #e4e4e4;">
        <table style="margin-top:54px;">
        <tbody>
        <tr>
            <td><label for="reg_mb_id">아이디<strong class="sound_only">필수</strong></label>
           		<br><input type="text" name="mb_id" value="<?php echo $member['mb_id'] ?>" id="reg_mb_id" <?php echo $required ?> <?php echo $readonly ?> class="frm_input <?php echo $required ?> <?php echo $readonly ?>" minlength="3" maxlength="20">
                <br><br><span class="frm_info">영문자, 숫자, _ 만 입력 가능. 최소 3자이상 입력하세요.</span>
                <span id="msg_mb_id"></span>
            </td>
        </tr>
        <tr>
            <td><label for="reg_mb_password">비밀번호<strong class="sound_only">필수</strong></label>
            <br><input type="password" name="mb_password" id="reg_mb_password" <?php echo $required ?> class="frm_input <?php echo $required ?>" minlength="3" maxlength="20"></td>
        </tr>
        <tr>
            <td><label for="reg_mb_password_re">비밀번호 확인<strong class="sound_only">필수</strong></label>
            <br><input type="password" name="mb_password_re" id="reg_mb_password_re" <?php echo $required ?> class="frm_input <?php echo $required ?>" minlength="3" maxlength="20"></td>
        </tr>
        <tr>
            <td><label for="reg_mb_name">이름<strong class="sound_only">필수</strong></label>
                <input type="text" id="reg_mb_name" name="mb_name" value="<?php echo get_text($member['mb_name']) ?>" <?php echo $required ?> <?php echo $readonly; ?> class="frm_input <?php echo $required ?> <?php echo $readonly ?>" size="10">
            </td>
        </tr>
        <tr>
            <td><label for="reg_mb_email">E-mail<strong class="sound_only">필수</strong></label>
           
                <?php if ($config['cf_use_email_certify']) {  ?>
                <span class="frm_info">
                    <?php if ($w=='') { echo "E-mail 로 발송된 내용을 확인한 후 인증하셔야 회원가입이 완료됩니다."; }  ?>
                    <?php if ($w=='u') { echo "E-mail 주소를 변경하시면 다시 인증하셔야 합니다."; }  ?>
                </span>
                <?php }  ?>
                <input type="hidden" name="old_email" value="<?php echo $member['mb_email'] ?>">
                <input type="text" name="mb_email" value="<?php echo isset($member['mb_email'])?$member['mb_email']:''; ?>" id="reg_mb_email" required class="frm_input email required" size="70" maxlength="100">
            </td>
        </tr>
        <?php if ($config['cf_use_hp'] || $config['cf_cert_hp']) {  ?>
        <tr>
            <td><label for="reg_mb_hp">휴대폰번호<?php if ($config['cf_req_hp']) { ?><strong class="sound_only">필수</strong><?php } ?></label>
            
                <input type="text" name="mb_hp" value="<?php echo get_text($member['mb_hp']) ?>" id="reg_mb_hp" <?php echo ($config['cf_req_hp'])?"required":""; ?> class="frm_input <?php echo ($config['cf_req_hp'])?"required":""; ?>" maxlength="20">

<?php if ($config['cf_cert_use']) { ?>
	<br><br><span class="frm_info">본인 인증은 필수입니다.</span>
<?php } ?>
				<?php if ($config['cf_cert_use'] && $config['cf_cert_hp']) { ?>
                <input type="hidden" name="old_mb_hp" value="<?php echo get_text($member['mb_hp']) ?>">
                <?php } ?>
<?php
			if($config['cf_cert_use']) {
			if($config['cf_cert_ipin'])
				// echo '<button type="button" id="win_ipin_cert" class="btn_frmline" style="width:0px;height:0px;"><span style="display:hidden;"><img src="'.$member_skin_url.'/img/join_ipin_icon.png" style="width:0px;height:0px;"><!--아이핀 본인확인--></span></button>'.PHP_EOL;
		if($config['cf_cert_hp'])
			echo '<button type="button" id="win_hp_cert" class="btn_frmline" style="margin-left:0px;"><img src="'.$member_skin_url.'/img/join_mobile_cion.png">휴대폰 본인 인증</button>'.PHP_EOL;

		echo '<noscript>본인확인을 위해서는 자바스크립트 사용이 가능해야합니다.</noscript>'.PHP_EOL;
	}
?>
<?php
				if ($config['cf_cert_use'] && $member['mb_certify']) {
					if($member['mb_certify'] == 'ipin')
							$mb_cert = '아이핀';
					else
							$mb_cert = '휴대폰';
			?>
<div id="msg_certify">
<strong><?php echo $mb_cert; ?> 본인확인</strong><?php if ($member['mb_adult']) { ?> 및 <strong>성인인증</strong><?php } ?> 완료
</div>
<?php } ?>
		</td>
        </tr>
        <?php }  ?>

        <tr>
            <td>자동등록방지
           <br> <?php echo captcha_html(); ?></td>
        </tr>
        </tbody>
        </table>
    </div>

    <div class="btn_confirm">
        <input type="submit" value="<?php echo $w==''?'회원가입':'정보수정'; ?>" id="btn_submit" class="btn_submit" accesskey="s">
        <a href="<?php echo G5_URL ?>" class="btn_cancel">취소</a>
    </div>
    </form>

    <script>
    $(function() {
		$("#reg_zip_find").css("display", "inline-block");

	    $('.mb_1_btn').click(function(e){
		    var href = $(this).prop('href');
		    var val = href.split('#');
		    console.log(decodeURI(val));
		    $('#reg_mb_1').val(decodeURI(val[1]));
//     	    $('#reg_mb_1').val(val[1]);
		    $('.mb_1_btn').removeClass('on');
		    $(this).addClass('on');
		    e.preventDefault();
		});

        <?php if($config['cf_cert_use'] && $config['cf_cert_ipin']) { ?>
        // 아이핀인증
        $("#win_ipin_cert").click(function() {
            if(!cert_confirm())
                return false;

            var url = "<?php echo G5_OKNAME_URL; ?>/ipin1.php";
            certify_win_open('kcb-ipin', url);
            return;
        });

        <?php } ?>
        <?php if($config['cf_cert_use'] && $config['cf_cert_hp']) { ?>
        // 휴대폰인증
        $("#win_hp_cert").click(function () {
             window.open("/okcert/phone_popup1.php","okcert","width=400,height=1");
        });
        // $("#win_hp_cert").click(function() {
        //     if(!cert_confirm())
        //         return false;

        //     <?php
        //     switch($config['cf_cert_hp']) {
        //         case 'kcb':
        //             $cert_url = G5_OKNAME_URL.'/hpcert1.php';
        //             $cert_type = 'kcb-hp';
        //             break;
        //         case 'kcp':
        //             $cert_url = G5_KCPCERT_URL.'/kcpcert_form.php';
        //             $cert_type = 'kcp-hp';
        //             break;
        //         case 'lg':
        //             $cert_url = G5_LGXPAY_URL.'/AuthOnlyReq.php';
        //             $cert_type = 'lg-hp';
        //             break;
        //         default:
        //             echo 'alert("기본환경설정에서 휴대폰 본인확인 설정을 해주십시오");';
        //             echo 'return false;';
        //             break;
        //     }
        //     ?>

        //     certify_win_open("<?php echo $cert_type; ?>", "<?php echo $cert_url; ?>");
        //     return;
        // });
        <?php } ?>
    });

    // submit 최종 폼체크
    function fregisterform_submit(f)
    {
        // 회원아이디 검사
        if (f.w.value == "") {
            var msg = reg_mb_id_check();
            if (msg) {
                alert(msg);
                f.mb_id.select();
                return false;
            }
        }

        if (f.w.value == "") {
            if (f.mb_password.value.length < 3) {
                alert("비밀번호를 3글자 이상 입력하십시오.");
                f.mb_password.focus();
                return false;
            }
        }

        if (f.mb_password.value != f.mb_password_re.value) {
            alert("비밀번호가 같지 않습니다.");
            f.mb_password_re.focus();
            return false;
        }

        if (f.mb_password.value.length > 0) {
            if (f.mb_password_re.value.length < 3) {
                alert("비밀번호를 3글자 이상 입력하십시오.");
                f.mb_password_re.focus();
                return false;
            }
        }

        // 이름 검사
        if (f.w.value=="") {
            if (f.mb_name.value.length < 1) {
                alert("이름을 입력하십시오.");
                f.mb_name.focus();
                return false;
            }

            /*
            var pattern = /([^가-힣\x20])/i;
            if (pattern.test(f.mb_name.value)) {
                alert("이름은 한글로 입력하십시오.");
                f.mb_name.select();
                return false;
            }
            */
        }

        <?php if($w == '' && $config['cf_cert_use'] && $config['cf_cert_req']) { ?>
        // 본인확인 체크
        if(f.cert_no.value=="") {
            alert("회원가입을 위해서는 본인확인을 해주셔야 합니다.");
            return false;
        }
        <?php } ?>

        // 닉네임 검사
//        if ((f.w.value == "") || (f.w.value == "u" && f.mb_nick.defaultValue != f.mb_nick.value)) {
//            var msg = reg_mb_nick_check();
//            if (msg) {
//                alert(msg);
//                f.reg_mb_nick.select();
//                return false;
//            }
//        }

        // E-mail 검사
        if ((f.w.value == "") || (f.w.value == "u" && f.mb_email.defaultValue != f.mb_email.value)) {
            var msg = reg_mb_email_check();
            if (msg) {
                alert(msg);
                f.reg_mb_email.select();
                return false;
            }
        }

        <?php if (($config['cf_use_hp'] || $config['cf_cert_hp']) && $config['cf_req_hp']) {  ?>
        // 휴대폰번호 체크
        var msg = reg_mb_hp_check();
        if (msg) {
            alert(msg);
            f.reg_mb_hp.select();
            return false;
        }
        <?php } ?>

        if (typeof f.mb_icon != "undefined") {
            if (f.mb_icon.value) {
                if (!f.mb_icon.value.toLowerCase().match(/.(gif)$/i)) {
                    alert("회원아이콘이 gif 파일이 아닙니다.");
                    f.mb_icon.focus();
                    return false;
                }
            }
        }

        if (typeof(f.mb_recommend) != "undefined" && f.mb_recommend.value) {
            if (f.mb_id.value == f.mb_recommend.value) {
                alert("본인을 추천할 수 없습니다.");
                f.mb_recommend.focus();
                return false;
            }

            var msg = reg_mb_recommend_check();
            if (msg) {
                alert(msg);
                f.mb_recommend.select();
                return false;
            }
        }

        <?php echo chk_captcha_js();  ?>

        document.getElementById("btn_submit").disabled = "disabled";

        return true;
    }    
    
    setTimeout(function(){
$('.mb_1_btn').click(function(){
    $('.kbo, .normal').hasClass('on') ? $('#reg_mb_2').hide() : $('#reg_mb_2').show();
    $('.etc').hasClass('on') ? $('#mb_3').show() : $('#mb_3').hide();
    })
},500);
    </script>

</div>
<!-- } 회원정보 입력/수정 끝 -->
