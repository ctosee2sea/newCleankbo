<?php
?>
<div class="border_1px"></div>
<div id="md_title">금지약물검색</div>
<div class="border_6px"></div>
<?php
	$menu = "search";
	include 'medi_menu.php';
?>
<div id="md_search">
	<div class="md_img">
		<img src="./img/menu31_1img.jpg">
	</div>
	<div class="agree">
		<div style="float: left;font-size: 16px;color: #333;padding-left: 120px;">위의 이용조건을 완전히 이해하고 이에 동의하십니까?</div>
		<div style="float: right;font-size: 16px;color: #333;padding-right: 120px;"><input type="radio" name="agree">&nbsp;&nbsp;동의합니다.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="agree">&nbsp;&nbsp;동의하지 않습니다.</div>
	</div>
	<div onclick="move_search()">
		<img src="./img/menu31_2img.jpg">
	</div>
</div>
<script type="text/javascript">
	function move_search(argument) {
		// body...
		alert("검색하러가기 팝업");
	}
</script>