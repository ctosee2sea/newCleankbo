<?php
	include_once('./_common.php');

	if (!in_array($sca, array(1, 2))) $sca = 2;

	$sql = "SELECT * FROM cbc_lecture WHERE idx NOT IN (26,27,28,29,30) AND is_display = 'Y' AND lt_category = '{$sca}' ORDER BY idx DESC";
	$result = sql_query($sql);
	// 외국인용 영상을 맨 아래로 보내기 위해서 쿼리를 나눠둠
	$sql2 = "SELECT * FROM cbc_lecture WHERE idx IN (26,27,28,29,30) AND is_display = 'Y' AND lt_category = '{$sca}' ORDER BY idx DESC";
	$result2 = sql_query($sql2);

	$g5['title'] = 'On-Line Edu';
	$gnb_css = 'lecture';
	include_once(G5_THEME_PATH.'/head.php');
	$img_url = G5_IMG_URL.'/pc';

	// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.G5_THEME_URL.'/css/lecture.css">', 1);
?>
		<div id="lecture1">
			<div class="inner_lecture">
				<!--div style="padding-top: 155px;margin-bottom: 10px;font-size: 48px;">깨끗한 야구문화를 위한</div-->
				<div style="padding-top: 50px;margin-bottom: 40px;font-size: 48px;">온라인 교육센터<br />(On-line Education center)</div>
				<!--div style="margin-bottom: 77px;font-size: 16px;">부정행위없는 스포츠를 선도하는 글로벌리더 클린베이스볼센터가 함께합니다.</div-->
				<div class="inner_btn">
					<div class="item color_<?php echo $sca == 2 ? 'on' : 'off'; ?>" name="lecture2" onclick="location.href='<?php echo G5_URL; ?>/page/lecture.php?sca=2'">스포츠윤리교육<br />(Sport Ethics Education)</div>
					<div class="item color_<?php echo $sca == 1 ? 'on' : 'off'; ?>" name="lecture1" onclick="location.href='<?php echo G5_URL; ?>/page/lecture.php?sca=1'">도핑방지교육<br />(Anti-Doping Education)</div>
				</div>
			</div>
		</div>
		<div id="lecture2">
			<div class="inner_lecture">
				<div class="filter">
	
					<p data-year="2020">2020</p>
					<p data-year="2019">2019</p>
					<p data-year="2018">2018</p>
					<p data-year="2017">2017</p>
				</div>
				<?php 
					for($i=0;$row=sql_fetch_array($result);$i++)
					{
				?>
				<div class="video_area btn_cursor" data-year="<?php echo $row[lt_year];?>" onclick="view_lecture(<?php echo $row['idx']; ?>)">
					<div class="year"><?php echo $row[lt_year];?></div>
					<div class="video_item_img" style="position:relative;    background-size: cover;background-image: url(<?php $filename = G5_DATA_URL.'/lecture/'.$row['idx'].'_mobile2';if(@GetImageSize($filename)) {echo G5_DATA_URL.'/lecture/'.$row['idx'].'_mobile2';} else { echo 'https://img.youtube.com/vi/'.$row[lt_youtube_id].'/sddefault.jpg'; } ?>);background-repeat: no-repeat;background-position: center center;"><?php echo '<?';?>xml version="1.0" encoding="iso-8859-1"<?php echo '?>';?>
<!-- Generator: Adobe Illustrator 18.1.1, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"viewBox="0 0 30.051 30.051" fill="#fff" width="100px" style="position:absolute;transform:translate(-50%,-50%);top:50%;left:50%;"> <g> <path d="M19.982,14.438l-6.24-4.536c-0.229-0.166-0.533-0.191-0.784-0.062c-0.253,0.128-0.411,0.388-0.411,0.669v9.069 c0,0.284,0.158,0.543,0.411,0.671c0.107,0.054,0.224,0.081,0.342,0.081c0.154,0,0.31-0.049,0.442-0.146l6.24-4.532 c0.197-0.145,0.312-0.369,0.312-0.607C20.295,14.803,20.177,14.58,19.982,14.438z"/> <path d="M15.026,0.002C6.726,0.002,0,6.728,0,15.028c0,8.297,6.726,15.021,15.026,15.021c8.298,0,15.025-6.725,15.025-15.021 C30.052,6.728,23.324,0.002,15.026,0.002z M15.026,27.542c-6.912,0-12.516-5.601-12.516-12.514c0-6.91,5.604-12.518,12.516-12.518 c6.911,0,12.514,5.607,12.514,12.518C27.541,21.941,21.937,27.542,15.026,27.542z"/> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </svg>
					</div>
					<div class="video_item_title">
						<span><?php echo get_text($row['lt_subject']); ?></span>
					</div>
				</div>
		<!-- 		<div class="video_space"></div> -->
				<?php
					}
				?>

				<?php 
					for($i=0;$row=sql_fetch_array($result2);$i++)
					{
				?>
				<div class="video_area btn_cursor" data-year="<?php echo $row[lt_year];?>" onclick="view_lecture(<?php echo $row['idx']; ?>)">
					<div class="year"><?php echo $row[lt_year];?></div>
					<div class="video_item_img" style="position:relative;    background-size: cover;background-image: url(<?php $filename = G5_DATA_URL.'/lecture/'.$row['idx'].'_mobile2';if(@GetImageSize($filename)) {echo G5_DATA_URL.'/lecture/'.$row['idx'].'_mobile2';} else { echo 'https://img.youtube.com/vi/'.$row[lt_youtube_id].'/sddefault.jpg'; } ?>);background-repeat: no-repeat;background-position: center center;"><?php echo '<?';?>xml version="1.0" encoding="iso-8859-1"<?php echo '?>';?>
<!-- Generator: Adobe Illustrator 18.1.1, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"viewBox="0 0 30.051 30.051" fill="#fff" width="100px" style="position:absolute;transform:translate(-50%,-50%);top:50%;left:50%;"> <g> <path d="M19.982,14.438l-6.24-4.536c-0.229-0.166-0.533-0.191-0.784-0.062c-0.253,0.128-0.411,0.388-0.411,0.669v9.069 c0,0.284,0.158,0.543,0.411,0.671c0.107,0.054,0.224,0.081,0.342,0.081c0.154,0,0.31-0.049,0.442-0.146l6.24-4.532 c0.197-0.145,0.312-0.369,0.312-0.607C20.295,14.803,20.177,14.58,19.982,14.438z"/> <path d="M15.026,0.002C6.726,0.002,0,6.728,0,15.028c0,8.297,6.726,15.021,15.026,15.021c8.298,0,15.025-6.725,15.025-15.021 C30.052,6.728,23.324,0.002,15.026,0.002z M15.026,27.542c-6.912,0-12.516-5.601-12.516-12.514c0-6.91,5.604-12.518,12.516-12.518 c6.911,0,12.514,5.607,12.514,12.518C27.541,21.941,21.937,27.542,15.026,27.542z"/> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </svg>
					</div>
					<div class="video_item_title">
						<span><?php echo get_text($row['lt_subject']); ?></span>
					</div>
				</div>
		<!-- 		<div class="video_space"></div> -->
				<?php
					}
				?>
				<!-- <div class="more_btn"><img src="<?php echo $img_url; ?>/contents_more.png"></div>  -->
		</div>

		<script type="text/javascript">
			function view_lecture(idx){
				if("<?=$member['mb_id']?>" == ""){
					alert("로그인이 필요한 서비스 입니다.");
					location.replace('/bbs/login.php');
					return;
				}
				window.open('<?php echo G5_URL; ?>/page/lecture_detail.php?idx='+idx, "win_lecture_detail", "left=50, top=50, width=1080, height=570, scrollbars=1");
			}

			$("div[name=lecture1]").click(function() {
				$(this).css('color','#00489d').css('background-color','#ffffff');
				$("div[name=lecture2]").css('color','#ffffff').css('background-color','transparent');
			});
			$("div[name=lecture2]").click(function() {
				$(this).css('color','#00489d').css('background-color','#ffffff');
				$("div[name=lecture1]").css('color','#ffffff').css('background-color','transparent');
			});

			var guide;
			$('.filter p').click(function(){
				guide = $(this).data('year');
				$('.video_area').each(function(){if($(this).data('year') == guide){$(this).show();} else {$(this).hide();}});
			});
			// $('.filter .allv').click(function(){
			// 	$('.video_area').show();
			// })
			$('p[data-year="2020"]').click()
		</script>
<?php
include_once(G5_THEME_PATH.'/tail.php');
?>
