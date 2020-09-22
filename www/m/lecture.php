<?php
	include_once('./_common.php');

	if (!in_array($sca, array(1, 2))) $sca = 2;

	$sql = "SELECT * FROM cbc_lecture WHERE idx NOT IN (26,27,28,29,30) AND is_display = 'Y' AND lt_category = '{$sca}' ORDER BY idx DESC";
	$result = sql_query($sql);
	// 외국인용 영상을 맨 아래로 보내기 위해서 쿼리를 나눠둠
	$sql2 = "SELECT * FROM cbc_lecture WHERE idx IN (26,27,28,29,30) AND is_display = 'Y' AND lt_category = '{$sca}' ORDER BY idx DESC";
	$result2 = sql_query($sql2);
	
	$g5['main_title'] = 'On-Line Edu';
	include_once(G5_THEME_MOBILE_PATH.'/head.php');
	$img_url = G5_IMG_URL.'/mobile/page';
?>
		<style>
			#container {background-color:#00489d;}
			#lecture .title {padding:24px 0 24px;color:#fff;font-size:25px;line-height:40px;text-align:center;}
			#lecture .tab_wrap {margin:0 auto;width:320px;height:45px;border:1px solid #fff;}
			#lecture .tab_wrap a {float:left;display:inline-block;width:160px;height:37px;line-height:15px;color:#fff;font-size:13px;font-weight:bold;text-align:center;padding-top:8px;}
			#lecture .tab_wrap a.on {color:#00489d;background-color:#fff;}
			#lecture .lst {margin:10px auto 0;padding:0;width:290px;list-style:none;}
			#lecture .lst li {padding-bottom:20px;position:relative;}
			.year {padding: 8px 10px 5px;background: #fff;color: #000;display: inline-block; position: absolute;top: -5px;left: 0;z-index: 10;}
			.filter p {display: inline-block;font-size: 20px;padding: 5px 20px;margin: 0 0 50px;}
			.filter {text-align:center;margin:10px auto;color:#fff; height: 45px;}
			.video_item_title {
				background-color:#fff;
				padding:10px;
			}
		</style>
		<div id="lecture" class="body-wrap">
			<p class="title">온라인 교육센터<br />(On-line Education center)</p>
			<div class="tab_wrap">
				<a href="./lecture.php?sca=2"<?php echo $sca == 2 ? ' class="on"' : ''; ?>>스포츠윤리교육<br />(Sport Ethics Education)</a>
				<a href="./lecture.php?sca=1"<?php echo $sca == 1 ? ' class="on"' : ''; ?>>도핑방지교육<br />(Anti-Doping Education)</a>
			</div>
			<div class="filter">
					<p data-year="2020">2020</p>
					<p data-year="2019">2019</p>
					<p data-year="2018">2018</p>
					<p data-year="2017">2017</p>
				</div>
			<ul class="lst">
			<?php
				for($i=0;$row=sql_fetch_array($result);$i++)
				{
if($member['mb_id'] != ""){
			?>
			<li data-year="<?php echo $row[lt_year];?>">
			<div class="year"><?php echo $row[lt_year];?></div>
			<a href="./lecture_detail.php?idx=<?php echo $row['idx']; ?>"><img src="<?php $filename = G5_DATA_URL.'/lecture/'.$row['idx'].'_mobile2';if(@GetImageSize($filename)) {echo G5_DATA_URL.'/lecture/'.$row['idx'].'_mobile2';} else { echo 'https://img.youtube.com/vi/'.$row[lt_youtube_id].'/sddefault.jpg'; } ?>" width="290px"></a>
<!-- Generator: Adobe Illustrator 18.1.1, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
<a href="./lecture_detail.php?idx=<?php echo $row['idx']; ?>">
<svg href="javascript:check();" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"viewBox="0 0 30.051 30.051" fill="#fff" width="80px" style="position:absolute;transform:translate(-50%,-50%);top:50%;left:50%;"> <g> <path d="M19.982,14.438l-6.24-4.536c-0.229-0.166-0.533-0.191-0.784-0.062c-0.253,0.128-0.411,0.388-0.411,0.669v9.069 c0,0.284,0.158,0.543,0.411,0.671c0.107,0.054,0.224,0.081,0.342,0.081c0.154,0,0.31-0.049,0.442-0.146l6.24-4.532 c0.197-0.145,0.312-0.369,0.312-0.607C20.295,14.803,20.177,14.58,19.982,14.438z"/> <path d="M15.026,0.002C6.726,0.002,0,6.728,0,15.028c0,8.297,6.726,15.021,15.026,15.021c8.298,0,15.025-6.725,15.025-15.021 C30.052,6.728,23.324,0.002,15.026,0.002z M15.026,27.542c-6.912,0-12.516-5.601-12.516-12.514c0-6.91,5.604-12.518,12.516-12.518 c6.911,0,12.514,5.607,12.514,12.518C27.541,21.941,21.937,27.542,15.026,27.542z"/> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </svg></a>
			<div class="video_item_title">
						<span><?php echo get_text($row['lt_subject']); ?></span>
					</div>
				</li>
			<?php
}else{
	?>
	<li data-year="<?php echo $row[lt_year];?>">
	<div class="year"><?php echo $row[lt_year];?></div>
			<a href="javascript:check();"><img src="<?php $filename = G5_DATA_URL.'/lecture/'.$row['idx'].'_mobile1';if(@GetImageSize($filename)) {echo G5_DATA_URL.'/lecture/'.$row['idx'].'_mobile1';} else { echo 'https://img.youtube.com/vi/'.$row[lt_youtube_id].'/sddefault.jpg'; } ?>" width="290px" height="230"></a>
				<?php if(!@GetImageSize($filename)){ ?>
<!-- Generator: Adobe Illustrator 18.1.1, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
<svg href="javascript:check();" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"viewBox="0 0 30.051 30.051" fill="#fff" width="80px" style="position:absolute;transform:translate(-50%,-50%);top:50%;left:50%;"> <g> <path d="M19.982,14.438l-6.24-4.536c-0.229-0.166-0.533-0.191-0.784-0.062c-0.253,0.128-0.411,0.388-0.411,0.669v9.069 c0,0.284,0.158,0.543,0.411,0.671c0.107,0.054,0.224,0.081,0.342,0.081c0.154,0,0.31-0.049,0.442-0.146l6.24-4.532 c0.197-0.145,0.312-0.369,0.312-0.607C20.295,14.803,20.177,14.58,19.982,14.438z"/> <path d="M15.026,0.002C6.726,0.002,0,6.728,0,15.028c0,8.297,6.726,15.021,15.026,15.021c8.298,0,15.025-6.725,15.025-15.021 C30.052,6.728,23.324,0.002,15.026,0.002z M15.026,27.542c-6.912,0-12.516-5.601-12.516-12.514c0-6.91,5.604-12.518,12.516-12.518 c6.911,0,12.514,5.607,12.514,12.518C27.541,21.941,21.937,27.542,15.026,27.542z"/> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </svg><?php } ?>
			</li>
	<?php
}}
			?>

			<?php
				for($i=0;$row=sql_fetch_array($result2);$i++)
				{
			?>
				<li data-year="<?php echo $row[lt_year];?>">
			<div class="year"><?php echo $row[lt_year];?></div>
			<a href="./lecture_detail.php?idx=<?php echo $row['idx']; ?>"><img src="<?php $filename = G5_DATA_URL.'/lecture/'.$row['idx'].'_mobile2';if(@GetImageSize($filename)) {echo G5_DATA_URL.'/lecture/'.$row['idx'].'_mobile2';} else { echo 'https://img.youtube.com/vi/'.$row[lt_youtube_id].'/sddefault.jpg'; } ?>" width="290px"></a>
<!-- Generator: Adobe Illustrator 18.1.1, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
<a href="./lecture_detail.php?idx=<?php echo $row['idx']; ?>">
<svg href="javascript:check();" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"viewBox="0 0 30.051 30.051" fill="#fff" width="80px" style="position:absolute;transform:translate(-50%,-50%);top:50%;left:50%;"> <g> <path d="M19.982,14.438l-6.24-4.536c-0.229-0.166-0.533-0.191-0.784-0.062c-0.253,0.128-0.411,0.388-0.411,0.669v9.069 c0,0.284,0.158,0.543,0.411,0.671c0.107,0.054,0.224,0.081,0.342,0.081c0.154,0,0.31-0.049,0.442-0.146l6.24-4.532 c0.197-0.145,0.312-0.369,0.312-0.607C20.295,14.803,20.177,14.58,19.982,14.438z"/> <path d="M15.026,0.002C6.726,0.002,0,6.728,0,15.028c0,8.297,6.726,15.021,15.026,15.021c8.298,0,15.025-6.725,15.025-15.021 C30.052,6.728,23.324,0.002,15.026,0.002z M15.026,27.542c-6.912,0-12.516-5.601-12.516-12.514c0-6.91,5.604-12.518,12.516-12.518 c6.911,0,12.514,5.607,12.514,12.518C27.541,21.941,21.937,27.542,15.026,27.542z"/> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </svg></a>
			<div class="video_item_title">
						<span><?php echo get_text($row['lt_subject']); ?></span>
					</div>
				</li>
			<?
				}
			?>

			</ul>
		</div>
<script>
function check(){
	if("<?=$member['mb_id']?>" == ""){
        	alert("로그인이 필요한 서비스 입니다.");
                location.replace('/bbs/login.php');
          	return;
	}	
}
			var guide;
			$('.filter p').click(function(){
				guide = $(this).data('year');
				$('.lst li').each(function(){if($(this).data('year') == guide){$(this).show();} else {$(this).hide();}});
			});
			$('.filter .allv').click(function(){
				$('.lst li').show();
			})
			$('p[data-year="2020"]').click()
</script>
<?php
include_once(G5_THEME_MOBILE_PATH.'/tail.php');
?>
