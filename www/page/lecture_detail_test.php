<?php
	include_once('./_common.php');
	if($member['mb_id'] == ""){
	        alert_close('로그인이 필요한 서비스입니다.');
	}
	$idx = (int) $_GET['idx'];
	if (!$idx)
		alert_close('잘못된 접근이거나 오류가 발생하였습니다.');

	// 한번 읽은글은 브라우저를 닫기전까지는 카운트를 증가시키지 않음
	$ss_name = 'ss_view_lecture_'.$idx;
	if (!get_session($ss_name))
	{
			sql_query("UPDATE cbc_lecture SET lt_view = lt_view + 1 WHERE idx = '{$idx}'");

			set_session($ss_name, TRUE);
	}	

	$sql = "SELECT * FROM cbc_lecture WHERE is_display = 'Y' AND idx = '{$idx}'";
	$row = sql_fetch($sql);
	if (!$row['idx'])
		alert_close('등록된 자료가 없습니다.');	

	$g5['title'] = '인터넷강의';
	$gnb_css = 'lecture';
	include_once(G5_PATH.'/head.sub.php');
	$img_url = G5_IMG_URL.'/pc';

	// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.G5_THEME_URL.'/css/lecture.css">', 1);
?>
		<style>
			body {overflow:hidden;}
			#lecture {width:1050px;height:570px;}
			#lecture .player_wrap, #lecture .lec_summary {float:left;}
			#lecture .player_wrap {padding:64px 35px 0;width:547px;height:506px;background-color:#f3f3f3;}
			#lecture .lec_summary {padding:72px 0 0 43px;}
			#lecture h2 {color:#333;font-size:18px;font-weight:bold;}
			#lecture .view {padding:20px 0 90px;color:#333;font-size:13px;font-weight:bold;}
			#lecture .view img {margin-right:10px;}
			#lecture .notice {padding-bottom:45px;color:#333;font-size:13px;line-height:26px;}
			#player,#mediaplayer {margin:0 auto;width:547px;height:410px;}

		</style>
		<div id="lecture">
				<div class="player_wrap">
			<?php if($row['lt_mp4'] !=''){ ?>
						<video id="mediaplayer" repload="auto" poster="<?php echo G5_DATA_URL.'/lecture/'.$row['lt_img1'] ?>" controls autoplay src="<?php echo $row['lt_mp4']; ?>" onplaying="play_start()" onpause="vod_pause()" onended="play_ended()"></video>
								<?php } ?>
			<?php if($row['lt_youtube_id']!=''){ ?>
		
				<div id="player"></div>
	
		<?php } ?>
				</div>
			<div class="lec_summary">
				<h2><?php echo get_text($row['lt_subject']); ?></h2>
				<div class="view"><img src="<?php echo $img_url; ?>/play_icon_b.png"><?php echo number_format($row['lt_view']); ?><img src="<?php echo $img_url; ?>/clock_icon_b.png" style="margin-left:20px;"><?php echo $row['lt_playtime']; ?></div>
				<p class="notice">
					영상은 <?php echo $row['lt_playtime']; ?>입니다.<br>
					끝까지 시청하셔야 이수를 받을 수 있습니다.<br>
					비디오 시청에 문제가 있을 경우 아래 지원센터로 연락바랍니다.
				</p>
				<img src="<?php echo $img_url; ?>/class_popup_info.jpg">
			</div>
		</div>
		<script>
			var idx = '<?php echo $row['idx'];?>';
			var stime = '';
			var playtime = '<?php echo $row['lt_playtime'];?>';
			var mp4 = '<?php echo $row['lt_mp4']?>';
			var yt = '<?php echo $row['lt_youtube_id']?>';
			if(mp4 =='') {
var tag = document.createElement('script');
			tag.src = "https://www.youtube.com/iframe_api";
			var firstScriptTag = document.getElementsByTagName('script')[0];
			firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

			var player;
			function onYouTubeIframeAPIReady() {
				player = new YT.Player('player', {
					height: '355',
					width: '545',
					videoId: '<?php echo $row['lt_youtube_id']; ?>',
					playerVars: {controls:'0', disablekb:1, rel:0, iv_load_policy : 3},
					events: {
						'onReady': onPlayerReady,
						'onStateChange': onPlayerStateChange
					}
				});
			}
			function onPlayerReady(event) {
				console.log('onPlayerReady 실행');

				// 플레이어 자동실행 (주의: 모바일에서는 자동실행되지 않음)
				event.target.playVideo();      
			}
			var playerState;
			var ytplayer = document.getElementById("player"); 
			// ytplayer.getDuration(); 


			function onPlayerStateChange(event) {
				playerState = event.data == YT.PlayerState.ENDED ? '종료됨' :
								event.data == YT.PlayerState.PLAYING ? '재생 중' :
								event.data == YT.PlayerState.PAUSED ? '일시중지 됨' :
								event.data == YT.PlayerState.BUFFERING ? '버퍼링 중' :
								event.data == YT.PlayerState.CUED ? '재생준비 완료됨' :
								event.data == -1 ? '시작되지 않음' : '예외';

				
				if (!stime && event.data == YT.PlayerState.PLAYING) play_start();
				if (event.data == YT.PlayerState.ENDED) yplay_ended();
				console.log('onPlayerStateChange 실행: ' + playerState);				
			}	
			function yplay_start() {
				$.post(
					'<?php echo G5_URL; ?>/page/lecture_ajax_test.php', 
					{w:'ps',idx:idx,mb_id:'<?php echo $_SESSION['ss_mb_id']; ?>'}, 
					function(data){
						stime = data;
						console.log(data);
					}
				);
			}
			function yplay_ended() {
				var ctime = player.getCurrentTime();
				$.post(
					'<?php echo G5_URL; ?>/page/lecture_ajax_test.php', 
					{w:'pe',idx:idx,mb_id:'<?php echo $_SESSION['ss_mb_id']; ?>',stime:stime,ctime:ctime,d_typ:'pc'}
				).done(function(data){
					if (data == 'success') {
						stime = '';
						alert('시청을 완료 하였습니다.');
					}
				});
			}

			} else if(yt ==''){

				var player;
				function onPlayerReady(event) {
					console.log('onPlayerReady 실행');

					// 플레이어 자동실행 (주의: 모바일에서는 자동실행되지 않음)
					event.target.playVideo();      
				}
				var playerState;
				var ytplayer = document.getElementById("mediaplayer"); 
				// ytplayer.getDuration(); 


				function onPlayerStateChange(event) {
					playerState = event.data == YT.PlayerState.ENDED ? '종료됨' :
									event.data == YT.PlayerState.PLAYING ? '재생 중' :
									event.data == YT.PlayerState.PAUSED ? '일시중지 됨' :
									event.data == YT.PlayerState.BUFFERING ? '버퍼링 중' :
									event.data == YT.PlayerState.CUED ? '재생준비 완료됨' :
									event.data == -1 ? '시작되지 않음' : '예외';

					
					if (!stime && event.data == YT.PlayerState.PLAYING) play_start();
					if (event.data == YT.PlayerState.ENDED) play_ended();
					console.log('onPlayerStateChange 실행: ' + playerState);				
				}	
				var fromtime, totime;
				function play_start() {
					console.log("play start");
					$.post(
						'<?php echo G5_URL; ?>/page/lecture_ajax_test.php', 
						{w:'ps',idx:idx,mb_id:'<?php echo $_SESSION['ss_mb_id']; ?>',d_typ:'pc'}, 
						function(data){
							stime = data;
							fromtime = data;
							console.log(data);
						}
					);
				}
				function play_ended() {
					console.log("play end");
					var ctime = ytplayer.currentTime;
					var now = new Date().getTime();
					var totime = new Date(stime).getTime();
					var diff = playtime.split(':')[0]*60+playtime.split(':')[1];
					//if(now - totime > diff){
					$.post(
						'<?php echo G5_URL; ?>/page/lecture_ajax_test.php', 
						{w:'pe',idx:idx,mb_id:'<?php echo $_SESSION['ss_mb_id']; ?>',stime:stime,ctime:ctime,d_typ:'pc'}
					).done(function(data){
						if (data == 'success') {
							stime = '';
							alert('시청을 완료 하였습니다.');
						}
					});
				//} else {
				//	alert('정상적인 플레이 시간이 아닙니다. 다시 시도해주세요.');
				//}
				}

				function vod_pause() {
					console.log("play pause");
					var ctime = ytplayer.currentTime;
					var now = new Date().getTime();
					var totime = new Date(stime).getTime();
					var diff = playtime.split(':')[0]*60+playtime.split(':')[1];


					//if(now - totime > diff){
					$.post(
						'<?php echo G5_URL; ?>/page/lecture_ajax_test.php', 
						{w:'pp',idx:idx,mb_id:'<?php echo $_SESSION['ss_mb_id']; ?>',stime:stime,ctime:ctime,d_typ:'pc'}
					).done(function(data){
						if (data == 'paused') {
							console.log("시청 일시중지");
							stime = '';
							// alert('시청을 완료 하였습니다.');
						}
					});
				}

			}

			
		</script>
<?php
include_once(G5_PATH.'/tail.sub.php');
?>
