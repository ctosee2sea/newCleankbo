<?php
	header("Content-Type: text/html; charset=utf8");
	session_start();
?>
<html>
	<head>
		<!--	헤드 컨텐츠 시작	-->
		<?php
			$type = $_GET['type'];

			if($type == "main" || $type == null){$filename = "main";$css = "main";}
			else if($type == "md_sch"){$filename = "medi_search";$css= "md_menu";}
			else if($type == "md_prhb"){$filename = "medi_prohibit";$css= "md_menu";}
			else if($type == "md_prct"){$filename = "medi_protect";$css= "md_menu";}
			else if($type == "md_purp"){$filename = "medi_purpose";$css= "md_menu";}
			else if($type == "md_sply"){$filename = "medi_supply";$css= "md_menu";}
			else if($type == "md_step"){$filename = "medi_step";$css= "md_menu";}
			else if($type == "md_info"){$filename = "medi_info";$css= "md_menu";}
			else if($type == "lecture"){$filename = "lecture";$css= "lecture";}
			else if($type == "info"){$filename = "center_info";$css= "info";}
			else if($type == "md_news"){$filename = "media_new";$css= "media";}
			else if($type == "md_notice"){$filename = "media_notice";$css= "media";}
			else if($type == "md_toon"){$filename = "media_webtoon";$css= "media";}
			else if($type == "report"){$filename = "report";$css= "report";}
		?>
		<?php
			include("include/div_head.php");
		?>
		<link rel="stylesheet" type="text/css" href="css/common.css" />
		<link rel="stylesheet" type="text/css" href="css/<?=$css?>.css" />
		<!--	헤드 컨탠츠 종료	-->
	</head>
	<body>
		<div id="main-content">
			<?php
				include("include/div_menu.php");
			?>
			<!--	주요 컨텐츠 시작	-->
			<?php
				include("view/".$filename.".php");
			?>
			<!--	주요 컨텐츠 종료	-->
			<?php
				include 'include/footer.php';
			?>
		</div>
	</body>
</html>
<script type="text/javascript">

	function my_log_btn(){
		alert("나의 정보조회 선택.");
	}

	function move_page(code){
		switch(code){
			case 'main':
				document.location.href='./?type=';
				break;
			case 'medi':
			case '1':
				document.location.href='./?type=md_sch';
				break;
			case '2':
				document.location.href='./?type=md_prhb';
				break;
			case '3':
				document.location.href='./?type=md_prct';
				break;
			case '4':
				document.location.href='./?type=md_purp';
				break;
			case '5':
				document.location.href='./?type=md_sply';
				break;
			case '6':
				document.location.href='./?type=md_step';
				break;
			case '7':
				document.location.href='./?type=md_info';
				break;
			case 'lecture':
				document.location.href='./?type=lecture';
				break;
			case 'info':
				document.location.href='./?type=info';
				break;
			case 'news':
				document.location.href='./?type=md_news';
				break;
			case 'notice':
				document.location.href='./?type=md_notice';
				break;
			case 'webtoon':
				document.location.href='./?type=md_toon';
				break;
			case 'report':
				document.location.href='./?type=report';
				break;
		}
	}
</script>
