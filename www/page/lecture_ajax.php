<?php
	include_once('./_common.php');

	if ($w == 'ps') 
	{
		$idx = (int) $_POST['idx'];
		if (!$idx) exit();

		$date = date('Y-m-d H:i:s');
		$mb_id = trim($_POST['mb_id']);
		$mb = get_member($mb_id);
		$d_typ = $_POST['d_typ'] == 'pc' ? 'pc' : 'mobile';

		$lt = sql_fetch("SELECT * FROM cbc_lecture WHERE idx = '{$idx}'");
		if(!$lt['idx']) exit();

		$idxSQL = sql_fetch("SELECT max(lv_no) as lv_no FROM cbc_lecture_view WHERE mb_id='{$mb['mb_id']}' and lt_id='{$idx}' group by lt_id");
		$lv_no = $idxSQL['lv_no'];
		$etimeSQL = sql_fetch("SELECT lv_etime FROM cbc_lecture_view WHERE lv_no='{$lv_no}'");
		$lv_etime = $etimeSQL['lv_etime'];

		$etime = date('Y-m-d H:i:s', strtotime($lv_etime));

		$now = new DateTime();  // 현재일시
		$before = new DateTime($lv_etime);
		$diff = $now->getTimestamp() - $before->getTimestamp();

		// echo $diff;

		if($lv_etime != '' && $diff < 1){
			echo "playing";
		} else {

			$sql="INSERT INTO cbc_lecture_view SET mb_id = '{$mb['mb_id']}', 
												lt_id = '$idx', 
												lt_subject = '{$lt['lt_subject']}',
												lv_stime = '$date',
												lv_ip = '{$_SERVER['REMOTE_ADDR']}', 
												lv_status = 'start',
												lv_device = '$d_typ' ";

			sql_query($sql);

			echo $date;
		}

		
	}
	else if ($w == 'pe')
	{
		$idx = (int) $_POST['idx'];
		if (!$idx) exit();

		$mb_id = trim($_POST['mb_id']);
		$mb = get_member($mb_id);

		$stime = date('Y-m-d H:i:s', strtotime($_POST['stime']));		
		$etime = date('Y-m-d H:i:s');
		$ctime = (float) $_POST['ctime'];
		$d_typ = $_POST['d_typ'] == 'pc' ? 'pc' : 'mobile';
	
		$lt = sql_fetch("SELECT * FROM cbc_lecture WHERE idx = '{$idx}'");
		if(!$lt['idx']) exit();

		$idxSQL = sql_fetch("SELECT max(lv_no) as lv_no FROM cbc_lecture_view WHERE mb_id='{$mb['mb_id']}' and lt_id='{$idx}' group by lt_id");
		$lv_no = $idxSQL['lv_no'];

		$sql = "UPDATE cbc_lecture_view SET lv_etime = '$etime', lv_status='end' WHERE lv_no = '$lv_no'";
		sql_query($sql);

		echo 'success';
	}
	else if($w == 'pp') {
		$idx = (int) $_POST['idx'];
		if (!$idx) exit();

		$mb_id = trim($_POST['mb_id']);
		$mb = get_member($mb_id);

		$stime = date('Y-m-d H:i:s', strtotime($_POST['stime']));
		$etime = date('Y-m-d H:i:s');
		$ctime = (float) $_POST['ctime'];
		$d_typ = $_POST['d_typ'] == 'pc' ? 'pc' : 'mobile';
	
		$lt = sql_fetch("SELECT * FROM cbc_lecture WHERE idx = '{$idx}'");
		if(!$lt['idx']) exit();

		$idxSQL = sql_fetch("SELECT max(lv_no) as lv_no FROM cbc_lecture_view WHERE mb_id='{$mb['mb_id']}' and lt_id='{$idx}' group by lt_id");
		$lv_no = $idxSQL['lv_no'];

		$sql = "UPDATE cbc_lecture_view SET lv_etime = '$etime', lv_status='pause' WHERE lv_no = '$lv_no'";
		sql_query($sql);

		echo 'paused';
	}
	else if($w == 'iv') {

		$idx = (int) $_POST['idx'];
		if (!$idx) exit();

		$mb_id = trim($_POST['mb_id']);
		$mb = get_member($mb_id);

		// $stime = date('Y-m-d H:i:s', strtotime($_POST['stime']));
		$etime = date('Y-m-d H:i:s');

		$idxSQL = sql_fetch("SELECT max(lv_no) as lv_no FROM cbc_lecture_view WHERE mb_id='{$mb['mb_id']}' and lt_id='{$idx}' group by lt_id");
		$lv_no = $idxSQL['lv_no'];

		$sql = "UPDATE cbc_lecture_view SET lv_etime = '$etime', lv_status='starting' WHERE lv_no = '$lv_no'";
		sql_query($sql);

		$totalTime = sql_fetch("SELECT sum(UNIX_TIMESTAMP(lv_etime)- UNIX_TIMESTAMP(lv_stime)) as tt  FROM cbc_lecture_view where mb_id='{$mb['mb_id']}' and lt_id='{$idx}' and lv_etime>lv_stime and lv_etime is not null and lv_stime is not null");
		$time = $totalTime['tt'];
		$m = floor($time/60);
		$s = ($time%60);
		$timeObject = (object) [
			"time"	=> ($m<10?"0".$m:$m).":".($s<10?"0".$s:$s)
		];
		echo json_encode($timeObject);
	}
	else
		exit();
?>