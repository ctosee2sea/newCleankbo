

<?php
include_once('./_common.php');

// if($member['mb_id'] == ""){
//         echo "<script>alert('로그인이 필요한 서비스입니다.');location.replace('/bbs/login.php')</script>";
//         exit;
// }

	$g5['title'] = '신고센터';
	$gnb_css = 'report';
	include_once(G5_THEME_PATH.'/head.php');
	$img_url = G5_IMG_URL.'/pc';
?>
		<style>
		#md_title{font-size: 36px;font-weight: bold;color: #333333;height: 184px;line-height: 184px;width: 1050px;margin: 0 auto;text-align: center;letter-spacing: 10px;}
		.color_on{background-color: #00489d;color: #ffffff;}
		.color_off{background-color: #f3f3f3;color: #aaaaaa;}
		.line_83{line-height: 83px;height: 83px;}
		.line_41{line-height: 41px;height: 83px;}
		.line_no{line-height: 22px;height: 63px;padding-top: 20px;}
		.border_1px{height: 1px;background-color: #e4e4e4;width: 100%;}
		.border_1_1050{height: 1px;background-color: #e4e4e4;width: 1050px;margin: 0 auto;}
		.border_6px{height: 6px;background-color: #e4e4e4;width: 1050px;margin: 0 auto;}
		.floatL{float: left;}
		.w_84{width: 84px;}
		.w_680{width: 680px;}
		.w_170{width: 170px;}
		.w_116{width: 116px;}
		#report{width: 1050px;margin: 0 auto;}
		#report .md_img{ border: 2px solid #d4d4d4; margin: 10px 0 0 0;position:relative;background-image:url('<?php echo $img_url; ?>/report_img.png');background-size:cover;width:1050px;height:450px;}
		#report .agree{ width: 1050px;height: 110px;margin: 0 auto;background-color: #e4e4e4;line-height: 110px; }
		#report h3 {padding:40px 0 20px;color:#333;font-size:26px;font-weight:bold;border-bottom:3px solid #00489d;}
		#report .tb {border-collapse:collapse;border-spacing:0}
		#report .tb th, #report .tb td {padding:0 0 0 22px;height:82px;border-bottom:1px solid #e4e4e4;text-align:left;}
		#report .tb th {color:#333;font-size:16px;border-right:1px solid #e4e4e4;}
		#report .inpt {width:830px;height:42px;font-size:16px;border:1px solid #e4e4e4;background-color:#f3f3f3;}
		#report .txta {margin:15px 0;height:320px;}
		#report .chk_grp label {display:inline-block;margin-right:30px;color:#333;font-size:15px;cursor:pointer;}
		#report .chk_grp input[type="radio"] {margin-right:12px;}
		.filebox {padding:15px 0 5px;}
		.filebox input[type="file"] { position: absolute; width: 1px; height: 1px; padding: 0; margin: -1px; overflow: hidden; clip:rect(0,0,0,0); border: 0; }
		.filebox label { display: inline-block; margin-bottom:10px; padding: 7px 10px; width:80px;height:29px; color: #aaa; font-size: 14px; line-height: 29px; vertical-align: middle; background-color: #f3f3f3; cursor: pointer; border: 1px solid #e4e4e4; border-bottom-color: #e4e4e4; text-align:center;} 
		.filebox .upload-name { display: inline-block; margin-right:15px;margin-bottom:10px; padding: 7px 10px; width:400px; height:29px; font-size: 14px; font-family: inherit; line-height: normal; vertical-align: middle; background-color: #f5f5f5; border: 1px solid #ebebeb; border-bottom-color: #e2e2e2; -webkit-appearance: none; /* 네이티브 외형 감추기 */ -moz-appearance: none; appearance: none; }
		#report .btn_wrap {padding-top:80px;text-align:center;}
		.btntype1, .btntype2 {display:inline-block;min-width:200px;padding:29px 7px 28px;text-align:center;color:#fff;font-size:16px;background-color:#00489d;line-height:1.0;border:0;}
			.btntype2 {margin-left:15px;color:#aaa;background-color:#f3f3f3;}
	.more {
		display: block;
	    position: absolute;
	    width: 25%;
	    height: 25px;
	    cursor: pointer;
	    left: 40%;
	}
	.more1 {
	    bottom:75px;
	}
	.more2 {
		bottom:45px
	}

	.title-text {
		width: 45%;
		float: left;
		margin-left: 20px;
		margin-top: 30px;
	}

	.title-text ul li {
		font-size: 17px;
		line-height: 2;
	}

	.cont-text {
		width: 45%;
		float: left;
		margin-top: 30px;
		margin-left: 60px;
		margin-right:20px;
	}

	.cont-text ul {
		margin-bottom: 10px;
	}

	.cont-text ul li {
		font-size: 17px;
		line-height: 2;
	}
		</style>		
		<div id="md_title">신고센터</div>
		<div class="border_6px"></div>
		<div id="report">
			<div class="md_img" style="background-image: none;">
				<div class="title-text">
					<span style="font-size: 2em;font-weight: 600;">신고대상</span>
					<ul>
						<li>프로야구 구성원의 승부조작 관련 제의, 가담, 관련정보 등</li>
						<li>프로야구 구성원의 스포츠토토, 불법스포츠 베팅 참여 관련</li>
						<li>프로야구 구성원이 부정행위와 관련하여 금품수수 또는 향응을 제공받는 행위</li>
						<li>프로야구 구성원의 금품요구, 청탁, 협박, 폭행행위</li>
						<li>프로야구 구성원의 기타 부정행위</li>
					</ul>

					<span style="font-size: 2em;font-weight: 600;">신고자 포상 및 자진신고 감면</span>
					<ul>
						<li>신고자 또는 제보자에게 KBO 상벌위원회가 정한 포상금 지급</li>
						<li>당사자가 자진하여 승부조작, 불법스포츠 도박 및 부정행위 등을 신고할 경우 제제를 감경 또는 면제</li>
					</ul>
				</div>

				<div class="cont-text">
					<span style="font-size: 2em;font-weight: 600;">신고자 보호</span>
					<ul>
						<li>신고자의 신분은 철저히 비밀로 보장하며 신고에 대하여 어떠한 불이익도 받지 않음</li>
					</ul>

					<span style="font-size: 2em;font-weight: 600;">2020 KBO 규약</span>
					<ul>
						<li>제 14장 유해행위 (<a href="#" onclick="pdf(14)">더 보기</a>)</li>
						<li>제 15장 이해관계의 금지 (<a href="#" onclick="pdf(15)">더 보기</a>)</li>
					</ul>

					<div class="agree" style="width:100%; line-height: 3px;margin-top:50px;">
						<div style="text-align:center;font-size: 16px;color: #333;padding-top:30px;">위 내용에 동의하십니까?</div>
						<div style="font-size: 16px;text-align: center;padding-top:30px;color: #333;">
							<label class="btn_cursor"><input type="radio" name="agree" value="Y">&nbsp;&nbsp;동의합니다.</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<label class="btn_cursor"><input type="radio" name="agree" value="N">&nbsp;&nbsp;동의하지 않습니다.</label>
						</div>
					</div>

				</div>
			</div>
			
			<?php if($member['mb_id'] =='') {
$url = '/page/report.php';

// url 체크
check_url_host($url);

// 이미 로그인 중이라면
// if ($is_member) {
//     if ($url)
//         goto_url($url);
//     else
//         goto_url($url);
// }

$login_url        = login_url($url);
$login_action_url = G5_HTTPS_BBS_URL."/login_check.php";

// 로그인 스킨이 없는 경우 관리자 페이지 접속이 안되는 것을 막기 위하여 기본 스킨으로 대체
$login_file = $member_skin_path.'/login.skin.php';
if (!file_exists($login_file))
    $member_skin_path   = G5_SKIN_PATH.'/member/basic';

include_once($member_skin_path.'/login.skin.php');
 } else { ?>
			<h3>신고하기</h3>
			<form name="fwrite" id="fwrite" action="<?php echo G5_URL; ?>/page/report_update.php" onsubmit="return fwrite_submit(this);" method="post" enctype="multipart/form-data" autocomplete="off">	
			<table class="tb">
				<colgroup>
					<col width="160px"/>
					<col width="890px"/>
				</colgroup>
				<tbody>
					<tr>
						<th>신고인 이름</th>
						<td><input type="text" id="rp_name" name="rp_name" class="inpt" maxlength="50" required value="<?=$member[mb_name]?>" readonly></td>
					</tr>
					<tr>
						<th>연락처</th>
						<td><input type="text" id="rp_hp" name="rp_hp" class="inpt" maxlength="20" required value="<?=$member[mb_hp]?>" readonly></td>
					</tr>
					<tr>
						<th>이메일</th>
						<td><input type="text" id="rp_email" name="rp_email" class="inpt" maxlength="30" required value="<?=$member[mb_email]?>" readonly></td>
					</tr>
					<tr>
						<th>신고항목</th>
						<td class="chk_grp">
							<label><input type="radio" name="rp_category" value="승부조작">승부조작</label>
							<label><input type="radio" name="rp_category" value="스포츠도박">도박</label>
							<label><input type="radio" name="rp_category" value="(성)폭력">(성)폭력</label>
							<label><input type="radio" name="rp_category" value="기타(도핑 외)">기타(도핑 외)</label>
						</td>
					</tr>
					<tr>
						<th>신고제목</th>
						<td><input type="text" id="rp_subject" name="rp_subject" class="inpt" maxlength="255" required></td>
					</tr>
					<tr>
						<th>신고내용</th>
						<td><textarea id="rp_content" name="rp_content" class="inpt txta"></textarea></td>
					</tr>
					<tr>
						<th>파일첨부</th>
						<td>
							<div class="filebox">
								<input class="upload-name bf_file1" value="파일선택" disabled="disabled">
								<label for="bf_file1">파일첨부</label>
								<input type="file" id="bf_file1" name="bf_file[1]" class="upload-hidden">
								<input class="upload-name bf_file2" value="파일선택" disabled="disabled">
								<label for="bf_file2">파일첨부</label>
								<input type="file" id="bf_file2" name="bf_file[2]" class="upload-hidden">
							</div>
						</td>
					</tr>
				</tbody>
			</table>
			<div class="btn_wrap">
				<button type="submit" id="btn_submit" class="btntype1">등록하기</button>
				<button type="button" class="btntype2">취소하기</button>
			</div>
			</form>
		<?php  } ?>
		</div>
		<script>
	    function fwrite_submit(f)
	    {
				var hp = f.rp_hp.value.replace(/[0-9\-]/g, "");
        if(hp.length > 0) {
					alert("휴대폰번호는 숫자, - 으로만 입력해 주십시오.");
					return false;
        }
				var cate = $('input[name=rp_category]:checked').val();
				if(!cate) {
					alert("신고항목을 선택해 주십시오.");
					return false;
				}

				if (!$.trim($("textarea[name=rp_content]").val())) {
					alert("신고내용을 입력해 주십시오.");
					return false;
				}

				var agree = $('input[name=agree]:checked').val();
				if(agree != 'Y') {
					alert('동의하셔야 신고 가능합니다.');
					$('input[name=agree]').focus();
					return false;
				}

				document.getElementById("btn_submit").disabled = "disabled";

        return true;
			}
			$(document).ready(function(){ 
				var fileTarget = $('.filebox .upload-hidden'); 
				fileTarget.on('change', function(){ // 값이 변경되면 				
					if(window.FileReader){ // modern browser 					
						var filename = $(this)[0].files[0].name; 
					} else { // old IE 
						var filename = $(this).val().split('/').pop().split('\\').pop(); // 파일명만 추출 
					} 
					var id = $(this).attr('id');
					// 추출한 파일명 삽입 
					$(this).siblings('.'+id).val(filename); 
				}); 
			}); 
		function pdf(arg) {
				window.open("./report_download.php?ele="+arg);
			}
		</script>
<?php
include_once(G5_THEME_PATH.'/tail.php');
?>
