<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);
?>
<style>
	body {background-color:#f3f3f3;}
</style>

<div class="mbskin">
    <script src="<?php echo G5_JS_URL ?>/jquery.register_form.js"></script>
    <?php if($config['cf_cert_use'] && ($config['cf_cert_ipin'] || $config['cf_cert_hp'])) { ?>
    <script src="<?php echo G5_JS_URL ?>/certify.js?v=<?php echo G5_JS_VER; ?>"></script>
    <?php } ?>

    <form name="fregisterform" id="fregisterform" action="<?php echo $register_action_url ?>" onsubmit="return fregisterform_submit(this);" method="post" enctype="multipart/form-data" autocomplete="off">
    <input type="hidden" name="w" value="<?php echo $w ?>">
    <input type="hidden" name="url" value="<?php echo $urlencode ?>">
    <input type="hidden" name="agree" value="<?php echo $agree ?>">
    <input type="hidden" name="agree2" value="<?php echo $agree2 ?>">
    <input type="hidden" name="cert_type" value="<?php echo $member['mb_certify']; ?>">
    <input type="hidden" name="cert_no" value="">
    <?php if (isset($member['mb_sex'])) { ?><input type="hidden" name="mb_sex" value="<?php echo $member['mb_sex'] ?>"><?php } ?>
    <input type="hidden" name="mb_nick_default" value="<?php echo get_text($member['mb_nick']) ?>">
    <input type="hidden" name="mb_nick" id="reg_mb_nick" value="<?php echo get_text($member['mb_nick']) ?>">
    <input type="hidden" name="mb_1" id="reg_mb_1" value="<?php echo get_text($member['mb_1']) ?>">    

    <div class="tbl_frm01 tbl_wrap">
        <table>
        <!-- <caption style="margin-top:29px;">죄송합니다. <br>현재 모바일 회원 가입을 보수 중입니다. <br>데스크탑에서 회원 가입을 시도해주시거나, 조금 후에 다시 접속해주세요.</caption> -->
        <caption style="margin-top:29px;">정보 입력</caption>
        <tr>
            <td>
                <span class="frm_info">상태를 선택해주세요.</span>
            <a href="#프로선수" class="mb_1_btn<?php if ($member['mb_1']=='프로선수') echo ' on';?>">프로선수</a>
            <a href="#코칭스탭" class="mb_1_btn<?php if ($member['mb_1']=='코칭스탭') echo ' on';?>">코칭스탭</a>
            <a href="#구단직원" class="mb_1_btn<?php if ($member['mb_1']=='구단직원') echo ' on';?>">구단직원</a>
            <a href="#KBO" class="mb_1_btn kbo<?php if ($member['mb_1']=='KBO') echo ' on';?>">KBO</a>
            <a href="#기타관계자" class="etc mb_1_btn<?php if ($member['mb_1']=='기타관계자') echo ' on';?>">기타관계자</a>
            <a href="#일반" class="mb_1_btn normal<?php if ($member['mb_1']=='일반') echo ' on';?>">일반</a>
            </td>
        </tr>
        <tr>
            <td>
                <select name="mb_2" id="reg_mb_2">
                    <option value="">소속구단을 선택해주세요.</option>
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
                </select>
                <span class="frm_info">KBO와 일반 사용자는 소속구단을 선택하지 않아도 됩니다</span>
                <input type="text" class="mb_3_text frm_input " name="mb_3" id="mb_3" placeholder="소속 업체를 입력해주세요">
            </td>
        </tr>
        </table>
    </div>

    <div class="tbl_frm01 tbl_wrap">
        <table>
        <caption>개인정보 입력</caption>
        <tr>
            <td>
								<strong class="sound_only">아이디 필수</strong>                
                <input type="text" name="mb_id" value="<?php echo $member['mb_id'] ?>" id="reg_mb_id" class="frm_input <?php echo $required ?> <?php echo $readonly ?>" minlength="3" maxlength="20" placeholder="아이디" <?php echo $required ?> <?php echo $readonly ?>>
								<span class="frm_info">영문자, 숫자, _ 만 입력 가능. 최소 3자이상 입력하세요.</span>
                <span id="msg_mb_id"></span>
            </td>
        </tr>
        <tr>
            <td><strong class="sound_only">비밀번호 필수</strong><input type="password" name="mb_password" id="reg_mb_password" class="frm_input <?php echo $required ?>" minlength="3" maxlength="20" placeholder="비밀번호" <?php echo $required ?>></td>
        </tr>
        <tr>
            <td><strong class="sound_only">비밀번호 확인 필수</strong><input type="password" name="mb_password_re" id="reg_mb_password_re" class="frm_input <?php echo $required ?>" minlength="3" maxlength="20" placeholder="비밀번호 확인" <?php echo $required ?>></td>
        </tr>

        <tr>
            <td>
								<strong class="sound_only">E-mail 필수</strong>
                <input type="hidden" name="old_email" value="<?php echo $member['mb_email'] ?>">
                <input type="email" name="mb_email" value="<?php echo isset($member['mb_email'])?$member['mb_email']:''; ?>" id="reg_mb_email" required class="frm_input email required" size="50" maxlength="100" placeholder="이메일 주소">                
                <span class="frm_info">
										<?php 
											if ($config['cf_use_email_certify']) {  
												if ($w=='') { echo "E-mail 로 발송된 내용을 확인한 후 인증하셔야 회원가입이 완료됩니다."; }  
												if ($w=='u') { echo "E-mail 주소를 변경하시면 다시 인증하셔야 합니다."; }  
											}  else {
												echo "등록하신 이메일 주소로 아이디와 비밀번호 정보를 보내드리오니 정확하게 입력바랍니다.";
											}
										?>
                </span>                
            </td>
        </tr>

				<tr>
            <td>
								<strong class="sound_only">이름 필수</strong>                
                <input type="text" id="reg_mb_name" name="mb_name" value="<?php echo get_text($member['mb_name']) ?>" placeholder="이름" <?php echo $required ?> <?php echo $readonly; ?> class="frm_input <?php echo $required ?> <?php echo $readonly ?>">
            </td>
        </tr>

        <?php if ($config['cf_use_hp'] || $config['cf_cert_hp']) {  ?>
        <tr>
            <td>
								<?php if ($config['cf_req_hp']) { ?><strong class="sound_only">휴대폰번호 필수</strong><?php } ?>
                <input type="text" name="mb_hp" value="<?php echo get_text($member['mb_hp']) ?>" id="reg_mb_hp" <?php echo ($config['cf_req_hp'])?"required":""; ?> class="frm_input <?php echo ($config['cf_req_hp'])?"required":""; ?>" maxlength="20" placeholder="휴대폰 번호">
                <?php if ($config['cf_cert_use'] && $config['cf_cert_hp']) { ?>
                <input type="hidden" name="old_mb_hp" value="<?php echo get_text($member['mb_hp']) ?>">
                <?php } ?>
            </td>
        </tr>
        <?php } ?>
				<tr>
						<td>
                <?php
                if($config['cf_cert_use']) {
                    if($config['cf_cert_ipin'])
                        // echo '<button type="button" id="win_ipin_cert" class="btn_frmline"><img src="'.$member_skin_url.'/img/join_ipin_icon.png">아이핀 본인확인</button>'.PHP_EOL;
                    if($config['cf_cert_hp'] && $config['cf_cert_hp'] != 'lg')
                        echo '<button type="button" id="win_hp_cert" class="btn_frmline"><img src="'.$member_skin_url.'/img/join_mobile_cion.png">휴대폰 본인확인</button>'.PHP_EOL;

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
								<?php if ($config['cf_cert_use']) { ?>
                <span class="frm_info">아이핀 본인확인 후에는 이름이 자동 입력되고 휴대폰 본인확인 후에는 이름과 휴대폰번호가 자동 입력되어 수동으로 입력할수 없게 됩니다.</span>
                <?php } ?>
						</td>
				</tr>
        </table>
    </div>

    <div class="tbl_frm01 tbl_wrap">
        <table>
        <caption>자동등록방지</caption>       
        <tr>
            <td><?php echo captcha_html(); ?></td>
        </tr>
        </table>
    </div>

    <div class="btn_confirm">
        <input type="submit" value="<?php echo $w==''?'회원가입':'정보수정'; ?>" id="btn_submit" class="btn_submit" accesskey="s">
        <a href="<?php echo G5_URL; ?>/" class="btn_cancel">취소</a>
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
//          $('#reg_mb_1').val(val[1]);
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

        // $("#win_hp_cert").click(function () {
        //      window.open("/okcert/phone_popup1.php","okcert","width=400,height=1");
        // });
        $("#win_hp_cert").click(function() {
            if(!cert_confirm())
                return false;

            <?php
            switch($config['cf_cert_hp']) {
                case 'kcb':
                    // $cert_url = G5_OKNAME_URL.'/hpcert1.php';
                    $cert_url = "/okcert/phone_popup1.php";
                    $cert_type = 'kcb-hp';
                    break;
                case 'kcp':
                    $cert_url = G5_KCPCERT_URL.'/kcpcert_form.php';
                    $cert_type = 'kcp-hp';
                    break;
                default:
                    echo 'alert("기본환경설정에서 휴대폰 본인확인 설정을 해주십시오");';
                    echo 'return false;';
                    break;
            }
            ?>

            certify_win_open("<?php echo $cert_type; ?>", "<?php echo $cert_url; ?>");
            return;
        });
        <?php } ?>
    });

    // 인증체크
    function cert_confirm()
    {
        var val = document.fregisterform.cert_type.value;
        var type;

        switch(val) {
            case "ipin":
                type = "아이핀";
                break;
            case "hp":
                type = "휴대폰";
                break;
            default:
                return true;
        }

        if(confirm("이미 "+type+"으로 본인확인을 완료하셨습니다.\n\n이전 인증을 취소하고 다시 인증하시겠습니까?"))
            return true;
        else
            return false;
    }

    // submit 최종 폼체크
    function fregisterform_submit(f)
    {
        // 선수정보 체크
        if (f.mb_1.value == "") {
            alert('사용자 상태를 선택하십시오.');
            $('.mb_1_btn').focus();
            return false;
        }

        if (f.mb_1.value == "프로선수") {
            if (f.mb_2.selectedIndex == 0) {
                alert('소속구단을 선택하십시오.');
                f.mb_2.focus();
                return false;
            }
        }

        // 회원아이디 검사
        if (f.w.value == "") {
            var msg = reg_mb_id_check();
            if (msg) {
                alert(msg);
                f.mb_id.select();
                return false;
            }
        }

        if (f.w.value == '') {
            if (f.mb_password.value.length < 3) {
                alert('비밀번호를 3글자 이상 입력하십시오.');
                f.mb_password.focus();
                return false;
            }
        }

        if (f.mb_password.value != f.mb_password_re.value) {
            alert('비밀번호가 같지 않습니다.');
            f.mb_password_re.focus();
            return false;
        }

        if (f.mb_password.value.length > 0) {
            if (f.mb_password_re.value.length < 3) {
                alert('비밀번호를 3글자 이상 입력하십시오.');
                f.mb_password_re.focus();
                return false;
            }
        }

        // 이름 검사
        if (f.w.value=='') {
            if (f.mb_name.value.length < 1) {
                alert('이름을 입력하십시오.');
                f.mb_name.focus();
                return false;
            }
        }

        <?php if($w == '' && $config['cf_cert_use'] && $config['cf_cert_req']) { ?>
        // 본인확인 체크
        if(f.cert_no.value=="") {
            alert("회원가입을 위해서는 본인확인을 해주셔야 합니다.");
            return false;
        }
        <?php } ?>

        // 닉네임 검사
        f.mb_nick.value = f.mb_name.value;
        if ((f.w.value == "") || (f.w.value == "u" && f.mb_nick.defaultValue != f.mb_nick.value)) {
            var msg = reg_mb_nick_check();
            /*if (msg) {
                alert(msg);
                f.reg_mb_nick.select();
                return false;
            }*/
        }        

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

        if (typeof f.mb_icon != 'undefined') {
            if (f.mb_icon.value) {
                if (!f.mb_icon.value.toLowerCase().match(/.(gif)$/i)) {
                    alert('회원아이콘이 gif 파일이 아닙니다.');
                    f.mb_icon.focus();
                    return false;
                }
            }
        }

        if (typeof(f.mb_recommend) != 'undefined' && f.mb_recommend.value) {
            if (f.mb_id.value == f.mb_recommend.value) {
                alert('본인을 추천할 수 없습니다.');
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

        <?php echo chk_captcha_js(); ?>

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