<?php
?>
<div class="border_1px"></div>
<div id="md_title">금지약물 국제표준</div>
<div class="border_6px"></div>
<?php
	$menu = "prohibit";
	include 'medi_menu.php';
?>
<div id="md_prohb">
	<div style="float: left;">
		<img src="./img/menu32_1img.jpg">
	</div>
	<div style="float: right;">
		<img src="./img/menu32_2img.jpg">
	</div>
	<div style="float: right;top: -125px;right: 35px;position: relative;" onclick="download()">
		<img src="./img/menu32_3img.jpg">
	</div>
</div>
<script type="text/javascript">
	function download(argument) {
		alert("다운로드");
	}
</script>