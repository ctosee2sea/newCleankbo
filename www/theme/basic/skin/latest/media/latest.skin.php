<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>
    <?php for ($i=0; $i<count($list); $i++) {  ?>
            <?php
	echo "<li>";
	echo "<dl><dt>PRESS</dt>";
        echo "<dd><a href=\"".$list[$i]['href']."\">";
        if(strlen($list[$i]['subject']) > 55){
		$cnt = 55 - strlen($list[$i]['subject']);
		echo mb_substr($list[$i]['subject'],0 , $cnt, 'utf-8')."...";
	}else{
		echo $list[$i]['subject'];
	}
	echo "</a></dd>";
	echo "<dd>".str_replace('-', '.', $list[$i]['datetime'])."</dd>";
        echo "</dl></li>";
            ?>
    <?php }  ?>
    <?php if (count($list) == 0) { //게시물이 없을 때  ?>
    <li><dl><dt>PRESS</dt><dd>게시물이 없습니다.</dd></dl></li>
    <?php }  ?>
