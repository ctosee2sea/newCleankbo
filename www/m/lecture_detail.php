<?php
	include_once('./_common.php');

	$idx = (int) $_GET['idx'];
	if (!$idx)
		alert('잘못된 접근이거나 오류가 발생하였습니다.');

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
		alert('등록된 자료가 없습니다.');	

	$g5['main_title'] = '인터넷강의';
	include_once(G5_THEME_MOBILE_PATH.'/head.php');
	$img_url = G5_IMG_URL.'/mobile/page';

	// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
	add_stylesheet('<link rel="stylesheet" href="'.G5_URL.'/css/font-awesome/font-awesome.min.css">', 1);
	add_stylesheet('<link href="http://vjs.zencdn.net/5.12.6/video-js.css" rel="stylesheet">', 1);
	add_javascript('<script src="http://vjs.zencdn.net/5.12.6/video.js"></script>');
?>
		<style>
			#container {background-color:#222529;}
			#lecture .notice {padding:20px 15px;color:#7f8081;font-size:12px;line-height:26px;}			
			#lecture .lec_subject {padding:25px 15px 20px;color:#fff;font-size:17px;}
			#lecture .lec_info {padding:0 15px 30px;color:#fff;font-size:17px;}
			#lecture .lec_info .icon {margin-right:10px;width:11px;}
			#lecture .view, #lecture .time {color:#fff;font-size:17px;}
			#lecture .view {margin-right:15px;}
			#lecture video {width:100%;}
			#lecture .callcenter {padding:20px 0;background-color:#00489d;text-align:center;}
			#lecture .callcenter img {width:90%;}
			.fa-clock-o {font-size:16px;}
		</style>
		<div id="lecture" class="body-wrap">
	<!-- 		<video id="mediaplayer" repload="auto" poster="<?php echo G5_DATA_URL.'/lecture/'.$row['idx'].'_mobile2'; ?>" controls autoplay src="<?php echo $row['lt_mp4']; ?>" onplaying="play_start()" onended="play_ended()"></video>					 -->	
			<?php if($row['lt_mp4'] !=''){ ?>
						<video id="mediaplayer" repload="auto" poster="<?php echo G5_DATA_URL.'/lecture/'.$row['lt_img1'] ?>" controls autoplay src="<?php echo $row['lt_mp4']; ?>" onplaying="play_start()" onpause="vod_pause()" onended="play_ended()"></video>						
								<?php } ?>
			<?php if($row['lt_youtube_id']!=''){ ?>
		
				<div id="player"></div>
	
		<?php } ?>
			<div class="summary">
				<div class="lec_subject"><?php echo get_text($row['lt_subject']); ?></div>
				<div class="lec_info"><img src="<?php echo G5_IMG_URL; ?>/mobile/play_icon.png" class="icon"><span class="view"><?php echo number_format($row['lt_view']);?></span><img src="<?php echo G5_IMG_URL; ?>/mobile/clock_icon.png" class="icon"><span class="time"><?php echo $row['lt_playtime']; ?></span></div>
				<p class="notice">
					끝까지 시청하셔야 이수를 받을 수 있습니다.<br>
					온라인 강의 문의는 [소속/신분/이름/아이디] 와 함께 이메일 cleankbo@koreabaseball.or.kr로 보내주시면 빠른 시일 내에 회신해 드리도록 하겠습니다.
				</p>
				<!--div class="callcenter"><img src="<?php echo G5_IMG_URL; ?>/mobile/class_callcenter.png"></div-->
			</div>
		</div>
		<script>
			// var idx = '<?php echo $row['idx'];?>';
			// var stime = '';

			// function play_start() {
			// 	if(!stime){
			// 		$.post(
			// 			'<?php echo G5_URL; ?>/page/lecture_ajax.php', 
			// 			{w:'ps',idx:idx,mb_id:'<?php echo $_SESSION['ss_mb_id']; ?>'}, 
			// 			function(data){
			// 				stime = data;
			// 				console.log(data);
			// 			}
			// 		);
			// 	}
			// }
			// function play_ended() {
			// 	var vid = document.getElementById("mediaplayer");
			// 	var ctime = vid.currentTime?vid.currentTime:0;					
			// 	$.post(
			// 		'<?php echo G5_URL; ?>/page/lecture_ajax.php', 
			// 		{w:'pe',idx:idx,mb_id:'<?php echo $_SESSION['ss_mb_id']; ?>',stime:stime,ctime:ctime,d_typ:'mobile'}
			// 	).done(function(data){
			// 		if (data == 'success') {
			// 			stime = '';
			// 			alert('시청을 완료 하였습니다.');
			// 		}
			// 	});
			// }	
			var idx = '<?php echo $row['idx'];?>';
			var stime = '';
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
					'<?php echo G5_URL; ?>/page/lecture_ajax.php', 
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
					'<?php echo G5_URL; ?>/page/lecture_ajax.php', 
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
			function play_start() {
				console.log("play start");

					$.post(
						'<?php echo G5_URL; ?>/page/lecture_ajax.php', 
						{w:'ps',idx:idx,mb_id:'<?php echo $_SESSION['ss_mb_id']; ?>',d_typ:'mobile'}, 
						function(data){

							if(data == 'playing') {
								// alert("이미 실행중인 영상이 있습니다.");
								// ytplayer.pause();
								// window.close();
							} else {
								stime = data;
								fromtime = data;
								console.log(data);	
							}
							
						}
					);

					startInterval = setInterval(function() {
						$.post(
							'<?php echo G5_URL; ?>/page/lecture_ajax.php',
							{w:'iv',idx:idx,mb_id:'<?php echo $_SESSION['ss_mb_id']; ?>'},
							function(data){
								var J = JSON.parse(data);
								$("#playtime").text(J.time);
								// console.log(data);
							}
						);
					}, 1000);
			}
			function play_ended() {
				console.log("play end");
				var ctime = ytplayer.currentTime;
				var now = new Date().getTime();
				var totime = new Date(stime).getTime();
				var diff = playtime.split(':')[0]*60+playtime.split(':')[1];
				//if(now - totime > diff){
				$.post(
					'<?php echo G5_URL; ?>/page/lecture_ajax.php', 
					{w:'pe',idx:idx,mb_id:'<?php echo $_SESSION['ss_mb_id']; ?>',stime:stime,ctime:ctime,d_typ:'mobile'}
				).done(function(data){
					if (data == 'success') {
						stime = '';
						clearInterval(startInterval);
						alert('시청을 완료 하였습니다.');
					}
				});

			}

			function vod_pause() {
				console.log("play pause");
				var ctime = ytplayer.currentTime;
				var now = new Date().getTime();
				var totime = new Date(stime).getTime();
				// var diff = playtime.split(':')[0]*60+playtime.split(':')[1];


				//if(now - totime > diff){
				$.post(
					'<?php echo G5_URL; ?>/page/lecture_ajax.php', 
					{w:'pp',idx:idx,mb_id:'<?php echo $_SESSION['ss_mb_id']; ?>',stime:stime,ctime:ctime,d_typ:'mobile'}
				).done(function(data){
					if (data == 'paused') {
						console.log("시청 일시중지");
						stime = '';
						clearInterval(startInterval);
						// alert('시청을 완료 하였습니다.');
					}
				});
			}
		}

			
		</script>
		</script>
<?php
include_once(G5_THEME_MOBILE_PATH.'/tail.php');
?>