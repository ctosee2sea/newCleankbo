<?php
include_once('./_common.php');
include_once($_SERVER["DOCUMENT_ROOT"].'/udz/smsclass.php');

	$datetime= date("Y-m-d H:i:s");
	$today = date("Y-m-d");
	$w = $_POST['w'];
	$mid = $_POST['mid'];
	$date = $_POST['date'];
	$mes =array();
	if ($w == 'wm') 
	{
		$sql = "SELECT * from `covid` where mid = '$mid' and date = '$date'";
		$row = sql_fetch($sql);
		if(!$row === false) {
		echo json_encode(array('data' => $row));
		} else {
			echo json_encode(array('data' => false));
		}
	}
	else if ($w == 'wr')
	{
		$val1 = $_POST['val1'];
		$val2 = $_POST['val2'];
		$val3 = $_POST['val3'];
		$val4 = $_POST['val4'];
		$val5 = $_POST['val5'];
		$trigger = $_POST['trigger'];

		if($today == $date) {
		if($val2 == '0' || $val3 =='0' || $val1 !='9'){
			$valexp = explode(",", $val1);
			for($i=0;$i<count($valexp);$i++){
				if($valexp[$i]=='0') {
					$mes[] = "발열";
				} else if($valexp[$i]=='1') {
					$mes[] = "기침";
				} else if($valexp[$i]=='2') {
					$mes[] = "인후통";
				} else if($valexp[$i]=='3') {
					$mes[] = "권태감";
				} else if($valexp[$i]=='4') {
					$mes[] = "가래";
				} else if($valexp[$i]=='5') {
					$mes[] = "호홉곤란 및 폐렴";
				} else if($valexp[$i]=='6') {
					$mes[] = "두통";
				} else if($valexp[$i]=='7') {
					$mes[] = "객혈, 오심";
				} else if($valexp[$i]=='8') {
					$mes[] = "설사";
				}
			}  
			if($val2 =='0'){
				$mes[] = "대면접촉";
			}
			if($val3 =='0') {
				$mes[] = "확진자 동선 방문";
			}
			$message = join(", ",$mes);
			sendAlert($mid, $message);

}}
		if($_POST['sms']){
			$gpdrQuery1 = "UPDATE `kboclean`.`g5_member` SET `mb_5` = 'y' WHERE `g5_member`.`mb_id` ='$mid'";
			sql_query($gpdrQuery1);
		}
		if($_POST['gpdr']){
		$gpdrQuery2 = "UPDATE `kboclean`.`g5_member` SET `mb_4` = 'y' WHERE `g5_member`.`mb_id` ='$mid'";
		sql_query($gpdrQuery2);
		}

		$sql = "INSERT INTO `covid` SET mid = '$mid', date = '$date', val1='$val1',val2 = '$val2', val3 = '$val3', val4 = '$val4', val5 = '$val5', time='$datetime'";
		sql_query($sql);
		echo json_encode(array('success' => 1));
	}
	else if ($w == 'wu') {
		$idx = $_POST['idx'];
		$val1 = $_POST['val1'];
		$val2 = $_POST['val2'];
		$val3 = $_POST['val3'];
		$val4 = $_POST['val4'];
		$val5 = $_POST['val5'];
		$trigger = $_POST['trigger'];
		$gpdr = $_POST['gpdr'];
		$sms = $_POST['sms'];
				if($today == $date) {
		if($val2 == '0' || $val3 =='0' || $val1 !='9'){
			$valexp = explode(",", $val1);
			for($i=0;$i<count($valexp);$i++){
					if($valexp[$i]=='0') {
					$mes[] = "발열";
				} else if($valexp[$i]=='1') {
					$mes[] = "기침";
				} else if($valexp[$i]=='2') {
					$mes[] = "인후통";
				} else if($valexp[$i]=='3') {
					$mes[] = "권태감";
				} else if($valexp[$i]=='4') {
					$mes[] = "가래";
				} else if($valexp[$i]=='5') {
					$mes[] = "호홉곤란 및 폐렴";
				} else if($valexp[$i]=='6') {
					$mes[] = "두통";
				} else if($valexp[$i]=='7') {
					$mes[] = "객혈, 오심";
				} else if($valexp[$i]=='8') {
					$mes[] = "설사";
				}
			}  
			if($val2 =='0'){
				$mes[] = "대면접촉";
			}
			if($val3 =='0') {
				$mes[] = "확진자 동선 방문";
			}
			$message = join(", ",$mes);
			sendAlert($mid, $message);
		
	}}
		if($_POST['sms']){
			$gpdrQuery1 = "UPDATE `kboclean`.`g5_member` SET `mb_5` = 'y' WHERE `g5_member`.`mb_id` ='$mid'";
			sql_query($gpdrQuery1);
		}
		if($_POST['gpdr']){
		$gpdrQuery2 = "UPDATE `kboclean`.`g5_member` SET `mb_4` = 'y' WHERE `g5_member`.`mb_id` ='$mid'";
		sql_query($gpdrQuery2);
		}
		$sql = "UPDATE `covid` SET mid = '$mid', date = '$date', val1='$val1',val2 = '$val2', val3 = '$val3', val4 = '$val4', val5 = '$val5', time='$datetime' WHERE `idx` =$idx";
		
		sql_query($sql);
		echo json_encode(array('success' => 1));
	}

function sendAlert($id, $message){
/*
 * 뿌리오 발송API 경로 - 서버측 인코딩과 응답형태에 따라 선택
 */
$_api_url = 'https://www.ppurio.com/api/send_utf8_json.php';     // UTF-8 인코딩과 JSON 응답용 호출 페이지
// $_api_url = 'https://www.ppurio.com/api/send_utf8_xml.php';   // UTF-8 인코딩과 XML 응답용 호출 페이지
// $_api_url = 'https://www.ppurio.com/api/send_utf8_text.php';  // UTF-8 인코딩과 TEXT 응답용 호출 페이지
// $_api_url = 'https://www.ppurio.com/api/send_euckr_json.php'; // EUC-KR 인코딩과 JSON 응답용 호출 페이지
// $_api_url = 'https://www.ppurio.com/api/send_euckr_xml.php';  // EUC-KR 인코딩과 XML 응답용 호출 페이지
// $_api_url = 'https://www.ppurio.com/api/send_euckr_text.php'; // EUC-KR 인코딩과 TEXT 응답용 호출 페이지

$sqlm = "SELECT * FROM `g5_member` WHERE mb_id = '$id'";

$result= sql_query($sqlm);
$i=0;
	while($row = sql_fetch_array($result)){
		$row['hp']= str_replace("-", "", $row['hp']);
	 // $hp = ['01031249078', '01046260622','01035700662', '01073342283'];
	 $hp = ['01031249078', '01046260622','01094739734','01035700662', '01091145528', '01073342283', '01031015526'];
	if($row['mb_2'] !=''){
   if($row['mb_2'] =="두산"){
    array_push($hp,'01028990170');
    }
  else if($row['mb_2'] =="키움"){
	  array_push($hp,'01040270717');
    }  
	else if($row['mb_2'] =="SK"){
	  array_push($hp,'01090294516');
    }	
  else if($row['mb_2'] =="LG"){
	  array_push($hp,'01062792174');
    }	
    else if($row['mb_2'] =="NC"){
	  array_push($hp,'01085314070');
    }	
    else if($row['mb_2'] =="KT"){
	  array_push($hp,'01082796166');
    } else if($row['mb_2'] =="KIA"){
	  array_push($hp,'01097702065');
    }	
    else if($row['mb_2'] =="삼성"){
	  array_push($hp,'01024273307');
    }    
    else if($row['mb_2'] =="한화"){
	  array_push($hp,'01096641010');
    }    
    else if($row['mb_2'] =="롯데"){
	  array_push($hp,'01036834793');
    } 
}
$row[hp]= str_replace(' ', '',$row[hp]);
array_push($hp,$row['hp']);
// print_r($hp[$i].",".$name[$i]."<br>");		
$mb1 = $row['mb_1'];
$mb2 = $row['mb_2'];
$mb_name = $row['mb_name'];
$i++;
}
$hp = join('|',$hp);
$_param['userid'] = 'xanthus'; // [필수] 뿌리오 아이디
$_param['callback'] = '0234604600';    // [필수] 발신번호 - 숫자만
$_param['phone'] = $hp;       // [필수] 수신번호 - 여러명일 경우 |로 구분 '010********|010********|010********'
$_param['msg'] = "[KBO] ".$mb2." ".$mb1." ".$mb_name."님이 ".$message."을 제출하셨습니다.";   // [필수] 문자내용 - 이름(names)값이 있다면 
$hp = explode("|",$hp);

array_map(function ($hp) use ($_param) {
	$sms = new SMS();
	$rr = $sms->setNumber($hp)->setMsg($_param['msg'])->send();
	// echo $rr;
	$ip = $_SERVER["REMOTE_ADDR"]; 
	$now = date("Y-m-d H:i:s");
	mysql_query("INSERT into smslog (`number`,`text`,regDate,ip,result) values ('{$hp}','{$_param['msg']}','{$now}','{$ip}','{$rr}')");

},$hp);

//  $_curl = curl_init();
//  curl_setopt($_curl,CURLOPT_URL,$_api_url);
//  curl_setopt($_curl,CURLOPT_POST,true);
//  curl_setopt($_curl,CURLOPT_SSL_VERIFYPEER,false);
//  curl_setopt($_curl,CURLOPT_RETURNTRANSFER,true);
//  curl_setopt($_curl,CURLOPT_POSTFIELDS,$_param);
//  $_result = curl_exec($_curl);
//  curl_close($_curl);

// $_result = json_decode($_result);


/*
 * 응답값
 *
 *  <성공시>
 *    result : 'ok'                           - 전송결과 성공
 *    type   : 'sms'                          - 단문은 sms 장문은 lms 포토문자는 mms
 *    msgid  : '123456789'                    - 발송 msgid (예약취소시 필요)
 *    ok_cnt : 1                              - 발송건수
 *
 *  <실패시>
 *    result : 'invalid_member'               - 연동서비스 신청이 안 됐거나 없는 아이디
 *    result : 'under_maintenance'            - 요청시간에 서버점검중인 경우
 *    result : 'allow_https_only'             - http 요청인 경우
 *    result : 'invalid_ip'                   - 등록된 접속가능 IP가 아닌 경우
 *    result : 'invalid_msg'                  - 문자내용에 오류가 있는 경우
 *    result : 'invalid_names'                - 이름에 오류가 있는 경우
 *    result : 'invalid_subject'              - 제목에 오류가 있는 경우
 *    result : 'invalid_sendtime'             - 예약발송 시간에 오류가 있는 경우 (10분이후부터 다음해말까지 가능)
 *    result : 'invalid_sendtime_maintenance' - 예약발송 시간에 서버점검 예정인 경우
 *    result : 'invalid_phone'                - 수신번호에 오류가 있는 경우
 *    result : 'invalid_msg_over_max'         - 문자내용이 너무 긴 경우
 *    result : 'invalid_callback'             - 발신번호에 오류가 있는 경우
 *    result : 'once_limit_over'              - 1회 최대 발송건수 초과한 경우
 *    result : 'daily_limit_over'             - 1일 최대 발송건수 초과한 경우
 *    result : 'not_enough_point'             - 잔액이 부족한 경우
 *    result : 'over_use_limit'               - 한달 사용금액을 초과한 경우
 *    result : 'server_error'                 - 기타 서버 오류
 */

// print_r($_result);


}


		exit();
?>