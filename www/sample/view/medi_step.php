<?php
?>
<div class="border_1px"></div>
<div id="md_title">도핑검사절차</div>
<div class="border_6px"></div>
<?php
	$menu = "step";
	include 'medi_menu.php';
?>
<div id="md_step">
	<div class="md_img">
		<img src="./img/menu36_1img.jpg">
	</div>
	<div class="inner_menu">
		<div class="menu_item" onclick="step_move('1')" style="background-color: #ffffff;color: #333333;"><div style="padding-left: 45px;" id="inner_menu_1">소변시료채취 절차</div></div>
		<div class="menu_item" onclick="step_move('2')" style="background-color: #f3f3f3;color: #aaaaaa;"><div style="padding-left: 45px;" id="inner_menu_2">혈액시료채취 절차</div></div>
	</div>
	<div id="sample1">
		<img src="./img/menu36_2img.jpg"><br>
		<img src="./img/menu36_3img.jpg"><br>
		<img src="./img/menu36_4img.jpg"><br>
		<img src="./img/menu36_5img.jpg"><br>
		<img src="./img/menu36_6img.jpg"><br>
		<img src="./img/menu36_7img.jpg">
	</div>
	<div id="sample2">
		<img src="./img/menu36_2img.jpg"><br>
		<img src="./img/menu36_22img.jpg"><br>
		<img src="./img/menu36_23img.jpg"><br>
		<img src="./img/menu36_24img.jpg">
	</div>
</div>
<script type="text/javascript">
	function step_move(argument) {
		// body...
		switch(argument){
			case "1":
				$('#sample1').show();
				$('#sample2').hide();
				$('#inner_menu_1').css("background-color","#ffffff");
				$('#inner_menu_2').css("background-color","#f3f3f3");
				$('#inner_menu_1').css("color","#333333");
				$('#inner_menu_2').css("color","#aaaaaa");
			break;
			case "2":
				$('#sample2').show();
				$('#sample1').hide();
				$('#inner_menu_2').css("background-color","#ffffff");
				$('#inner_menu_1').css("background-color","#f3f3f3");
				$('#inner_menu_2').css("color","#333333");
				$('#inner_menu_1').css("color","#aaaaaa");
			break;
		}
	}
</script>