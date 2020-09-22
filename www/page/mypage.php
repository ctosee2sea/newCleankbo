<?php
	include_once('./_common.php');
if($member['mb_id'] == ""){
	echo "<script>alert('로그인이 필요한 서비스입니다.');location.replace('/bbs/login.php')</script>";
	exit;
}

	if (!in_array($sca, array(1, 2))) $sca = 1;

// $sql = "SELECT *, MAX( TIME_TO_SEC(TIMEDIFF( a.lv_etime, a.lv_stime))) AS duration FROM cbc_lecture_view a JOIN cbc_lecture b ON b.idx = a.lt_id WHERE a.mb_id = '".$member['mb_id']."'  AND b.is_display = 'y' GROUP BY a.lt_id ORDER BY b.idx DESC"; 
// $result = sql_query($sql);

	$g5['title'] = '마이페이지';
	$gnb_css = 'mypage';
	include_once(G5_THEME_PATH.'/head.php');
	$img_url = G5_IMG_URL.'/pc';

	// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
?>
	<style>
		#mypage {width:1050px;margin:0 auto;}
		#mypage h1{text-align:center;margin-top:60px;margin-bottom:50px;font-size:30px;}
		
		#content {width:1050px;margin: 0 auto;padding-bottom:70px;background-color:#f3f3f3;}
		#content .title {background-color:#00489d;width:740px;height:124px;line-height:124px;margin:72px 0 0 155px;display:inline-block;}
		#content .title .left{font-size:24px;font-weight:bold;color:#ffffff;margin-left:44px;line-height:52px;}
		#content .item .left{font-size:14px;font-weight:bold;color:#222529;margin-left:44px;line-height:52px;width:300px;overflow: hidden;}
		#content .title .right{font-size:15px;color:#a3b3d2;margin-right:22px;cursor:pointer;line-height:52px;}
		#content .item .right{font-size:15px;color:#999;margin-right:44px;line-height:52px;}
		#content .item .right b {color:#333;}
		#content .item .right .date{font-size:12px;color:#00489d;margin-right:24px;height:30px;line-height:30px;display:inline-block;}
		#content .item .right .btn_on{margin-left:5px;font-size:14px;color:#fff;background-color:#00489d;width:50px;height:30px;line-height:30px;display:inline-block;text-align:center;}
		#content .item .right .btn_off{margin-left:5px;font-size:14px;color:#fff;background-color:#e4e4e4;width:50px;height:30px;line-height:30px;display:inline-block;text-align:center;}

		#content .chapter{margin:63px 0 20px 155px;font-size:16px;color:#AAAAAA;}
		#content .item{margin:0 5px 0 155px;width:738px;height:52px;border:1px solid #e4e4e4;position:relative;background-color:#FFF;display:inline-block;line-height:52px;}
		button.play {background: #00489d;color:white;border:none;padding:5px 7px;margin-right: 5px;}
		.floatL{float:left;}
		.floatR{float:right;}

		.p_date{
			position: absolute;
		    top: 35%;
			right: 100px;
		}
		.p_btn{
			top: 35%;
  			position: absolute;
			right: 45px;
		}
		#calendar {
			maargin:30px auto;
		}
	</style>
		<div id="mypage">
			<h1><?=$g5['title']?></h1>
		</div>
	 <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo G5_CSS_URL?>/theme1.css?v=20200516"/>
  </head>
  <body>
   		

		<div id="content">
			<div class="title">
			<div class="floatL left"><?=$member['mb_id'];?>님 환영합니다.</div><div class="floatR right" onclick="logout()">로그아웃</div><div class="floatR right" onclick="go_modify()">정보수정</div>
			</div>
			<div id="caleandar"></div>
			<div class="chapter" style="width:708px;padding:15px;">
				<h4>인터넷 강의 내역</h4>
			</div>
				<div class="announce" style="width:708px;padding:30px 15px;background:#444;color:#fff;margin:0 auto;">
			<p style="padding:15px 0 0;"><클린베이스볼 온라인 교육 관련 안내></p>
<p style="padding:5px 0;line-height:1.5;word-break: break-word;">일부 PC 또는 모바일에서 교육을 완료했음에도 불구하고 ‘마이페이지’에서 ‘미이수’로 표시되는 경우가 있습니다. cleankbo@koreabaseball.or.kr로 [아이디/성명/미이수된 수강명]을 보내주시면 수강여부를 확인하여 이메일로 회신해 드리도록 하겠습니다. 다만, 영상을 처음부터 끝까지 정상적인 시간으로 수강하지 않으실 경우 이수처리가 되지 않을 수 있으니 유의하시기 바랍니다.</p>
</div>
<?php
$cbclist = "select * from cbc_lecture where is_display = 'y' order by idx DESC";
$list = sql_query($cbclist);
		// $sql = "SELECT *, MAX( TIME_TO_SEC(TIMEDIFF( a.lv_etime, a.lv_stime))) AS duration FROM cbc_lecture_view a JOIN cbc_lecture b ON b.idx = a.lt_id WHERE a.mb_id = '".$member['mb_id']."'  AND b.is_display = 'y' GROUP BY a.lt_id ORDER BY b.idx DESC"; 
	// $result = sql_query($sql);
	foreach($list as $tmp){
					$time = $tmp['lt_playtime'];
					$seconds = 0;
					$parts   = explode(':', $time);
					$seconds += $parts[0] * 60;
					$seconds += $parts[1];
					$tmp['lt_playtime'] = $seconds;
					// echo $seconds;
					// $sql = "SELECT TIME_TO_SEC(TIMEDIFF( lv_etime, lv_stime)) AS duration, lv_status FROM cbc_lecture_view WHERE lv_etime>lv_stime and mb_id = '".$member['mb_id']."' AND lt_id='".$tmp['idx']."'";
					$sql = "SELECT sum(UNIX_TIMESTAMP(lv_etime)- UNIX_TIMESTAMP(lv_stime)) as tt  FROM cbc_lecture_view where mb_id='{$member['mb_id']}' and lt_id='{$tmp['idx']}' and lv_etime>lv_stime and lv_etime is not null and lv_stime is not null";
					// print_r($sql);

					// $vod_list = sql_query($sql);
					// $total_duration = 0;
					// $status = '';
					// foreach ($vod_list as $vod) {
					// 	$total_duration = $total_duration + $vod['duration'];
					// 	$status = $vod['lv_status'];
					// }

					$result=sql_fetch($sql);
					// if($result['duration'] == null) { $result['duration'] = 0;}
			?>
			<script>
				
				function view_lecture(idx){
					window.open('<?php echo G5_URL; ?>/page/lecture_detail.php?idx='+idx, "win_lecture_detail", "left=50, top=50, width=1080, height=570, scrollbars=1");
				}
			</script>
			<div class="item">
				<div class="floatL left"><button class="play" onClick="view_lecture(<?=$tmp['idx']?>);">▶</button> <?=$tmp['lt_subject']?></div>
				<div class="floatR right">

					<?
						$min = floor($result['tt'] / 60);
						$sec = $result['tt'] - (floor($result['tt'] / 60) * 60);
						$min2 = floor($tmp['lt_playtime'] / 60);
						$sec2 = $tmp['lt_playtime'] - (floor($tmp['lt_playtime'] / 60) * 60);
					?>
					시청시간 : <b><?=($min<10?"0":"").$min?>:<?=($sec<10?"0":"").$sec?></b> /
					영상길이 : <b><?=($min2<10?"0":"").$min2?>:<?=($sec2<10?"0":"").$sec2?></b>
<?php 
// echo $tmp['lt_playtime'];
//echo("영상길이 ".floor($tmp['lt_playtime'] / 60)."분 ".$sec."초 / 시청시간 ".floor($result['tt'] / 60)."분 ".$sec2."초 ");
	// if($total_duration >= $tmp['lt_playtime'] && $status == 'end'){
	if($result['tt'] >= $tmp['lt_playtime']){
	?>
					<!-- <div class="date floatL p_date"><?=substr($tmp['etime'],0,10);?> (sec:<?=$realtime?>)</div> -->
					<div class= "btn_on">이수</div>
					<?php }else{?>
					<div class= "btn_off">미이수</div>
					<?php }  ?>
				</div>
			</div>
<?php
		} ?>
		<?php 
$covid_query= "SELECT date from covid where mid='$member[mb_id]'";
$covid_result = sql_query($covid_query);
?>
<script>
	var events=[];
	<?php 
while($crow=sql_fetch_array($covid_result)){
	$cdate=date('Y,n-1,d',strtotime($crow['date']));
?>
	events.push({'Date':new Date(<?php print_r($cdate)?>),'Title':'제출완료','link':'#'});

<?php } ?>
</script>



	    <script type="text/javascript" src="<?php echo G5_JS_URL?>/caleandar.js"></script>
		<script type="text/javascript">
			function go_modify(){
				location.href="/bbs/member_confirm.php?url=register_form.php";
			}
	function logout(){
				location.href="/bbs/logout.php";
				$currentDate = date('Y-m-d');
			}
var settings = {};
var element = document.getElementById('caleandar');
caleandar(element, events, settings);
</script>
<?php
include_once(G5_THEME_PATH.'/tail.php');
?>
