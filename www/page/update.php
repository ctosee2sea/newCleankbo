<?php
	include_once('./_common.php');
	
	$w = $_POST['w'];
	$mid = $_POST['mid'];
	$date = $_POST['date'];
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
		$gpdr = $_POST['gpdr'];
		$sms = $_POST['sms'];
		$gpdrQuery = "UPDATE `kboclean`.`g5_member` SET mb_4 = 'y', mb_5 = 'y' WHERE `g5_member`.`mb_id` ='$mid'";
		$sql = "INSERT INTO `covid` SET mid = '$mid', date = '$date', val1='$val1',val2 = '$val2', val3 = '$val3', val4 = '$val4', val5 = '$val5'";
		sql_query($sql);
		sql_query($gpdrQuery);
		echo json_encode(array('success' => 1));
	}
	else if ($w == 'wu') {
		$idx = $_POST['idx'];
		$val1 = $_POST['val1'];
		$val2 = $_POST['val2'];
		$val3 = $_POST['val3'];
		$val4 = $_POST['val4'];
		$val5 = $_POST['val5'];
		$gpdr = $_POST['gpdr'];
		$sql = "UPDATE `covid` SET mid = '$mid', date = '$date', val1='$val1',val2 = '$val2', val3 = '$val3', val4 = '$val4', val5 = '$val5' WHERE `idx` =$idx";
		sql_query($sql);
		echo json_encode(array('success' => 1));
	}
		exit();
?>