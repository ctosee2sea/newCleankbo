<?
// session_start();

include_once('../common.php');
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script src="http://cleankbo.com/js/jquery-1.8.3.min.js"></script>
<?php
	header('Content-Type: text/html; charset=utf-8');
    //**************************************************************************
	// 파일명 : phone_popup4.php
	// - 바닥페이지
	// 휴대폰 본인확인 서비스 결과 완료 화면
	//**************************************************************************

	// print_r($_REQUEST);
	$CP_CD				= $_REQUEST["CP_CD"];			// 회원사코드
	$TX_SEQ_NO			= $_REQUEST["TX_SEQ_NO"];		// 거래번호
	$RSLT_CD			= $_REQUEST["RSLT_CD"];		// 결과코드
	$RSLT_MSG			= $_REQUEST["RSLT_MSG"];		// 결과메세지
	
	$RSLT_NAME			= $_REQUEST["RSLT_NAME"];		// 성명
	$RSLT_BIRTHDAY		= $_REQUEST["RSLT_BIRTHDAY"];	// 생년월일
	$RSLT_SEX_CD		= $_REQUEST["RSLT_SEX_CD"];	// 성별
	$RSLT_NTV_FRNR_CD	= $_REQUEST["RSLT_NTV_FRNR_CD"];// 내외국인구분
	
	$DI					= $_REQUEST["DI"];				// DI
	$CI					= $_REQUEST["CI"];				// CI
	$CI_UPDATE			= $_REQUEST["CI_UPDATE"];		// CI 업데이트
	$TEL_COM_CD			= $_REQUEST["TEL_COM_CD"];		// 통신사코드
	$TEL_NO				= $_REQUEST["TEL_NO"];			// 휴대폰번호
	
	$RETURN_MSG			= $_REQUEST["RETURN_MSG"];		// 리턴메시지
	$cert_type = 'hp';

	$mb_name = $RSLT_NAME;
	$req_num = $TEL_NO;
	$mb_birth = $RSLT_BIRTHDAY;
	$mb_dupinfo = $DI;
	$phone_no = hyphen_hp_number($req_num);




// 중복정보 체크
$sql = " select mb_id from {$g5['member_table']} where mb_id <> '{$member['mb_id']}' and mb_dupinfo = '{$mb_dupinfo}' ";
$row = sql_fetch($sql);
// echo $mb_dupinfo;
	// echo $row['mb_dupinfo'];
if ($row['mb_id']) {
    // echo $sql;
    // exit();
	// exit();
    alert_close("입력하신 본인확인 정보로 가입된 내역이 존재합니다.\\n회원아이디 : ".$row['mb_id']);
}
// exit();

// hash 데이터
$cert_type = 'hp';
$md5_cert_no = md5($req_num);

// echo $md5_cert_no."<br>";
// echo "hashkey:".$mb_name.$cert_type.$mb_birth.$md5_cert_no."<br>";
$hash_data   = md5($cert_type.$mb_birth.$md5_cert_no);
// echo $hash_data."<br>";
// 성인인증결과
$adult_day = date("Ymd", strtotime("-19 years", G5_SERVER_TIME));
$adult = ((int)$mb_birth <= (int)$adult_day) ? 1 : 0;

        // print_r ($_SESSION);



// ini_set("display_errors",1);
set_session('ss_cert_type',   $cert_type);
set_session('ss_cert_no',$md5_cert_no);
        // echo $md5_cert_no;
set_session('ss_cert_hash',   $hash_data);
set_session('ss_cert_adult',  $adult);
set_session('ss_cert_birth',  $mb_birth);
set_session('ss_cert_sex',    $RSLT_SEX_C);
set_session('ss_cert_dupinfo',$mb_dupinfo);

// echo $_SESSION['ss_cert_dupinfo'];

$g5['title'] = 'KCB 휴대폰 본인확인';
// include_once(G5_PATH.'/head.sub.php');
        // print_r ($_SESSION);

?>

<script>
$(function() {
    var $opener = window.opener;

    $opener.$("input[name=cert_type]").val("<?php echo $cert_type; ?>");
    // $opener.$("input[name=mb_name]").val("<?php echo $mb_name; ?>").attr("readonly", false);
    $opener.$("input[name=mb_hp]").val("<?php echo $phone_no; ?>").attr("readonly", true);
    $opener.$("input[name=cert_no]").val("<?php echo $md5_cert_no; ?>");

    // alert("본인의 휴대폰번호로 확인 되었습니다.");
    window.close();
});
</script>

<?php
// include_once(G5_PATH.'/tail.sub.php');
?>
  <li>휴대폰번호	: <?=$TEL_NO?> </li>
<?
exit;
?>
<title>KCB 휴대폰 본인확인 서비스 샘플 4</title>
</head>
<body>
<h3>인증결과</h3>
<ul>
  <li>회원사코드	: <?=$CP_CD?> </li>
  <li>거래번호		: <?=$TX_SEQ_NO?> </li>
  <li>결과코드		: <?=$RSLT_CD?></li>
  <li>결과메세지	: <?=$RSLT_MSG?></li>
 
  <li>성명			: <?=$RSLT_NAME?> </li>
  <li>생년월일		: <?=$RSLT_BIRTHDAY?> </li>
  <li>성별			: <?=$RSLT_SEX_CD?> </li>
  <li>내외국인구분	: <?=$RSLT_NTV_FRNR_CD?> </li>
  
  <li>DI			: <?=$DI?> </li>
  <li>CI			: <?=$CI?> </li>
  <li>CI업데이트	: <?=$CI_UPDATE?> </li>
  <li>통신사코드	: <?=$TEL_COM_CD?> </li>
  <li>휴대폰번호	: <?=$TEL_NO?> </li>
  
  <li>리턴메시지	: <?=$RETURN_MSG?> </li>

</ul>

<br/>
* 성별 - M:남, F:여
<br/>
* 내외국인구분 - L:내국인, F:외국인
<br/>
* 통신사 - 01:SKT, 02:KT, 03:LGU+, 04:SKT알뜰폰, 05:KT알뜰폰, 06:LGU+알뜰폰
</body>
</html>
