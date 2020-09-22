<?php
	include_once('./_common.php');
		// $member['mb_id']='qordydghks1';
if($member['mb_id'] == ""){
	echo "<script>alert('로그인이 필요한 서비스입니다.');location.replace('/bbs/login.php')</script>";
	exit;
}
	if (!in_array($sca, array(1, 2))) $sca = 1;

	// $sql = "SELECT * FROM cbc_lecture WHERE is_display = 'Y' ORDER BY idx DESC";

	// $sql = "SELECT *, (select lv_etime 
	// 	from kboclean.cbc_lecture_view b 
	// 	where a.idx = b.lt_id 
	// 	and b.mb_id='".$member['mb_id']."' and b.lv_etime != '0000-00-00 00:00:00'
	// 	limit 1
	// ) as etime, (
	// 	select lv_stime 
	// 	from kboclean.cbc_lecture_view b 
	// 	where a.idx = b.lt_id 
	// 	and b.mb_id='".$member['mb_id']."'
	// 	limit 1 
	// ) as stime,(
	// 	select lv_ctime 
	// 	from kboclean.cbc_lecture_view b 
	// 	where a.idx = b.lt_id 
	// 	and b.mb_id='".$member['mb_id']."'
	// 	limit 1
	// ) as ctime FROM kboclean.cbc_lecture a where is_display = 'y' order by idx desc";

// 	$sql = "
	// SELECT *,(
	// 	select MAX(lv_ctime) 
	// 	from kboclean.cbc_lecture_view b 
	// 	where a.idx = b.lt_id 
	// 	and b.mb_id='".$member['mb_id']."'
	// 	limit 1
	// ) as ctime FROM kboclean.cbc_lecture a where is_display = 'y' order by idx desc
// ";

	$g5['title'] = '마이페이지';
	$gnb_css = 'mypage';
	include_once(G5_THEME_PATH.'/head.php');
	$img_url = G5_IMG_URL.'/pc';

	// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
?>

 <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo G5_CSS_URL?>/theme1.css?v=20200516"/>
	<style>
		#mypage {width:100vw;margin:0 auto;}
		#mypage h1{text-align:center;margin-top:60px;margin-bottom:50px;font-size:30px;}
		
		#content {width:100vw;margin: 0 auto;padding-bottom:70px;background-color:#f3f3f3;}
		#content .title {background-color:#00489d;width:100%;height:50px;padding:50px 0;margin:0 auto;display:block;}
		#content .title .left{font-size:24px;font-weight:bold;color:#ffffff;margin-left:5vw;line-height:1.2;}
		#content .item .left{font-size:14px;font-weight:bold;color:#222529;margin-left:5vw;line-height:1.2;}
		#content .title .right{font-size:15px;color:#a3b3d2;margin-right:22px;cursor:pointer;line-height:1.2;}
		#content .item .right{font-size:15px;color:#a3b3d2;margin-right:5vw;line-height:1.2;}
		#content .item .right .date{font-size:12px;color:#00489d;margin-right:24px;height:30px;line-height:1.2;display:inline-block;}
		#content .item .right .btn_on{font-size:14px;color:#fff;background-color:#00489d;width:50px;height:30px;line-height:1.2;display:inline-block;text-align:center;}
		#content .item .right .btn_off{font-size:14px;color:#fff;background-color:#e4e4e4;width:50px;height:30px;line-height:1.2;display:inline-block;text-align:center;}

		#content .chapter{margin:30px auto;font-size:16px;color:#AAAAAA;width:100%;}
		#content .item{margin:0 auto;width:100%;height:30px;padding:30px 0;border:1px solid #e4e4e4;position:relative;background-color:#FFF;display:block;line-height:1.2;}
		button.play {background: #00489d;color:white;border:none;padding:5px 7px;margin-right: 5px;}
		.floatL{float:left;}
		/*.floatR{float:right;}*/
		.floatR{float:left;margin:0px 0px 0px 55px;}
		.item::after {
			clear:both;
			content:'';
			visibility: hidden;
		}
		.p_date{
			position: absolute;
		    top: 35%;
			right: 100px;
		}
		.cld-main {
			width:100%;
		}
	</style>
		<div id="mypage">
			<h1><?=$g5['title']?></h1>
		</div>
		<div id="content">
			<div class="title">
			<div class="floatL left"><?=$member['mb_id'];?>님 환영합니다.</div><div class="floatR right" onclick="logout()">로그아웃</div><div class="floatR right" onclick="go_modify()">정보수정</div>
			</div>
				<div id="caleandar"></div>
				<div id="caleandar"></div>
			<div class="chapter">
				<h4>인터넷 강의 내역</h4>
				</div>
				<div class="announce" style="width:80%;padding:30px 15px;background:#444;color:#fff;margin:0 auto;">
			<p style="padding:10px 0 0;"><클린베이스볼 온라인 교육 관련 안내></p>
<p style="padding:10px;line-height:1.5;word-break: break-word;">일부 PC 또는 모바일에서 교육을 완료했음에도 불구하고 ‘마이페이지’에서 ‘미이수’로 표시되는 경우가 있습니다. genesis1014@koreabaseball.or.kr로 [아이디/성명/미이수된 수강명]을 보내주시면 수강여부를 확인하여 이메일로 회신해 드리도록 하겠습니다. 다만, 영상을 처음부터 끝까지 정상적인 시간으로 수강하지 않으실 경우 이수처리가 되지 않을 수 있으니 유의하시기 바랍니다.</p>
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
					// $sql = "SELECT MAX( TIME_TO_SEC(TIMEDIFF( lv_etime, lv_stime))) AS duration FROM cbc_lecture_view WHERE mb_id = '".$member['mb_id']."' AND lt_id='".$tmp['idx']."' GROUP BY lt_id"; 
					$sql = "SELECT sum(UNIX_TIMESTAMP(lv_etime)- UNIX_TIMESTAMP(lv_stime)) as tt  FROM cbc_lecture_view where mb_id='{$member['mb_id']}' and lt_id='{$tmp['idx']}' and lv_etime>lv_stime and lv_etime is not null and lv_stime is not null";
					// print_r($sql);
					$result=sql_fetch($sql);
					// if($result['duration'] == null) { $result['duration'] = 0;}
			?>
			<script>
				
				function view_lecture(idx){
					window.open('<?php echo G5_URL; ?>/m/lecture_detail.php?idx='+idx, "win_lecture_detail", "left=50, top=50, width=1080, height=570, scrollbars=1");
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
						
						// if(abs(ceil($realtime) - ceil($tmp[ctime])) < 30 || $realtime > $tmp[ctime]){
						// if(abs(ceil($tmp[duration]) - ceil($tmp[lt_playtime])) < 1 || $tmp[lt_playtime] < $tmp[duration]{
						// if($result['duration'] >= $tmp['lt_playtime']){
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
	events.push({'Date':new Date(<?php print_r($cdate)?>),'Title':'제출완료','Link':'#'});

<?php } ?>
</script>
<div id="test"></div>
		</div>
<script type="text/javascript" src="<?php echo G5_JS_URL?>/caleandar.js"></script>
<script type="text/javascript">
			function go_modify(){
				location.href="/bbs/member_confirm.php?url=register_form.php";
			}
	function logout(){
				location.href="/bbs/logout.php";
			}
			var settings = {};
var element = document.getElementById('caleandar');
caleandar(element, events, settings);
</script>
<?php
include_once(G5_THEME_PATH.'/tail.php');
?>
